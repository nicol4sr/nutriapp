<?php

namespace App\Http\Controllers;

use App\Events\NotificationEvent;
use App\Models\Consulta;
use App\Models\DatosUsuario;
use App\Models\User;
use App\Notifications\ConsultaNotification;
use App\Notifications\EspecialistaNotification;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function __construct()
    {
        // Valida la autenticación
        $this->middleware('auth');
        $this->middleware('prevent-back-history');
        $this->middleware('check_user_answer_data_form');
    }

    public function index()
    {
        $usuario = auth()->user();
        $especialista = $usuario->hasRole(['Entrenador', 'Nutricionista', 'Psicologo']);
        if ($especialista) {

            $consultas = Consulta::orderBy('created_at', 'DESC')
                ->where('especialista_id', '=', $usuario->id)
                ->paginate(15);
            return view('consultas.especialista_index', compact('consultas'));
        }

        $consultas = Consulta::orderBy('created_at', 'DESC')
            ->where('usuario_id', '=', auth()->user()->id)
            ->paginate(15);
        return view('consultas.index', compact('consultas'));
    }

    public function select(string $especialista)
    {
        $tipos_especialistas = [0 => 'Entrenador', 1 => 'Psicologo', 2 => 'Nutricionista'];
        if (!array_key_exists($especialista, $tipos_especialistas)) {
            return redirect('')->route('consultas.index');
        }

        $especializacion = $tipos_especialistas[$especialista];
        $especialistas = User::role($especializacion)
            ->select('users.id', 'name')
            ->get();

        if (count($especialistas) > 0) {
            return view('consultas.index', compact('especialistas', 'especializacion'));
        }

        return redirect()
            ->route('consultas.index')
            ->with('not-found', "No hay especialistas ($especializacion) disponibles en estos momentos");
    }

    public function pick(Request $request)
    {
        $consulta = Consulta::create([
            'usuario_id' => auth()->user()->id,
            'especialista_id' => $request->especialista,
            'estado' => null,
            'respuesta' => null,
        ]);

        $this->notificar_especialista($consulta);

        return redirect()->route('consultas.index')->with('success', 'La consulta ha sido agendada');
    }

    public function state(Consulta $consulta, bool $estado)
    {
        $consulta->update([
            'estado' => $estado,
        ]);

        $this->notificar_usuario($consulta);

        return back()->with('success', 'La consulta ha sido actualizada');
    }

    public function profile(Consulta $consulta)
    {
        $usuario = auth()->user();

        if ($consulta->especialista_id != $usuario->id) {
            return back();
        }

        $preguntas = DatosUsuario::where('usuario_id', '=', $consulta->usuario->id)
            ->get();

        if ($preguntas->count() === 0) {
            return back()->with('no-response', 'El usuario no ha respondido las preguntas necesarias para una consulta');
        }

        return view('consultas.datos_usuario', compact('consulta', 'preguntas'));
    }

    public function response(Consulta $consulta, Request $request)
    {
        $consulta->update([
            'respuesta' => $request->respuesta,
        ]);

        return redirect()
            ->route('consultas.index')
            ->with('success', 'La respuesta ha sido enviada al usuario exitosamente');
    }

    public function show(Consulta $consulta)
    {
        return view('consultas.show', compact('consulta'));
    }

    public function notificar_especialista($consulta)
    {
        event(new EspecialistaNotification($consulta));
    }

    public function notificar_usuario($consulta)
    {
        event(new ConsultaNotification($consulta));
    }
}

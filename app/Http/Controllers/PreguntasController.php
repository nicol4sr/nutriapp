<?php

namespace App\Http\Controllers;

use App\Models\DatosUsuario;
use App\Models\Pregunta;
use Illuminate\Http\Request;

class PreguntasController extends Controller
{
    public function __construct()
    {
        // Valida la autenticación
        $this->middleware('auth');
        $this->middleware('prevent-back-history');
    }

    public function index()
    {
        $preguntas = Pregunta::paginate(15);
        return view('preguntas.index', compact('preguntas'));
    }

    public function store(Request $request)
    {
        Pregunta::create([
            'nombre' => $request['nombre'],
            'tipo' => $request['tipo'],
        ]);

        return redirect()->back();
    }

    public function edit(Pregunta $pregunta)
    {
        $preguntas = Pregunta::paginate(15);
        return view('preguntas.index', compact('preguntas', 'pregunta'));
    }

    public function delete(Pregunta $pregunta)
    {
        $pregunta->delete();
        return redirect()->back();
    }

    public function update(Pregunta $pregunta, Request $request)
    {
        $pregunta->update($request->all());
        return redirect()->route('preguntas');
    }

    public function usuario()
    {
        $preguntas = Pregunta::all();
        return view('preguntas.usuario', compact('preguntas'));
    }

    public function usuario_store(Request $request)
    {
        $respuestas = $request->except('_token');
        $usuario = auth()->user()->id;

        foreach ($respuestas as $key => $respuesta) {
            DatosUsuario::create([
                'respuesta' => $respuesta,
                'pregunta_id' => $key,
                'usuario_id' => $usuario
            ]);
        }

        return redirect()->route('home');
    }

    public function usuario_show()
    {
        $datos = auth()->user()->respuestas;
        if ($datos->count() < 0) {
            return redirect()->route('preguntas.usuario');
        }

        return view('preguntas.usuario', compact('datos'));
    }

    public function usuario_update(Request $request)
    {
        $respuestas = $request->except('_token');
        $usuario = auth()->user()->id;
        $respuestasUsuario = DatosUsuario::where('usuario_id', '=', $usuario)->get();

        foreach ($respuestasUsuario as $key => $respuesta) {
            $respuesta->update([
                'respuesta' => $respuestas[$key + 1]
            ]);
        }

        return redirect()->route('perfil');
    }
}

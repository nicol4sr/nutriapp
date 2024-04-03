<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEjercicioRequest;
use App\Models\User;
use App\Models\Ejercicio;
use App\Models\EjercicioParteCuerpo;
use App\Models\PartesCuerpo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EjercicioController extends Controller
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
        $ejercicios = Ejercicio::all();

        return view('planes.ejercicio.index', compact('ejercicios'));
    }

    public function difficulty(string $difficulty)
    {
        $dificultades = ['basico' => 0, 'intermedio' => 1, 'dificil' => 2];
        if (!array_key_exists($difficulty, $dificultades)) {
            return redirect('/ejercicios');
        }

        $usuario = auth()->user();
        $nacimiento = Carbon::parse($usuario->fecha_nacimiento)->format('Y-m-d');
        $edad = Carbon::now()->diffInYears($nacimiento);

        $ejercicios = User::role(['Administrador', 'Entrenador'])
            ->join('ejercicio', 'ejercicio.usuario_id', '=', 'users.id')
            ->join('datos_fisicos', 'datos_fisicos.usuario_id', '=', 'users.id')
            ->where('dificultad', '=', $dificultades[$difficulty])
            ->where('users.id', '!=', auth()->user()->id) // Specify the table name here
            ->whereIn('altura', ['altura_min', 'altura_max'])
            ->whereIn('peso', ['peso_min', 'peso_max'])
            ->where('edad_min', '>=', $edad)
            ->where('edad_max', '<=', $edad)
            ->select('ejercicio.id', 'nombre', 'descripcion', 'dificultad', 'ejercicio.genero', 'edad_min', 'edad_max', 'peso_min', 'peso_max', 'altura_min', 'altura_max', 'ejercicio.created_at', 'users.altura', 'users.fecha_nacimiento', 'datos_fisicos.peso')
            ->paginate(15);


        return view('planes.ejercicio.difficulty', compact('ejercicios', 'difficulty'));
    }

    public function personal()
    {
        $usuario = auth()->user();
        $id = $usuario->id;
        if (!$usuario->hasRole(['Administrador', 'Entrenador'])) {
            return back();
        }
        $ejercicios = Ejercicio::where('usuario_id', '=', $id)->paginate(15);

        return view('planes.ejercicio.difficulty', compact('ejercicios'));
    }

    public function create()
    {
        $grupos_musculares = PartesCuerpo::all();
        return view('planes.ejercicio.create', compact('grupos_musculares'));
    }

    public function store(StoreEjercicioRequest $request)
    {
        $validado = $request->validated();
        $ejercicio = Ejercicio::create($validado + ['usuario_id' => Auth::user()->id]);
        $grupo = $request->grupo;
        $explicacion = array_values(collect($request->explicacion)->filter()->toArray());

        for ($i = 0; $i < count($grupo); $i++) {
            if (!empty($grupo[$i])) {
                EjercicioParteCuerpo::create([
                    'descripcion' => $explicacion[$i],
                    'parte_cuerpo_id' => $grupo[$i],
                    'ejercicio_id' => $ejercicio->id,
                ]);
            }
        }

        return redirect('/ejercicios')->with('success', 'El plan fue registrado exitosamente');
    }

    public function edit(Ejercicio $ejercicio)
    {
        $grupos_musculares = PartesCuerpo::all();
        return view('planes.ejercicio.edit', compact('ejercicio', 'grupos_musculares'));
    }

    public function update(StoreEjercicioRequest $request, Ejercicio $ejercicio)
    {
        $validado = $request->validated();
        $ejercicio->update($validado);

        $grupo = $request->grupo;
        $explicacion = array_values(collect($request->explicacion)->filter()->toArray());

        $existingParteCuerpoIds = $ejercicio->ejercicio_partes->pluck('parte_cuerpo_id')->toArray();

        for ($i = 0; $i < count($grupo); $i++) {
            if (!empty($grupo[$i])) {
                if (in_array($grupo[$i], $existingParteCuerpoIds)) {
                    // Update the existing record
                    EjercicioParteCuerpo::where('ejercicio_id', $ejercicio->id)
                        ->where('parte_cuerpo_id', $grupo[$i])
                        ->update(['descripcion' => $explicacion[$i]]);
                } else {
                    EjercicioParteCuerpo::create([
                        'descripcion' => $explicacion[$i],
                        'parte_cuerpo_id' => $grupo[$i],
                        'ejercicio_id' => $ejercicio->id,
                    ]);
                }
            }
        }


        return redirect('/ejercicios')->with('success', 'El plan fue actualizado exitosamente');
    }

    public function delete(Ejercicio $ejercicio)
    {
        $ejercicio->delete();
        return redirect()->back();
    }

    public function show(Ejercicio $ejercicio)
    {
        return view('planes.ejercicio.show', compact('ejercicio'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEjercicioRequest;
use App\Models\Ejercicio;
use App\Models\PartesCuerpo;
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

        $ejercicios = Ejercicio::join('users', 'users.id', '=', 'ejercicio.usuario_id')
            ->join('rols', 'rols.id', '=', 'users.rol_id')
            ->where('dificultad', '=', $dificultades[$difficulty])
            ->where('usuario_id', '!=', auth()->user()->id)
            ->whereIn('rol', ['Administrador', 'Entrenador'])
            ->select('ejercicio.id', 'nombre', 'descripcion', 'dificultad', 'genero', 'edad_min', 'edad_max', 'peso_min', 'peso_max', 'altura_min', 'altura_max', 'parte_cuerpo_id', 'ejercicio.created_at')
            ->paginate(15);

        return view('planes.ejercicio.difficulty', compact('ejercicios', 'difficulty'));
    }

    public function personal()
    {
        $usuario_id = auth()->id();
        $ejercicios = Ejercicio::where('usuario_id', '=', $usuario_id)->paginate(15);

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
        Ejercicio::create($validado + ['usuario_id' => Auth::user()->id]);

        return redirect('/ejercicios');
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

        return redirect('/ejercicios');
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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEjercicioRequest;
use App\Models\Ejercicio;
use App\Models\PartesCuerpo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EjercicioController extends Controller
{
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

        $ejercicios = Ejercicio::where('dificultad', '=', $dificultades[$difficulty])->get();

        return view('planes.ejercicio.difficulty', compact('ejercicios', 'difficulty'));
    }

    public function personal()
    {
        $usuario_id = auth()->id();
        $ejercicios = Ejercicio::where('usuario_id', '=', $usuario_id)->get();

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

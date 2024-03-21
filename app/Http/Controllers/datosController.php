<?php

namespace App\Http\Controllers;

use App\Http\Requests\DatosRequest;
use App\Models\datos;
use App\Models\nacionalidades;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class datosController extends Controller
{
  public function index()
  {
    $datos = datos::paginate(15);

    return view('configuracion.datos_fisicos.index', compact('datos'));
  }

  public function create()
  {
    $nacionalidades = nacionalidades::all();
    $objetivos = Tipo::all();
    return view('configuracion.datos_fisicos.create', compact('nacionalidades', 'objetivos'));
  }

  public function store(DatosRequest $request)
  {
    $validado = $request->validated();
    datos::create($validado + ['usuario_id' => Auth::user()->id]);

    return redirect('/datos');
  }

  public function edit(datos $datos)
  {
    $nacionalidades = nacionalidades::all();
    $objetivos = Tipo::all();

    return view('configuracion.datos_fisicos.edit', compact('datos', 'nacionalidades', 'objetivos'));
  }

  public function update(DatosRequest $request,  datos $datos)
  {
    $validado = $request->validated();
    $datos->update($validado);

    return redirect('/datos');
  }



  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */

  public function show()
  {
    $datos = datos::all();

    return view('estadisticas.peso', compact('datos'));
  }
}

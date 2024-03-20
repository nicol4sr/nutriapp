<?php

namespace App\Http\Controllers;

use App\Http\Requests\EspecialistaRequest;
use App\Models\Especialista;
use Illuminate\Http\Request;

class EspecialistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Especialista::where('user_id', '=', auth()->user()->id)->first() !== null) {
            return redirect('/');
        }
        return view('especialista.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EspecialistaRequest $request)
    {
        if (Especialista::where('user_id', '=', auth()->user()->id)->first() !== null) {
            return redirect('/');
        }

        $validado = $request->validated();
        $ruta = $request->file('comprobante')->store('public/comprobantes');
        $ruta = str_replace("public/comprobantes/", "", $ruta);
        $datos = array_merge($validado, ['validado' => 0, 'comprobante' => $ruta, 'user_id' => auth()->id()]);
        Especialista::create($datos);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Especialista  $especialista
     * @return \Illuminate\Http\Response
     */
    public function show(Especialista $especialista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Especialista  $especialista
     * @return \Illuminate\Http\Response
     */
    public function edit(Especialista $especialista)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Especialista  $especialista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Especialista $especialista)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Especialista  $especialista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Especialista $especialista)
    {
        //
    }

    public function profile(Especialista $especialista)
    {
        return view('especialista.show', compact('especialista'));
    }

    public function validate_profile(Especialista $especialista)
    {
        $validar = $especialista->validado;
        $especialista->update(['validado' => $validar === 0 ? 1 : 0]);
        return redirect('/especialistas');
    }

    public function pending()
    {
        // $especialistas = Especialista::where('validado', '=', 0)->get();
        $especialistas = Especialista::all();
        return view('especialista.pending', compact('especialistas'));
    }
}

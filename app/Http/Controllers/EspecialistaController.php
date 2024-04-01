<?php

namespace App\Http\Controllers;

use App\Http\Requests\EspecialistaRequest;
use App\Models\Especialista;
use Illuminate\Http\Request;

class EspecialistaController extends Controller
{
    public function __construct()
    {
        // Valida la autenticación
        $this->middleware('auth');
        $this->middleware('prevent-back-history');
        $this->middleware('check_user_answer_data_form');
    }

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
        $especialistas = Especialista::paginate(15);
        return view('especialista.pending', compact('especialistas'));
    }
}

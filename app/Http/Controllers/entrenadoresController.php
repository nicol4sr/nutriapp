<?php

namespace App\Http\Controllers;

use App\Models\entrenadores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class entrenadoresController extends Controller
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
    public function index(entrenadores $entrenadores)
    {
        return view('especialistas.entrenador', compact('entrenadores'));
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
    public function store(Request $request)
    {
        $entrenadores = new entrenadores();

        $entrenadores->usuario_id = $request->usuario_id;
        $entrenadores->pg1 = $request->pg1;
        $entrenadores->pg2 = $request->pg2;
        $entrenadores->pg3 = $request->pg3;
        $entrenadores->pg4 = $request->pg4;
        $entrenadores->pg5 = $request->pg5;
        $entrenadores->pg6 = $request->pg6;
        $entrenadores->pg7 = $request->pg7;
        $entrenadores->pg8 = $request->pg8;


        $entrenadores->save();

        return view('especialistas.entrenador', compact('entrenadores'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

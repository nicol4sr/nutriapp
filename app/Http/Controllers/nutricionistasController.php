<?php

namespace App\Http\Controllers;

use App\Models\nutricionistas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class nutricionistasController extends Controller
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
    public function index(nutricionistas $nutricionistas)
    {
        return view('especialistas.nutricionistas', compact('nutricionistas'));
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
        $nutricionistas = new nutricionistas();

        $nutricionistas->usuario_id = $request->usuario_id;
        $nutricionistas->pg1 = $request->pg1;
        $nutricionistas->pg2 = $request->pg2;
        $nutricionistas->pg3 = $request->pg3;
        $nutricionistas->pg4 = $request->pg4;
        $nutricionistas->pg5 = $request->pg5;
        $nutricionistas->pg6 = $request->pg6;
        $nutricionistas->pg7 = $request->pg7;
        $nutricionistas->pg8 = $request->pg8;


        $nutricionistas->save();
        return view('especialistas.nutricionistas', compact('nutricionistas'));
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

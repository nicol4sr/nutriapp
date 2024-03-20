<?php

namespace App\Http\Controllers;

use App\Models\psicos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class psicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(psicos $psicos)
    {
         return view('configuracion.psicos', compact('psicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $psicos= new psicos ();

        $psicos->usuario_id = $request ->usuario_id;
        $psicos->pg1 = $request ->pg1;
        $psicos->pg2 = $request ->pg2;
        $psicos->pg3 = $request ->pg3;
        $psicos->pg4 = $request ->pg4;
        $psicos->pg5 = $request ->pg5;
        $psicos->pg6 = $request ->pg6;
        $psicos->pg7 = $request ->pg7;
        $psicos->pg8 = $request ->pg8;
       
       
        $psicos->save();
        return view('configuracion.psicos', compact('psicos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $psicos = psicos::where('usuario_id',  auth()->user()->id)->latest('created_at')->take(1)->get(); 
        return view('configuracion.editp', compact('psicos'));
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

<?php
namespace App\Http\Controllers;

use App\Models\datos;
use App\Models\nacionalidades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class datosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

     public function update (request $request,  datos $datos){
        
        $datos->usuario_id = $request ->usuario_id;
       $datos->genero = $request ->genero;
       $datos->objetivo = $request ->objetivo;
       $datos->habitos = $request ->habitos;
       $datos->pesoi = $request ->pesoi;
       $datos->altura = $request ->altura;
       $datos->edad = $request ->edad;

        $datos->save();

        return view('welcome');
      }
 
      public function new(datos $datos){
        return view('configuracion.datos', compact('datos'));
      }
     public function editar (datos $datos){
       return view('configuracion.editar', compact('datos'));
     }
 

     public function index()
    {
      
        $datos = datos::where('usuario_id',  auth()->user()->id)->latest('created_at')->take(1)->get(); 
        return view('configuracion.edit', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


public function seleccion()
{

}



     public function create()
    {
        return view('configuracion.datos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $nacionalidades=nacionalidades::all();

     
       $datos= new datos ();

       $datos->usuario_id = $request ->usuario_id;
       $datos->genero = $request ->genero;
       $datos->objetivo = $request ->objetivo;
       $datos->habitos = $request ->habitos;
       $datos->pesoi = $request ->pesoi;
       $datos->altura = $request ->altura;
       $datos->imc = $request ->imc;
       $datos->discapacidad = $request ->discapacidad;
       $datos->alergia = $request ->alergia;
       $datos->nacionalidad = $request ->nacionalidad;
       $datos->edad = $request ->edad;
       $datos->save();

      

       return view('configuracion.datos', compact('nacionalidades'));
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

        return view('estadisticas.peso' , compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
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

<?php

namespace App\Http\Controllers;

use App\Models\DatoFisico;
use Illuminate\Http\Request;

class DatosFisicos extends Controller
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
        $datos = DatoFisico::paginate(15);
        $ultimosDatos = DatoFisico::query()->latest()->first();
        return view('datos_fisicos.peso', compact('datos', 'ultimosDatos'));
    }

    public function store(Request $request)
    {
        DatoFisico::create([
            'altura' => $request->altura,
            'peso' => $request->peso,
            'usuario_id' => auth()->user()->id,
        ]);

        return redirect()->back();
    }

    public function delete(DatoFisico $datoFisico)
    {
        $datoFisico->delete();
        return redirect()->back();
    }

    public function pdf()
    {
        return redirect()->back();
    }
}

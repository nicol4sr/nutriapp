<?php

namespace App\Http\Controllers;

use App\Models\datos;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function index()
    {
        $datos = datos::select('peso', 'created_at')->get();
        return view('estadisticas.peso', compact('datos'));
    }
}

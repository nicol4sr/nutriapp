<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referencia;

class ReferenciaController extends Controller
{
    public function index()
    {
        $referencias = Referencia::all();

        return view('tabla.nutricional',compact('referencias'));
    }
}

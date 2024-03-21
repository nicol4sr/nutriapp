<?php

namespace App\Http\Controllers;

use App\Models\Nutricional;
use Illuminate\Http\Request;
use App\Models\Referencia;

class ReferenciaController extends Controller
{
    public function index()
    {
        $referencias = Nutricional::paginate(15);

        return view('tabla.nutricional', compact('referencias'));
    }
}

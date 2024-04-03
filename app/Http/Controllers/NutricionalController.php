<?php

namespace App\Http\Controllers;

use App\Models\Nutricional;
use Illuminate\Http\Request;

class NutricionalController extends Controller
{
    public function index()
    {
        return view('planes.nutricional');
    }

    public function datos()
    {
        $referencias = Nutricional::paginate(15);
        return view('tabla.nutricional', compact('referencias'));
    }
}

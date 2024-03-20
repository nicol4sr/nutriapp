<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NutricionalController extends Controller
{
    public function index()
    {
        return view('planes.nutricional');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        return view('profile.index', compact('usuario'));
    }

    public function edit()
    {
        $usuario = Auth::user();
        return view('profile.edit', compact('usuario'));
    }

    public function update(ProfileRequest $request)
    {
        $usuario = Auth::user();
        $path = $request->file('foto')->storeAs('imagenes', \Carbon\Carbon::now()->timestamp . '.jpg', 'public');
        $foto_anterior = $usuario->foto;
        Storage::delete('public/imagenes/' . $foto_anterior);

        $usuario = User::find($usuario->id);

        $validado = $request->validated();
        // $contrasena = Hash::make($request['new_password']);
        $usuario->update($validado + ['foto' => substr($path, 9)]);

        return redirect()->back();
    }
}

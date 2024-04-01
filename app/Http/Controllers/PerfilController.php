<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\nacionalidades;
use App\Models\Tipo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PerfilController extends Controller
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
        $usuario = Auth::user();
        return view('profile.index', compact('usuario'));
    }

    public function edit()
    {
        $usuario = Auth::user();
        $objetivos = Tipo::all('id', 'nombre');
        $nacionalidades = nacionalidades::all('id', 'pais');

        return view('profile.edit', compact('usuario', 'objetivos', 'nacionalidades'));
    }

    public function update(ProfileRequest $request)
    {
        $usuario = Auth::user();
        $path = $usuario->foto;

        $validado = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $usuario->id]
        ], [
            'email.unique' => 'El correo ya ha sido registrado.'
        ]);

        if ($validado->fails()) {
            return back()->with('error', 'Hubo un error al enviar los datos')->withErrors($validado);
        }

        $validado = $validado->validated();

        if ($request->file('foto')) {
            $path = $request->file('foto')->storeAs('imagenes', \Carbon\Carbon::now()->timestamp . '.jpg', 'public');
            $path = substr($path, 9);
            $foto_anterior = $usuario->foto;
            Storage::delete('public/imagenes/' . $foto_anterior);
        }

        $usuario = User::find($usuario->id);

        $usuario->update(
            $validado + [
                'foto' => $path,
                'genero' => $request['genero'],
                'fecha_nacimiento' => $request['fecha_nacimiento'],
                'nacionalidad_id' => $request['nacionalidad'],
                'objetivo_id' => $request['objetivo'],
                'habitos' => $request['habitos'],
            ]
        );

        return redirect()->back();
    }

    public function password()
    {
        $usuario = auth()->user();
        return view('profile.password', compact('usuario'));
    }

    public function password_update(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        $usuario = auth()->user();

        if (!Hash::check($request->old_password, $usuario->password)) {
            return back()->with('error', 'La contraseña anterior no coincide con la del usuario');
        }

        User::whereId($usuario->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('perfil')->with('success', 'La contraseña ha sido cambiada exitosamente');
    }
}

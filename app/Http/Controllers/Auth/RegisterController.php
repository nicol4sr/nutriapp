<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\nacionalidades;
use App\Models\Tipo;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $objetivos = Tipo::all('id', 'nombre');
        $nacionalidades = nacionalidades::all('id', 'pais');

        return view('auth.register', compact('objetivos', 'nacionalidades'));
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'genero' => ['required', 'string', 'boolean'],
            'fecha_nacimiento' => ['required', 'string'],
            'nacionalidad' => ['required', 'numeric', 'not_in:0'],
            'objetivo' => ['required', 'numeric', 'not_in:0'],
            'habitos' => ['required', 'numeric', 'between:0,4'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $rol = Role::where('name', '=', 'Usuario')->first();
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'genero' => $data['genero'],
            'fecha_nacimiento' => Carbon::parse($data['fecha_nacimiento'])->format('Y-m-d'),
            'nacionalidad_id' => $data['nacionalidad'],
            'objetivo_id' => $data['objetivo'],
            'habitos' => $data['habitos']
        ])->assignRole($rol);
    }
}

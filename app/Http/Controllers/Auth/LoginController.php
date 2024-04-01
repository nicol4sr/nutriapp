<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Password;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected $maxAttemps = 3;
    protected $decayMinutes = 1;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $usuario =
            DB::table('users')
            ->where('email', '=', $request->only('email'))
            ->first('email_blocked_at');

        if (isset($usuario->email_blocked_at)) {
            return back()->with(
                'error',
                'Su cuenta se encuentra bloqueada, compruebe el mensaje que se envió a su correo, si el enlace no funciona ingrese a "Olvidé mi contraseña" para actualizarla'
            );
        }
        $limiter = $this->limiter();
        $throttleKey = $this->throttleKey($request);
        $currentAttempt = $limiter->attempts($throttleKey);

        if ($this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            $this->clearLoginAttempts($request);

            return redirect()->intended('/');
        }

        if ($currentAttempt >= 2) {
            $campos = $request->only('email');
            $correo = $campos['email'];
            $this->incrementLoginAttempts($request);

            DB::table('users')
                ->where('email', '=', $correo)
                ->update([
                    'email_blocked_at' => \Carbon\Carbon::now()
                ]);


            $request->validate(['email' => 'required|email|exists:users']);

            Password::sendResetLink(
                $request->only('email')
            );

            return back()->with(
                'error',
                'Su cuenta ha sido bloqueada, hemos enviado un mensaje a su correo para desbloquearla.'
            );
        }

        $attemptsLeft = 2 - $currentAttempt;

        $this->incrementLoginAttempts($request);
        return back()->with(
            'error',
            'Las credenciales suministradas no coinciden con nuestros datos, intentos restantes: ' .  $attemptsLeft
        );
    }
}

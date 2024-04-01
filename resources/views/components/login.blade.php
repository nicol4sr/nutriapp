<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="container">
        <div class="form-group  mt-3">
            <label class="text-dark">Correo</label>
            <div class="input-group has-validation">
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Correo">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group mt-3">
            <label class="text-dark col-form-label" for="staticEmail">Contraseña</label>
            <div class="input-group has-validation">
                <input type="password" name="password"class="form-control @error('password') is-invalid @enderror"
                    placeholder="Contraseña">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <button type="submit" class="mt-3 register btn btn-primary w-100">
            Ingresa
        </button>
    </div>
    <div class="container signin text-center">
        <p class="text-muted">¿No tienes una cuenta?</p>
        <a href={{ route('register') }} class="d-block">Regístrate ahora</a>
        {{-- <a href={{ route('password') }} class="d-block">Olvidé mi contraseña</a> --}}
        <a href={{ route('password.request') }} class="d-block">Olvidé mi contraseña</a>
    </div>
</form>

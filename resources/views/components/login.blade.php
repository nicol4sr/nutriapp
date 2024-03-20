<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="container">
        <div class="form-group  mt-3">
            <label class="text-dark col-sm-4">Correo</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-fill"></i></span>
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
            <label class="text-dark col-sm-4 col-form-label" for="staticEmail">Contraseña</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-fill"></i></span>
                <input type="password" name="password"class="form-control @error('password') is-invalid @enderror"
                    placeholder="Contraseña">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <br>
        <input type="submit" class="register btn btn-primary w-100" value="Ingresar">
    </div>
    <div class="container signin">
        <p style="color: black;">¿No tienes una cuenta? <a href={{ route('register') }}>Regístrate ahora</a>.</p>
    </div>
</form>

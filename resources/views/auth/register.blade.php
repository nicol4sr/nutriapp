@extends('layouts.app')

@section('title', 'Registrarme')

@section('content')
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="col-md-4">
                <div class="d-flex justify-content-center py-4">
                            <a href="views/index.php" class="logo d-flex align-items-center w-auto">
                                <img src="/images/icons/icon.png" alt="">
                                <span class="d-none d-lg-block"></span>
                            </a>
                        </div>
                <div class="card">

                    <h4 class="mt-4 text-center">Crear cuenta</h4>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row">
                                <label for="name">Nombre</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Nombre"
                                        aria-label="name" autofocus />

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <label for="email">Correo</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                    <input type="text" name="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="Correo"
                                        aria-label="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <label for="password">Contraseña</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" name="password" value="{{ old('password') }}"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Contraseña" aria-label="password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <label for="password_confirmation">Confirmar contraseña</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        placeholder="Confirmar contraseña" aria-label="password_confirmation">

                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Crear usuario') }}
                                    </button>
                                </div>
                            </div>

                            <p class="small mt-3 text-center">¿Ya tienes una cuenta? <a href={{ route('home') }}>Entrar</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </div>
@endsection

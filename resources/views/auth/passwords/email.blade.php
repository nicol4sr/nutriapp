@extends('layouts.app')

@section('title', 'Olvidé mi contraseña')

@section('content')
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-4 d-flex flex-column align-items-center justify-content-center">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            Se ha enviado el mensaje a su correo
                        </div>
                    @endif

                    <div class="card">
                        <div class="d-flex justify-content-center">
                            <div class="pt-4 logo d-flex flex-column align-items-center">
                                <img src="/images/icons/icon.png" alt="">
                                <h5 class="card-title text-center pb-0 fs-4 " style="color: #22A7EA">
                                    Olvidé mi contraseña
                                </h5>
                                <p class="text-center text-muted">
                                    Enviaremos un mensaje a su correo para recuperar la contraseña
                                </p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-10 mx-auto">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="email">{{ __('Correo electrónico') }}</label>

                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="row mb-0">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Enviar correo') }}
                                        </button>
                                    </div>

                                    <div class="mt-2 container signin text-center">
                                        <a href="{{ route('login') }}" class="text-center">
                                            Inicio
                                        </a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

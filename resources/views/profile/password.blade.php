@extends('layouts.app')

@section('title', 'Actualizar contraseña')

@section('content')
    <div class="pagetitle">
        <h1>Perfil</h1>
    </div>

    <div class="mb-3 col-3">
        <a href="{{ route('perfil') }}" class="btn btn-primary w-100">
            <i class="bi bi-arrow-left"></i>Regresar
        </a>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="mx-auto col-6">

                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-body pt-3">
                        <form action="{{ route('actualizar-password') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label>Contraseña anterior</label>
                                <div class="input-group">
                                    <input type="password" name="old_password"
                                        class="form-control @error('old_password') is-invalid @enderror">

                                    @error('old_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label>Nueva contraseña</label>
                                <div class="input-group">
                                    <input type="password" name="new_password"
                                        class="form-control @error('new_password') is-invalid @enderror">

                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label>Confirmar nueva contraseña</label>
                                <div class="input-group">
                                    <input type="password" name="new_password_confirmation"
                                        class="form-control @error('new_password_confirmation') is-invalid @enderror">

                                    @error('new_password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <button class="btn btn-primary w-100">
                                Cambiar contraseña
                            </button>
                        </form>
                    </div>
                </div><!-- End Bordered Tabs -->
            </div>
        </div>
    </section>
@endsection

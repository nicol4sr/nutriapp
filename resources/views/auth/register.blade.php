@extends('layouts.app')

@section('title', 'Registrarme')

@php
    $habitos = [
        0 => 'No respeto horarios de comida',
        1 => 'Como dulce o alimentos azucardos con frecuencia',
        2 => 'Como comida chatarra, procesada o enlatada',
        3 => 'Consumo alimentos fritos',
    ];
@endphp

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
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Nombre"
                                        aria-label="name" autofocus required />

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
                                    <input type="text" name="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="Correo"
                                        aria-label="email" required>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label>Genero</label>
                                <div class="input-group mt-3 justify-content-between @error('genero') is-invalid @enderror">
                                    <label class="form-check-label @error('genero') is-invalid @enderror">
                                        <input type="radio" name="genero"
                                            class="form-check-input @error('genero') is-invalid @enderror" value="1"
                                            checked="{{ old('genero') === '1' }}" required />
                                        Femenino
                                    </label>
                                    <label class="form-check-label @error('genero') is-invalid @enderror">
                                        <input type="radio" class="form-check-input @error('genero') is-invalid @enderror"
                                            name="genero" value="0" checked="{{ old('genero') === '0' }}" required />
                                        Masculino
                                    </label>
                                    @error('genero')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                <div class="input-group mb-3">
                                    <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}"
                                        class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                        placeholder="Ej: 12/01/1988" aria-label="fecha_nacimiento" required>

                                    @error('fecha_nacimiento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center ">
                                <label>Nacionalidad</label>
                                <div class="input-group">
                                    <select name="nacionalidad"
                                        class="form-select @error('nacionalidad') is-invalid @enderror"
                                        aria-label="Default select example" required>
                                        <option value="" disabled
                                            {{ old('nacionalidad') === null ? 'selected' : '' }}>Seleccionar</option>
                                        @foreach ($nacionalidades as $nacionalidad)
                                            <option value="{{ $nacionalidad->id }}"
                                                {{ old('nacionalidad') === $nacionalidad->id ? 'selected' : '' }}>
                                                {{ $nacionalidad->pais }}</option>
                                        @endforeach
                                    </select>
                                    @error('nacionalidad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center ">
                                <label>Objetivo</label>
                                <div class="input-group">
                                    <select name="objetivo" class="form-select @error('objetivo') is-invalid @enderror"
                                        aria-label="Default select example" required>
                                        <option value="" disabled {{ old('objetivo') === null ? 'selected' : '' }}>
                                            Seleccionar</option>
                                        @foreach ($objetivos as $objetivo)
                                            <option value="{{ $objetivo->id }}"
                                                {{ old('objetivo') === $objetivo->id ? 'selected' : '' }}>
                                                {{ $objetivo->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('objetivo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center ">
                                <label>Hábitos</label>
                                <div class="input-group">
                                    <select name="habitos" class="form-select @error('habitos') is-invalid @enderror"
                                        aria-label="Default select example" required>
                                        <option value="" disabled {{ old('habitos') === null ? 'selected' : '' }}>
                                            Seleccionar</option>
                                        @foreach ($habitos as $key => $habito)
                                            <option value="{{ $key }}"
                                                {{ old('habitos') === $key ? 'selected' : '' }}>{{ $habito }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('habitos')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <label for="password">Contraseña</label>
                                <div class="input-group mb-3">
                                    <input type="password" name="password" value="{{ old('password') }}"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Contraseña" aria-label="password" required>

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
                                    <input type="password" name="password_confirmation"
                                        value="{{ old('password_confirmation') }}"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        placeholder="Confirmar contraseña" aria-label="password_confirmation" required>

                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">
                                {{ __('Crear usuario') }}
                            </button>

                            <div class="text-center">
                                <p class="text-muted">¿Ya tienes una cuenta?</p>
                                <a href={{ route('login') }}>Entrar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </div>
@endsection

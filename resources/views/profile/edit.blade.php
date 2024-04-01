@extends('layouts.app')

@section('title', 'Perfil')

@section('js')
    <script src="{{ asset('js/imagePreview.js') }}"></script>
@endsection

@php
    $habitos = [
        0 => 'No respeto horarios de comida',
        1 => 'Como dulce o alimentos azucardos con frecuencia',
        2 => 'Como comida chatarra, procesada o enlatada',
        3 => 'Consumo alimentos fritos',
    ];
@endphp

@section('content')

    <div class="pagetitle">
        <h1>Perfil</h1>
    </div>
    <div class="mb-3 col-3">
        <a href="{{ route('perfil') }}" class="btn btn-primary w-100"> <i class="bi bi-arrow-left">
            </i>Regresar</a></a>
    </div>

    <section class="mb-5 section profile">
        <form method="POST" action="{{ route('actualizar-perfil') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="mx-auto col-8">

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="mx-auto">

                        <div class="card">
                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                <div class="col-8">

                                    <img src="{{ $usuario->foto == null ? asset('images/users/profile_0.png') : asset('storage/imagenes/' . $usuario->foto) }}"
                                        id="preview" alt="Profile" class="d-flex mb-2 mx-auto rounded-circle">
                                    <div class="input-group mb-3">
                                        <div class="mx-auto custom-file">
                                            <input class="upload" type="file" name="foto"
                                                accept="image/png, image/jpeg, image/jpg" onchange="loadImage(event)">
                                        </div>
                                    </div>
                                    @error('foto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div class="row mb-3 justify-content-center">
                                        <label>Nombre</label>
                                        <div class="col-12">
                                            <div class="input-group">
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="Jose" value="{{ $usuario->name }}">

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3 justify-content-center">
                                        <label>Genero</label>
                                        <div
                                            class="input-group justify-content-between @error('genero') is-invalid @enderror">
                                            <label class="form-check-label @error('genero') is-invalid @enderror">
                                                <input type="radio" name="genero"
                                                    class="form-check-input @error('genero') is-invalid @enderror"
                                                    value="1" {{ $usuario->genero === 1 ? 'checked' : '' }} />
                                                Femenino
                                            </label>
                                            <label class="form-check-label @error('genero') is-invalid @enderror">
                                                <input type="radio"
                                                    class="form-check-input @error('genero') is-invalid @enderror"
                                                    name="genero" value="0"
                                                    {{ $usuario->genero === 0 ? 'checked' : '' }} />
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
                                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                            <input type="date" name="fecha_nacimiento"
                                                value="{{ \Carbon\Carbon::parse($usuario->fecha_nacimiento)->format('Y-m-d') }}"
                                                class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                                placeholder="Ej: 12/01/1988" aria-label="fecha_nacimiento">

                                            @error('fecha_nacimiento')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row mb-3 justify-content-center">
                                        <label>Correo</label>
                                        <div class="col-12">
                                            <div class="input-group">
                                                <input type="text" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Jose" value="{{ $usuario->email }}">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3 justify-content-center ">
                                        <label>Nacionalidad</label>

                                        <div class="input-group">
                                            <select name="nacionalidad"
                                                class="form-select @error('nacionalidad') is-invalid @enderror"
                                                aria-label="Default select example">
                                                <option value="" disabled>Seleccionar</option>
                                                @foreach ($nacionalidades as $nacionalidad)
                                                    <option value="{{ $nacionalidad->id }}"
                                                        {{ $usuario->nacionalidad_id === $nacionalidad->id ? 'selected' : '' }}>
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
                                            <select name="objetivo"
                                                class="form-select @error('objetivo') is-invalid @enderror"
                                                aria-label="Default select example">
                                                <option value="" disabled>
                                                    Seleccionar</option>
                                                @foreach ($objetivos as $objetivo)
                                                    <option value="{{ $objetivo->id }}"
                                                        {{ $usuario->objetivo_id === $objetivo->id ? 'selected' : '' }}>
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
                                            <select name="habitos"
                                                class="form-select @error('habitos') is-invalid @enderror"
                                                aria-label="Default select example">
                                                <option value="" disabled>
                                                    Seleccionar</option>
                                                @foreach ($habitos as $key => $habito)
                                                    <option value="{{ $key }}"
                                                        {{ $usuario->habitos === $key ? 'selected' : '' }}>
                                                        {{ $habito }}
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

                                    <div class="row mb-3 px-3">
                                        <button type="submit" class="btn btn-primary w-100">Actualizar</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection

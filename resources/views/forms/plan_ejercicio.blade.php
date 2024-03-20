@extends('layouts.app')

@section('title', 'Plan de ejercicio')

@section('content')
    <div class="pagetitle">
        <h1>Crear Plan de Ejercicios</h1>
        <nav>
            <!-- <ol class="breadcrumb">
                                                                                                                                                                  <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                                                                                                                                                                </ol> -->
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row justify-content-center">

            <!-- Left side columns -->
            <div class="col-lg-11">
                <div class="row">

                    <div class="card">
                        <div class="card-body">


                            <!-- General Form Elements -->
                            <form method="POST" action="{{ route('guardar-ejercicio') }}">
                                @csrf
                                <div class="mb-3 has-validation">
                                    <label for="nombre" class="col-sm-2 col-form-label">Nombre del plan</label>
                                    <input type="text" name="nombre"
                                        class="form-control @error('nombre') is-invalid @enderror"
                                        placeholder="Nombre del plan">
                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 has-validation">
                                    <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
                                    <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" style="height: 100px"
                                        placeholder="Descripción"></textarea>
                                    @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 has-validation">
                                    <label for="objetivo" class="col-sm-2 col-form-label">Objetivo</label>
                                    <select name="objetivo" class="form-select @error('objetivo') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option value="" disabled selected>Seleccionar</option>
                                        <option value="1">Subir de Peso</option>
                                        <option value="2">Bajar de Peso</option>
                                        <option value="3">Buena Salud</option>
                                        <option value="4">Terapia</option>
                                    </select>
                                    @error('objetivo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 has-validation">
                                    <label class="col-form-label">Grupo muscular</label>

                                    <div class="col-sm-10">
                                        @foreach ($grupos_musculares as $grupo)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="{{ $grupo->id }}"
                                                    name="grupo_muscular[]">
                                                <label class="form-check-label" for="{{ $grupo->id }}">
                                                    {{ $grupo->nombre }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>

                                    @error('grupo_muscular')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 has-validation">
                                    <label for="grupo_muscular" class="col-sm-2 col-form-label">Grupo muscular</label>
                                    <select name="grupo_muscular"
                                        class="form-select @error('grupo_muscular') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option value="" disabled selected>Seleccionar</option>
                                        @foreach ($grupos_musculares as $grupo)
                                            <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                                        @endforeach
                                    </select>

                                    @error('grupo_muscular')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 has-validation">
                                    <label for="horario" class="col-sm-2 col-form-label">Horario</label>
                                    <select name="horario" class="form-select @error('horario') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option value="" disabled selected>Seleccionar</option>
                                        <option value="1">Lunes a Viernes</option>
                                        <option value="2">Lunes-Miercoles-Viernes</option>
                                        <option value="3">Lunes a Jueves</option>
                                        <option value="4">Martes-Jueves-Sabado</option>
                                    </select>
                                    @error('horario')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="row mb-3 text-center">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary w-50">Crear</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

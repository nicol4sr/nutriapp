@extends('layouts.app')

@section('title', 'Actualizar ejercicio')

@section('content')
    <div class="pagetitle">

        <nav>
            <!-- <ol class="breadcrumb">
                                                                                                                                              <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                                                                                                                                            </ol> -->
        </nav>
    </div>
    <h1>Actualizar Ejercicio</h1>
    <section class="section">

        <!-- Left side columns -->
        <div class="col-lg-10">
            <div class="row">

                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">


                            <!-- General Form Elements -->
                            <form method="POST" action="{{ route('actualizar-ejercicio', $ejercicio->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3 justify-content-center ">
                                    <label for="inputText">Nombre del ejercicio</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="text" name="nombre" placeholder="Entrenamiento Bryon"
                                                class="form-control @error('nombre') is-invalid @enderror"
                                                value="{{ $ejercicio->nombre }}" required>

                                            @error('nombre')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label>Género</label>
                                    <div class="col-lg-8">
                                        <div class="input-group mt-3">
                                            <select name="genero"
                                                class="form-control @error('genero') is-invalid @enderror" required>
                                                <option value="" selected disabled>Seleccione genero</option>
                                                <option value="1" selected="{{ $ejercicio->genero === 1 }}">Femenino
                                                </option>
                                                <option value="2" selected="{{ $ejercicio->genero === 2 }}">Masculino
                                                </option>
                                            </select>

                                            @error('genero')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label>Parte del cuerpo</label>
                                    <div class="col-lg-8">
                                        <div class="input-group mt-3">
                                            <select name="partes_cuerpos_id"
                                                class="form-control @error('partes_cuerpos_id') is-invalid @enderror"
                                                required>
                                                <option value="" selected disabled>Seleccione parte del cuerpo
                                                </option>
                                                @foreach ($partes_cuerpo as $parte)
                                                    <option value="{{ $parte->id }}"
                                                        {{ $ejercicio->partes_cuerpos_id === $parte->id ? 'selected' : '' }}>
                                                        {{ $parte->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('partes_cuerpos_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-3 text-center">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary w-50">Actualizar</button>
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

@extends('layouts.app')

@section('title', 'Actualizar receta')

@section('css')
    <link href="{{ asset('/plugins/select2/select2.min.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>

    <script>
        const items = @json($alimentos);
    </script>

    <script src="{{ asset('/js/calculadora.js') }}"></script>
    <script src="{{ asset('/plugins/select2/select2.min.js') }}"></script>
@endsection

@section('content')
    <div class="pagetitle">

        <nav>
            <!-- <ol class="breadcrumb">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </ol> -->
        </nav>
    </div>
    <h1>Actualizar Receta</h1>
    <div class="col-4 mb-4">
        <a href="{{ route('receta') }}" class="btn btn-primary w-50"> <i class="bi bi-arrow-left"> </i>Regresar</a>
    </div>
    <section class="section">

        <!-- Left side columns -->
        <div class="col-lg-10">
            <div class="row">

                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">


                            <!-- General Form Elements -->
                            <form method="POST" action="{{ route('actualizar-receta', $receta->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3 justify-content-center ">
                                    <label for="inputText">Nombre de la receta</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">

                                            <input type="text" name="nombre"
                                                class="form-control @error('nombre') is-invalid @enderror"
                                                placeholder="Arroz con avena" value="{{ $receta->nombre }}">

                                            @error('nombre')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center ">
                                    <label for="inputText">Descripción</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">

                                            <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror"
                                                placeholder="Receta alta en proteínas, ideal para mantener una figura saludable">{{ $receta->descripcion }}</textarea>

                                            @error('descripcion')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label>Edad</label>
                                    <div class="col-lg-8">
                                        <div class="input-group mt-3">
                                            <input type="number" name="edad"
                                                class="form-control @error('edad') is-invalid @enderror" placeholder="48"
                                                value="{{ $receta->edad }}">

                                            @error('edad')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label>Genero</label>
                                    <div class="col-lg-8">
                                        <div class="input-group mt-3 justify-content-evenly">
                                            <label>
                                                <input type="radio" name="genero" value="0"
                                                    {{ (int) $receta->genero === 0 ? 'checked' : '' }} />
                                                Femenino
                                            </label>
                                            <label>
                                                <input type="radio" name="genero" value="1"
                                                    {{ (int) $receta->genero === 1 ? 'checked' : '' }} />
                                                Masculino
                                            </label>

                                            @error('genero')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label>Tipo</label>
                                    <div class="col-lg-8">
                                        <div class="input-group mt-3">
                                            <select name="tipo_id"
                                                class="form-control @error('tipo_id') is-invalid @enderror">
                                                <option value="" disabled selected>Seleccione el tipo de receta
                                                </option>
                                                @foreach ($tipos as $tipo)
                                                    <option value="{{ $tipo->id }}"
                                                        {{ $receta->tipo_id === $tipo->id ? 'selected' : '' }}>
                                                        {{ $tipo->nombre }}</option>
                                                @endforeach
                                            </select>

                                            @error('tipo_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label>Comida</label>
                                    <div class="col-lg-8">
                                        <div class="input-group mt-3">
                                            <select name="comida_id"
                                                class="form-control @error('comida_id') is-invalid @enderror">
                                                <option value="" disabled selected>Seleccione una comida</option>
                                                @foreach ($comidas as $comida)
                                                    <option value="{{ $comida->id }}"
                                                        {{ $receta->comida_id === $comida->id ? 'selected' : '' }}>
                                                        {{ $comida->nombre }}</option>
                                                @endforeach
                                            </select>


                                            @error('comida_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label>Alimentos</label>
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <select
                                                class="form-select js-example-basic-multiple @error('alimento') is-invalid @enderror"
                                                name="alimento[]" id="alimento" multiple>
                                                @foreach ($alimentos as $alimento)
                                                    <option value="{{ $alimento->id }}"
                                                        {{ $receta->alimentos->contains($alimento) ? 'selected' : '' }}>
                                                        {{ $alimento->nombre }}</option>
                                                @endforeach
                                            </select>

                                            @error('alimento')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <div class="col-sm-12 col-lg-8">

                                        <div class="table-responsive-sm">
                                            <table class="table table-hover">
                                                <caption>Valores promedio de los alimentos seleccionados</caption>
                                                <thead>
                                                    <tr>
                                                        <th>Calorías</th>
                                                        <th>Proteínas</th>
                                                        <th>HC</th>
                                                        <th>Grasas</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <p id="calorias">0</p>
                                                        </td>
                                                        <td>
                                                            <p id="proteinas">0</p>
                                                        </td>
                                                        <td>
                                                            <p id="hc">0</p>
                                                        </td>
                                                        <td>
                                                            <p id="grasas">0</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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

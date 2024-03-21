@extends('layouts.app')

@section('title', 'Datos físicos')

@php
    $options = [
        'No respeto horarios de comida',
        'Como dulce o alimentos azucardos con frecuencia',
        'Como comida chatarra, procesada o enlatada',
        'Consumo alimentos fritos',
    ];
@endphp

@section('css')
    <link href="css/reco.css" rel="stylesheet">
@endsection

@section('js')
    {{-- <script src="js/reco.js"></script> --}}
    <script>
        document.getElementById('altura').addEventListener('input', function() {
            if (this.value.length > 2) {
                var val = this.value.replace(/[^\d]/, '');
                val = val.substr(0, val.length - 2) + "." + val.substr(-2);
                this.value = val;
            }
        });
    </script>
@endsection

@section('content')
    <section>

        <section class="section">

            <!-- Left side columns -->
            <div class="col-lg-10">
                <div class="row">

                    <div class="card">
                        <div class="card-body">
                            <div class="row text-center">
                                <h3>Colocar datos fiscos</h3>

                                <!-- General Form Elements -->
                                <form method="POST"action="{{ route('actualizar-datos', $datos->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3 justify-content-center">
                                        <label>¿Cual es su Nacionalidad?</label>
                                        <div class="col-lg-8">
                                            <div>
                                                <div class="input-group mt-3">
                                                    <select name="nacionalidad_id"
                                                        class="form-control @error('tipos') is-invalid @enderror">
                                                        <option value="" selected disabled>Seleciona tu Nacionalidad
                                                        </option>
                                                        @foreach ($nacionalidades as $nacionalidad)
                                                            <option value="{{ $nacionalidad->id }}"
                                                                {{ $nacionalidad->id === $datos->nacionalidad_id ? 'selected' : '' }}>
                                                                {{ $nacionalidad->pais }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="valid-feedback">listo</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row mb-3 justify-content-center">
                                        <label>¿Cual es tu objetivo?</label>
                                        <div class="col-lg-8">
                                            <div>
                                                <div class="input-group mt-3">
                                                    <select name="objetivo_id"
                                                        class="form-control @error('objetivo_id') is-invalid @enderror">
                                                        <option value=""selected disabled>seleciona tus objetivo
                                                        </option>
                                                        @foreach ($objetivos as $objetivo)
                                                            <option value="{{ $objetivo->id }}"
                                                                {{ $objetivo->id === $datos->objetivo_id ? 'selected' : '' }}>
                                                                {{ $objetivo->nombre }}</option>
                                                        @endforeach
                                                        </option>
                                                    </select>
                                                    <div class="valid-feedback">listo</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row mb-3 justify-content-center">
                                        <label>¿Que Habitos Alimenticios Tiene?</label>
                                        <div class="col-lg-8">
                                            <div>
                                                <div class="input-group mt-3">
                                                    <select id="habitos" name="habitos"
                                                        class="form-control @error('tipos') is-invalid @enderror">
                                                        <option value=""selected disabled>seleciona tus habitos
                                                        </option>
                                                        @foreach ($options as $key => $habito)
                                                            <option value="{{ $key }}"
                                                                {{ $key === $datos->habitos ? 'selected' : '' }}>
                                                                {{ $habito }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="valid-feedback">listo</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row mb-3 justify-content-center">
                                        <label>¿Cual es tu Genero?</label>
                                        <div class="col-lg-8">
                                            <div>
                                                <div class="input-group mt-3">
                                                    <select id="genero" name="genero"
                                                        class="form-control @error('tipos') is-invalid @enderror">
                                                        <option value="" selected disabled>Seleciona tu genero
                                                        </option>
                                                        <option value="0"
                                                            {{ $datos->genero === 0 ? 'selected' : '' }}>Femenino</option>
                                                        <option value="1"
                                                            {{ $datos->genero === 1 ? 'selected' : '' }}>Masculino</option>
                                                    </select>
                                                    <div class="valid-feedback">listo</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row mb-3 justify-content-center ">
                                        <label for="inputText">¿Cual es tu Peso? (Kg) </label>
                                        <div class="col-lg-8">
                                            <input type="number" name="peso" class="form-control"
                                                value="{{ $datos->peso }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3 justify-content-center ">
                                        <label for="inputText">¿Cual es tu Altura? (Cm)</label>
                                        <div class="col-lg-8">
                                            <input type="number" id="altura" name="altura" class="form-control"
                                                value="{{ $datos->altura }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3 justify-content-center">
                                        <label for="inputText">¿Tiene Alguna Discapacidad?</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="discapacidad" class="form-control"
                                                value="{{ $datos->discapacidad }}">

                                        </div>
                                    </div>

                                    <div class="row mb-3 justify-content-center">
                                        <label for="inputText">¿Tiene Alguna Alergia ?</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="alergia" class="form-control"
                                                value="{{ $datos->alergia }}">

                                        </div>
                                    </div>
                                    <div class="row mb-3 justify-content-center ">
                                        <label for="inputText">Fecha de nacimiento</label>
                                        <div class="col-lg-8">

                                            <input type="date" name="nacimiento"
                                                class="form-control @error('nacimiento') is-invalid @enderror"
                                                value="{{ \Carbon\Carbon::parse($datos->nacimiento)->format('Y-m-d') }}">
                                            <div class="valid-feedback">listo</div>
                                        </div>

                                    </div>
                                    <div class="row mb-3 justify-content-center">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary w-50">Actualizar</button>
                                        </div>
                                    </div>
                            </div>

                            </form><!-- End General Form Elements -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection

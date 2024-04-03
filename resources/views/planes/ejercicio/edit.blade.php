@extends('layouts.app')

@section('title', 'Editar plan de ejercicios')

@section('js')
    <script>
        const altura_min = document.getElementById('altura_min')
        const altura_max = document.getElementById('altura_max')

        altura_max.addEventListener('input', function() {
            if (this.value.length > 2) {
                var val = this.value.replace(/[^\d]/, '')
                val = val.substr(0, val.length - 2) + "." + val.substr(-2)
                this.value = val
            }
        })
        altura_min.addEventListener('input', function() {
            if (this.value.length > 2) {
                var val = this.value.replace(/[^\d]/, '')
                val = val.substr(0, val.length - 2) + "." + val.substr(-2)
                this.value = val
            }
        })
    </script>
@endsection

@section('content')

    <div class="pagetitle">
        <h1>Plan de Ejercicios</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Seleccionar Modo</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="col-4 mb-4">
        <a href="{{ route('ejercicios') }}" class="btn btn-primary w-50"> <i class="bi bi-arrow-left"> </i>Regresar</a>
    </div>

    <h1>Editar Plan de ejercicios</h1>
    <section class="section">

        <!-- Left side columns -->
        <div class="col-lg-10">

            <div class="card">
                <div class="card-body">
                    <div class="row text-center">

                        {{-- @dd($errors) --}}


                        <!-- General Form Elements -->
                        <form method="POST" action="{{ route('actualizar-ejercicio', $ejercicio) }}">
                            @csrf
                            @method('PUT')

                            <div class="mx-auto col-lg-8">

                                <div class="row mb-3 justify-content-center ">
                                    <label for="inputText">Nombre del plan</label>
                                    <div class="input-group">

                                        <input type="text" name="nombre"
                                            class="form-control @error('nombre') is-invalid @enderror"
                                            placeholder="Cardio prolongado" value="{{ $ejercicio->nombre }}">

                                        @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center ">
                                    <label>Dificultad</label>

                                    <div class="input-group">
                                        <select name="dificultad"
                                            class="form-select @error('dificultad') is-invalid @enderror"
                                            aria-label="Default select example">
                                            <option value="" disabled selected>Seleccionar</option>
                                            <option value="0" {{ $ejercicio->dificultad === 0 ? 'selected' : '' }}>
                                                Básico</option>
                                            <option value="1" {{ $ejercicio->dificultad === 1 ? 'selected' : '' }}>
                                                Intermedio</option>
                                            <option value="2" {{ $ejercicio->dificultad === 2 ? 'selected' : '' }}>
                                                Difícil</option>
                                        </select>
                                        @error('dificultad')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center ">
                                    <label for="inputText">Descripción</label>
                                    <div class="input-group">

                                        <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror"
                                            placeholder="Lleva a cabo 3 sets de 10 sentadillas durante 45 mins">{{ $ejercicio->descripcion }}</textarea>

                                        @error('descripcion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label>Genero</label>
                                    <div class="col-lg-8">
                                        <div class="input-group mt-3 justify-content-evenly">
                                            <label>
                                                <input type="radio" name="genero" value="0"
                                                    {{ $ejercicio->genero === 0 ? 'checked' : '' }} />
                                                Femenino
                                            </label>
                                            <label>
                                                <input type="radio" name="genero" value="1"
                                                    {{ $ejercicio->genero === 1 ? 'checked' : '' }} />
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
                                    <label>Rango de edad</label>
                                    <div class="col">
                                        <label>Mínima</label>
                                        <div class="input-group mt-3">
                                            <input type="number" name="edad_min"
                                                class="form-control @error('edad_min') is-invalid @enderror"
                                                placeholder="20" value="{{ $ejercicio->edad_min }}">

                                            @error('edad_min')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Máxima</label>
                                        <div class="input-group mt-3">
                                            <input type="number" name="edad_max"
                                                class="form-control @error('edad_max') is-invalid @enderror"
                                                placeholder="25" value="{{ $ejercicio->edad_max }}">

                                            @error('edad_max')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label>Rango de peso</label>
                                    <div class="col">
                                        <label>Mínimo</label>
                                        <div class="input-group mt-3">
                                            <input type="number" name="peso_min"
                                                class="form-control @error('peso_min') is-invalid @enderror"
                                                placeholder="20" value="{{ $ejercicio->peso_min }}">

                                            @error('peso_min')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Máximo</label>
                                        <div class="input-group mt-3">
                                            <input type="number" name="peso_max"
                                                class="form-control @error('peso_max') is-invalid @enderror"
                                                placeholder="25" value="{{ $ejercicio->peso_max }}">

                                            @error('peso_max')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label>Rango de altura (cm)</label>
                                    <div class="col">
                                        <label>Mínima</label>
                                        <div class="input-group mt-3">
                                            <input id="altura_min" step="0.01" type="number" name="altura_min"
                                                class="form-control @error('altura_min') is-invalid @enderror"
                                                placeholder="20" value="{{ $ejercicio->altura_min }}">

                                            @error('altura_min')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Máxima</label>
                                        <div class="input-group mt-3">
                                            <input id="altura_max" step="0.01" type="number" name="altura_max"
                                                class="form-control @error('altura_max') is-invalid @enderror"
                                                placeholder="25" value="{{ $ejercicio->altura_max }}">

                                            @error('altura_max')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 has-validation">
                                    <p class="col-form-label">Parte del cuerpo a trabajar</p>
                                    <div class="row">
                                        @foreach ($grupos_musculares as $grupo)
                                            @php
                                                $check = in_array(
                                                    $grupo->id,
                                                    $ejercicio->ejercicio_partes->pluck('parte_cuerpo_id')->toArray(),
                                                );
                                            @endphp
                                            <label>
                                                {{ $grupo->nombre }}
                                                <input type="checkbox" name="grupo[]" value="{{ $grupo->id }}"
                                                    {{ $check ? 'checked' : '' }}>
                                            </label>
                                            <textarea name="explicacion[]" cols="30" rows="4">{{ $check ? $ejercicio->ejercicio_partes[0]->descripcion : '' }}</textarea>
                                        @endforeach

                                    </div>


                                </div>

                                <div class="row mb-3 text-center">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary w-50">Actualizar</button>
                                    </div>
                                </div>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@extends('layouts.app')

@section('title', 'Datos del usuario')

@php
    $tipos = [0 => 'Psicológica', 1 => 'Física', 2 => 'Calórica'];
@endphp

@section('content')
    <div class="pagetitle">
        <h1 class="h2">Datos del usuario</h1>
    </div><!-- End Page Title -->

    <div class="row">

        <div class="col-4 mb-4">
            <a href="{{ route('consultas.index') }}" class="btn btn-primary w-100"> <i class="bi bi-arrow-left">
                </i>Regresar</a>
        </div>

        <div class="col-4 mb-4">
            <x-modal id="respuesta" title="Respuesta" :route="route('consultas.response', $consulta)">
                @method('PUT')
                <div class="col-8 mx-auto text-center">

                    <p class="text-muted" style="text-align: justify">De al usuario una retroalimentación o respuesta acorde
                        a los datos que recien
                        visualizó</p>
                    <div class="row">
                        <div class="mb-3 has-validation">
                            <label for="respuesta" class="d-block">Respuesta</label>
                            <textarea id="respuesta" name="respuesta" class="form-control" style="height: 300px"
                                placeholder="Coloque su respuesta..." required>{{ $consulta->respuesta }}</textarea>
                        </div>
                    </div>

                    @error('{{ $pregunta->id }}')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <button class="btn btn-primary mx-auto">
                        Enviar respuesta
                    </button>
                </div>

            </x-modal>
            <x-modal_button id="respuesta">
                <i class="bis bi bi-question"></i>
                respuesta
            </x-modal_button>
        </div>
    </div>

    <section class="section dashboard mb-5">
        <div class="col-8 mx-auto">
            @foreach ($preguntas as $pregunta)
                <div class="row">
                    <div class="mb-3 has-validation">
                        <p class="d-block">{{ $pregunta->pregunta->nombre }}</label>
                            <span class="text-muted">(Nota, pregunta {{ $tipos[$pregunta->pregunta->tipo] }})</span>
                        <p class="bg-white border rounded p-2 text-muted" style="height: 100px">
                            {{ $pregunta->respuesta }}
                        </p>
                    </div>
                </div>

                @error('{{ $pregunta->id }}')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            @endforeach
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('title', 'Receta nutricional')

@php
    $tipos = [0 => 'Psicológica', 1 => 'Física', 2 => 'Calórica'];
@endphp

@section('content')
    <div class="pagetitle">
        <h1 class="h2">Datos del usuario</h1>
    </div><!-- End Page Title -->

    @if (isset($datos))
        <div class="col-4 mb-4">
            <a href="{{ route('perfil') }}" class="btn btn-primary w-100"> <i class="bi bi-arrow-left"> </i>Regresar</a>
        </div>
    @endif

    <section class="section dashboard mb-5">
        <div class="col-8 mx-auto">
            @if (isset($preguntas))
                <form action="{{ route('preguntas_usuario.store') }}" method="POST">
                    @csrf
                    @foreach ($preguntas as $pregunta)
                        <div class="row">
                            <div class="mb-3 has-validation">
                                <label for="{{ $pregunta->id }}" class="d-block">{{ $pregunta->nombre }}</label>
                                <span class="text-muted">(Nota, pregunta {{ $tipos[$pregunta->tipo] }})</span>
                                <textarea id="{{ $pregunta->id }}" name="{{ $pregunta->id }}"
                                    class="form-control @error('{{ $pregunta->id }}') is-invalid @enderror" style="height: 100px"
                                    placeholder="Coloque su respuesta..." required></textarea>
                                @error('{{ $pregunta->id }}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    @endforeach
                    <div class="row px-3">
                        <button type="submit" class="btn btn-primary">Enviar datos</button>
                    </div>
                </form>
            @endif

            @if (isset($datos))
                <form action="{{ route('preguntas_usuario.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    @foreach ($datos as $datos)
                        <div class="row">
                            <div class="mb-3 has-validation">
                                <label for="{{ $datos->pregunta->id }}"
                                    class="d-block">{{ $datos->pregunta->nombre }}</label>
                                <span class="text-muted">(Nota, pregunta {{ $tipos[$datos->pregunta->tipo] }})</span>
                                <textarea id="{{ $datos->pregunta->id }}" name="{{ $datos->pregunta->id }}" class="form-control" style="height: 100px"
                                    placeholder="Coloque su respuesta..." required>{{ $datos->respuesta }}</textarea>
                            </div>
                        </div>

                        @error('{{ $pregunta->id }}')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    @endforeach

                    <div class="row px-3">
                        <button type="submit" class="btn btn-primary">Actualizar datos</button>
                    </div>
                </form>
            @endif
        </div>
    </section>
@endsection

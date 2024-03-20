@extends('layouts.app')

@section('title', 'Plan de ejercicios')

@php
    $generos = [0 => 'Femenino', 1 => 'Masculino'];
@endphp

@section('content')

    <div class="pagetitle">
        <h1>Plan de Ejercicios ({{ $difficulty ?? 'Mis planes' }})</h1>
    </div>

    <div class="col-4 mb-4">
        <a href="{{ route('ejercicios') }}" class="btn btn-primary w-50"> <i class="bi bi-arrow-left"> </i>Regresar</a>
    </div>

    <section class="section">
        <div class="row">
            @foreach ($ejercicios as $ejercicio)
                @php
                    $imc_min = number_format($ejercicio->peso_min / ($ejercicio->altura_min * $ejercicio->altura_min), 2);
                    $imc_max = number_format($ejercicio->peso_max / ($ejercicio->altura_max * $ejercicio->altura_max), 2);
                @endphp
                <div class="card p-0">
                    <div class="card-header">
                        {{ $ejercicio->nombre }}
                        @if (!isset($difficulty))
                            <div class="btn-group">
                                <a href="{{ route('ejercicios-editar', $ejercicio->id) }}" class="btn btn-primary">
                                    Editar</a>
                                <form action="{{ route('borrar-ejercicio', $ejercicio) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                </form>
                            </div>
                        @endif
                        <a href="{{ route('ver-ejercicio', $ejercicio) }}" class="btn btn-primary">
                            Ver</a>
                    </div>
                    <div class="card-body p-4">
                        <h5 class="pt-0 card-title">{{ $generos[$ejercicio->genero] }}</h5>
                        <p class="card-text">{{ $ejercicio->descripcion }}</p>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                    <div class="card-footer text-muted">
                        Para personas entre {{ $ejercicio->edad_min }} y {{ $ejercicio->edad_max }} años con un IMC de
                        {{ $imc_max }}
                        a
                        {{ $imc_min }}
                    </div>
                </div>
            @endforeach

    </section>
@endsection

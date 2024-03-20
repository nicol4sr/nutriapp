@extends('layouts.app')

@section('title', 'Plan de ejercicios')

@php
    $genero = [0 => 'Femenino', 1 => 'Masculino'];
@endphp

@section('content')

    <div class="pagetitle">
        <h1>Plan nutricional ({{ $tipo->nombre }})</h1>
    </div>

    <div class="col-4 mb-4">
        <a href="{{ route('listado-planes') }}" class="btn btn-primary w-50"> <i class="bi bi-arrow-left"> </i>Regresar</a>
    </div>

    <section class="section">
        <div class="row">
            @foreach ($planes as $plan)
                <div class="card p-0">
                    <div class="card-header">
                        {{ $plan->nombre }}
                    </div>
                    <div class="card-body p-4">
                        <p class="card-text">{{ $plan->descripcion }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        Edad {{ $plan->edad }} - {{ $plan->comida->nombre }} - {{ $genero[$plan->genero] }}
                    </div>
                </div>
            @endforeach

    </section>
@endsection

@extends('layouts.app')

@section('title', 'Plan de ejercicios')

@php

    $objetivos = [
        1 => 'Subir de Peso',
        2 => 'Bajar de Peso',
        3 => 'Buena Salud',
        4 => 'Terapia',
    ];

    $horarios = [
        1 => 'Lunes a Viernes',
        2 => 'Lunes-Miercoles-Viernes',
        3 => 'Lunes a Jueves',
        4 => 'Martes-Jueves-Sabado',
    ];

@endphp

@section('content')

    <div class="pagetitle">
        <h1>Plan de Ejercicios</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Seleccionar Modo</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8" style="margin:2px">
                <a href="{{ route('crear-ejercicio') }}" class="btn btn-primary w-25">
                    <i class="bi bi-star"> </i>Empezar
                </a>
            </div>
        </div>
        <br>
    </section>

    <section class="section">
        <div class="row">
            <div class="col-lg-4">
                <div class="card text-white">
                    <img src="{{ asset('images/exercises/ejer_1.jpg') }}" class="card-img" alt="...">
                    <div class="card-img-overlay text-center">
                        <h5 class="card-title text-white text-center">Plan Básico</h5>

                        <a href="{{ route('ejercicios-dificultad', 'basico') }}" type="button"
                            class="btn btn-primary rounded-pill">Empezar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-white">
                    <img src="{{ asset('images/exercises/ejer_11.jpg') }}" class="card-img" alt="...">
                    <div class="card-img-overlay text-center">
                        <h5 class="card-title text-white text-center">Plan Intermedio</h5>

                        <a href="{{ route('ejercicios-dificultad', 'intermedio') }}" type="button"
                            class="btn btn-primary rounded-pill">Empezar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-white">
                    <img src="{{ asset('images/exercises/ejer_1.jpg') }}" class="card-img" alt="...">
                    <div class="card-img-overlay text-center">
                        <h5 class="card-title text-white text-center">Plan Avanzado</h5>
                        <a href="{{ route('ejercicios-dificultad', 'dificil') }}" type="button"
                            class="btn btn-primary rounded-pill">Empezar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-white">
                    <img src="{{ asset('images/exercises/ejer_11.jpg') }}" class="card-img" alt="...">
                    <div class="card-img-overlay text-center">
                        <h5 class="card-title text-white text-center">Mis planes</h5>

                        <a href="{{ route('ejercicios-personal') }}" type="button"
                            class="btn btn-primary rounded-pill">Empezar</a>
                    </div>
                </div>
            </div>

    </section>
@endsection

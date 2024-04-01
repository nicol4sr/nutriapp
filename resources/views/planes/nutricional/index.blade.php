@extends('layouts.app')

@section('title', 'Planes nutricionales')

@section('content')
    <div class="pagetitle">
        <h1>Planes nutricionales</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Seleccionar Modo</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            @foreach ($tipos as $tipo)
                <div class="col-lg-4">
                    <div class="card text-white">
                        <img src="{{ asset('images/exercises/ejer_1.jpg') }}" class="card-img" alt="...">
                        <div class="card-img-overlay text-center">
                            <h5 class="card-title text-white text-center">{{ $tipo->nombre }}</h5>

                            <a href="{{ route('ver-planes', $tipo->id) }}" type="button"
                                class="btn btn-primary rounded-pill">Empezar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

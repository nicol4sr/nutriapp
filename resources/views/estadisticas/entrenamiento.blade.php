@extends('layouts.app')

@section('title', 'Perfil especialista')

@section('content')
    <div class="pagetitle">
        <h1>Entrenamiento</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('images/exercises/ejer_10.jpg') }}" class="img-fluid rounded" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title">Rutina Nivel Avanzado</h2>
                                <h5>Completado 20%</h5>
                                <!-- Progress Bars with Striped Backgrounds-->
                                <div class="progress mt-3">
                                    <div class="progress-bar progress-bar-striped bg-success progress-bar-animated"
                                        role="progressbar" style="width: 20%" aria-valuenow="25" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('images/exercises/ejer_3.jpg') }}" class="img-fluid rounded" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title">Rutina Nivel Intermedio</h2>
                                <h5>Completado 65%</h5>
                                <!-- Progress Bars with Striped Backgrounds-->
                                <div class="progress mt-3">
                                    <div class="progress-bar progress-bar-striped bg-success progress-bar-animated"
                                        role="progressbar" style="width: 65%" aria-valuenow="25" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('images/exercises/ejer_12.jpg') }}" class="img-fluid rounded" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title">Rutina Nivel Principiante</h2>
                                <h5>Completado 100%</h5>
                                <!-- Progress Bars with Striped Backgrounds-->
                                <div class="progress mt-3">
                                    <div class="progress-bar progress-bar-striped bg-success progress-bar-animated"
                                        role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

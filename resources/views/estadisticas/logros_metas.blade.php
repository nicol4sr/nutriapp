@extends('layouts.app')

@section('title', 'Logros y metas')

@section('js')
    <script src="{{ asset('/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/plugins/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('/plugins/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('/js/calc.js') }}"></script>
@endsection

@section('content')

    <div class="pagetitle">
        <center>
            <h1>Logros y Metas</h1>
        </center>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Progreso</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Calculadora De Indice de Masa Corporal</h5>
                        <div class="row">
                            <div class="from-group mb-2">
                                <label for="kg">Ingrese Peso (kg):</label>
                                <input class="form-control" type="number" step="any"id="kg">
                            </div>
                            <div class="from-group mb-2">
                                <label for="m">Ingrese Altura (cm):</label>
                                <input class="form-control" type="number" step="any" id="m">
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary w-100"id="calc">Calcular</button>
                            </div>
                            <hr>

                            <div class="progress-stacked">
                                <div class="progress" role="progressbar" aria-label="Segment one" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                                    <div class="progress-bar bg-info">Por Debajo</div>
                                </div>
                                <div class="progress" role="progressbar" aria-label="Segment two" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                                    <div class="progress-bar bg-success">Peso Normal</div>
                                </div>
                                <div class="progress" role="progressbar" aria-label="Segment three" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                                    <div class="progress-bar bg-warning">Obesidad</div>
                                </div>
                                <div class="progress" role="progressbar" aria-label="Segment four" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                                    <div class="progress-bar bg-danger">Obesidad Morbida</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

    </section>
@endsection

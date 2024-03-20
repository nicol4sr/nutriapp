@extends('layouts.app')

@section('title', 'Ver receta')

@section('css')
    <link href="{{ asset('/plugins/select2/select2.min.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('/js/calculadora.js') }}"></script>
    <script src="{{ asset('/plugins/select2/select2.min.js') }}"></script>
@endsection

@section('content')
@php
    $totalCalorias = 0;
    $totalHc = 0;
    $totalProteinas = 0;
    $totalGrasas = 0;

    foreach ($receta->alimentos as $alimento) {
        $totalCalorias += $alimento->calorias;
        $totalHc += $alimento->hc;
        $totalProteinas += $alimento->proteinas;
        $totalGrasas += $alimento->grasas;
    }
@endphp
    <div class="pagetitle">

        <nav>
            <!-- <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
            </ol> -->
        </nav>
    </div>
    
    <section class="section dashboard">

        
        <h3 class="pagetitle">Ver Receta</h3>
    
        <div class="col-4">
            <a href="{{ route('receta') }}" class="btn btn-primary w-50"> <i class="bi bi-arrow-left"> </i>Regresar</a>
        </div><br>

        <div class="row ">
            <div class="col-lg-8">
                        <div class="card">
                        <div class="card-header"><strong>{{ $receta->nombre }}</strong></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-text"><strong>Descripcion:</strong> {{ $receta->descripcion }}</h5>
                                    <h5 class="card-text"><strong>Tipo:</strong> {{ $receta->tipo->nombre }}</h5>
                                    <h5 class="card-text"><strong>Comida:</strong> {{ $receta->comida->nombre }}</h5>
                                    <h5 class="card-text"><strong>Total Calorias:</strong> {{ $totalCalorias }}</h5>

                                </div>
                                
                                {{-- <div class="col">
                                    <table>
                                        <thead>
                                            <th>Calorias</th>
                                            <th>Hc</th>
                                            <th>Proteinas</th>
                                            <th>Grasas</th>
                                        </thead>
                                        <tbody>
                                            <td>{{ $totalCalorias }}</td>
                                            <td>{{ $totalHc }}</td>
                                            <td>{{ $totalProteinas }}</td>
                                            <td>{{ $totalGrasas }}</td>
                                        </tbody>
                                    </table>
                                </div> --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

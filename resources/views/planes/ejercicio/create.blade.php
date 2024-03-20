@extends('layouts.app')

@section('title', 'Crear plan de ejercicios')

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

    <h1>Crear Plan de ejercicios</h1>
    <section class="section">

        <!-- Left side columns -->
        <div class="col-lg-10">

            <div class="card">
                <div class="card-body">
                    <div class="row text-center">


                        <!-- General Form Elements -->
                        @include('forms.planes.ejercicio')
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

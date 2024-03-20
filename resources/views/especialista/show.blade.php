@extends('layouts.app')

@section('title', 'Perfil de especialista')

@section('content')
    <div class="col-4 mb-4">
        <a href="{{ route('pendiente-especialista') }}" class="btn btn-primary w-50"> <i class="bi bi-arrow-left">
            </i>Regresar</a>
    </div>

    <h1>Perfil de especialista</h1>
    <section class="section">

        <!-- Left side columns -->
        <div class="col-lg-10">

            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('storage/comprobantes/' . $especialista->comprobante) }}" style="width:100%" />
                </div>
            </div>
        </div>
    </section>
@endsection

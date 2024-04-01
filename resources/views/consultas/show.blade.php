@extends('layouts.app')

@section('title', 'Ver consulta')

@php
    $estados = [0 => 'Rechazada', 1 => 'Aceptada'];
@endphp

@section('content')
    <div class="pagetitle">
        <h3>Consultas</h3>
    </div>

    <div class="col-4 mb-4">
        <a href="{{ route('consultas.index') }}" class="btn btn-primary w-100"> <i class="bi bi-arrow-left"> </i>Regresar</a>
    </div>

    <section class="section dashboard mb-5">
        <div class="row ">
            <div class="col-8 mx-auto text-center">
                <div class="card">
                    <div class="card-body">
                        <p class="text-muted">Enviada el {{ \Carbon\Carbon::parse($consulta->created_at)->format('d-m-Y') }}
                        </p>
                        <p>Respuesta del especialista: {{ $consulta->especialista->name }}</p>
                        <p class="mt-4 mx-auto text-muted bg-white border rounded" style="width: 70%; height: 300px">
                            {{ $consulta->respuesta }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

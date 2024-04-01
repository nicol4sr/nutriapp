@extends('layouts.app')

@section('title', 'Notificaciones')

@php
    $estados = [0 => 'rechazado', 1 => 'aceptado'];
@endphp

@section('content')
    <div class="pagetitle">
        <h1>Perfil</h1>
    </div>

    <div class="mb-3 col-3">
        <a href="{{ route('home') }}" class="btn btn-primary w-100">
            <i class="bi bi-arrow-left"></i>Regresar
        </a>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="mt-4 mx-auto col-6">
                <ul class="list-group">
                    @foreach ($notificaciones as $n)
                        @php
                            $data = $n->data;
                        @endphp
                        <li class="list-group-item">
                            <div class="d-flex flex-column gap-2">
                                <h6>{{ $data['titulo'] }}</h6>
                                @if ($n->type === 'App\Notifications\EspecialistaNotification')
                                    <p>El usuario {{ $data['usuario'] }} ha solicitado una consulta</p>
                                @else
                                    <p>El especialista {{ $data['especialista'] }} ha {{ $estados[$data['estado']] }} su
                                        solicitud</p>
                                @endif
                                <small>{{ \Carbon\Carbon::parse($n['created_at'])->diffForHumans() }}</small>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endsection

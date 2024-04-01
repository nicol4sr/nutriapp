@extends('layouts.app')

@section('title', 'Perfil')

@php
    $generos = [
        0 => 'Masculino',
        1 => 'Femenino',
    ];
    $habitos = [
        0 => 'No respeto horarios de comida',
        1 => 'Como dulce o alimentos azucardos con frecuencia',
        2 => 'Como comida chatarra, procesada o enlatada',
        3 => 'Consumo alimentos fritos',
    ];
@endphp

@section('content')

    <div class="pagetitle">
        <h1>Perfil</h1>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{ $usuario->foto == null ? asset('images/users/profile_0.png') : asset('storage/imagenes/' . $usuario->foto) }}"
                            alt="Profile" class="rounded-circle">
                        <div class="mt-3 d-flex flex-row flex-wrap gap-3">

                            <a href="{{ route('editar-perfil') }}" class="btn btn-primary w-100">
                                Actualizar perfil
                            </a>
                            <a href="{{ route('perfil-password') }}" class="btn btn-primary w-100">
                                Cambiar contraseña
                            </a>
                            @if (isset($usuario->respuestas))
                                <a href="{{ route('preguntas.usuario.show') }}" class="btn btn-primary w-100">
                                    Datos para especialista
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-8">

                <div class="card">
                    <div class="card-body pt-3">

                        <div class="fade show active profile-overview" id="profile-overview">

                            <h5 class="card-title">Datos del usuario</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Nombre</div>
                                <div class="col-lg-9 col-md-8">{{ $usuario->name }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Género</div>
                                <div class="col-lg-9 col-md-8">{{ $generos[$usuario->genero] }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Fecha nacimiento</div>
                                <div class="col-lg-9 col-md-8">
                                    {{ \Carbon\Carbon::parse($usuario->fecha_nacimiento)->format('Y-m-d') }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Correo Electronico</div>
                                <div class="col-lg-9 col-md-8">{{ $usuario->email }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Nacionalidad</div>
                                <div class="col-lg-9 col-md-8">{{ $usuario->nacionalidad->pais }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Objetivo</div>
                                <div class="col-lg-9 col-md-8">{{ $usuario->objetivo->nombre }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Habitos</div>
                                <div class="col-lg-9 col-md-8">{{ $habitos[$usuario->habitos] }}</div>
                            </div>

                        </div>
                    </div>

                </div><!-- End Bordered Tabs -->
            </div>
        </div>
    </section>
@endsection

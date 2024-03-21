@extends('layouts.app')

@section('title', 'Perfil')

@section('content')

    <div class="pagetitle">
        <h1>Perfil</h1>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{ $usuario->foto == null ? asset('images/users/profile_0.png') : asset('storage/imagenes/' . $usuario->foto) }}"
                            alt="Profile" class="rounded-circle">
                        <div class="row mb-3 text-center">
                            <div class="col-sm-12">
                                <a href="{{ route('editar-perfil') }}" class="btn btn-primary">Actualizar perfil</a>
                            </div>
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
                                <div class="col-lg-3 col-md-4 label">Correo Electronico</div>
                                <div class="col-lg-9 col-md-8">{{ $usuario->email }}</div>
                            </div>

                        </div>
                    </div>

                </div><!-- End Bordered Tabs -->
            </div>
        </div>
    </section>
@endsection

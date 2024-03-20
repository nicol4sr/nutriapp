@extends('layouts.app')

@section('title', 'Alarmas')

@section('content')
    <div class="pagetitle">
        <h1>Configuración</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Configurar Alarma</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card">
                    <div class="card-header text-center">Configurar Alarma</div>
                    <div class="card-body justify-content-center">
                        <h5 class="card-title text-center">Añadir o Editar Alarma</h5>
                        <div class="row justify-content-center">
                            <div class="col-3">
                                <a type="button" class="btn btn-primary mb-3"><i class="bi bi-pencil-square"></i></a>
                                <a type="button" class="btn btn-success mb-3"><i class="bi bi-plus-square"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        Pulsa el boton <i class="bi bi-plus-square"></i> para añadir alarma <br>
                        Pulsa el boton <i class="bi bi-pencil-square"></i> para editar alarma
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

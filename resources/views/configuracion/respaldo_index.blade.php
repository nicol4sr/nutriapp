@extends('layouts.app')

@section('title', 'Respaldo base de datos')

@section('content')
    <div class="pagetitle">
        <h1>Respaldo base de datos</h1>
    </div><!-- End Page Title -->

    <div class="col-12 card table-responsive-sm p-3 my-3">

        <div class="w-100 row mx-auto">
            <div class="col-md-3 col-sm-12">
                <a href="{{ route('guardar-respaldo') }}" class="btn btn-block btn-success my-2">
                    <i class="bis bi-save mr-2"></i>
                    {{ 'Copia de seguridad' }}
                </a>
            </div>
        </div>

        <table id='tabla' class="table table-striped">
            <thead>
                <tr class="bg-secondary">
                    <th>Nombre del archivo</th>
                    <th>Fecha de creación</th>
                    <th>Peso</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($respaldos as $respaldo)
                    <tr>
                        <td>[Respaldo {{ $respaldo['indice'] }}] - {{ $respaldo['nombre'] }}</td>
                        <td>{{ $respaldo['fecha'] }}</td>
                        <td>{{ $respaldo['peso'] }}</td>
                        <td>
                            <div class="btn-group mx-1" role="group" aria-label="Acciones">
                                <a href="{{ route('descargar-respaldo', $respaldo['nombre']) }}"
                                    class="btn btn-success descargar">
                                    <i class="bis bi-download"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

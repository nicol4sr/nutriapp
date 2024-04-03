@php
    $especialidades = [
        0 => 'Entrenador',
        1 => 'Psicólogo',
        2 => 'Nutricionista',
    ];
@endphp

@extends('layouts.app')

@section('title', 'Listado de especialistas')

@section('content')
    <div class="col-4 mb-4">
        <a href="{{ route('home') }}" class="btn btn-primary w-50"> <i class="bi bi-arrow-left"> </i>Regresar</a>
    </div>

    <h1>Listado de especialistas</h1>
    <section class="section dashboard">
        <div class="row ">
            <div class="col-lg-11">

                <div class="row">
                    <table id="tabla" class="table" style="margin:20px">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Cédula</th>
                                <th scope="col">Número permiso</th>
                                <th scope="col">Especialidad</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($especialistas as $especialista)
                                <tr>
                                    <th>{{ $especialista->id }}</th>
                                    <td>{{ $especialista->usuario->name }}</td>
                                    <td>{{ $especialista->cedula }}</td>
                                    <td>{{ $especialista->nro_permiso }}</td>
                                    <td>{{ $especialidades[$especialista->especialidad] }}</td>
                                    <td>
                                        <a type="button" href="{{ route('perfil-especialista', $especialista) }}"
                                            class="btn btn-warning">Perfil</a>
                                        <form action="{{ route('validar-especialista', $especialista) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="btn btn-primary">{{ $especialista->validado === 0 ? 'Validar' : 'Invalidar' }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                    <!-- </div> -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        new DataTable('#tabla', {
            language: {
                info: 'Mostrando página _PAGE_ de _PAGES_',
                infoEmpty: 'No hay registros disponibles',
                infoFiltered: '(filtrados de _MAX_ registros totales)',
                lengthMenu: 'Mostrar _MENU_ registros por página',
                zeroRecords: 'No se encontraron datos',
                search: 'Buscar',
                emptyTable: 'No hay datos en la tabla'
            }
        });
    </script>
@endsection

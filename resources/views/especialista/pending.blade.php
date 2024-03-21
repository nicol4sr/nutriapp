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
                    <table class="table" style="margin:20px">
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

                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            {{ $especialistas->links() }}
                        </ul>
                    </nav>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </section>
@endsection

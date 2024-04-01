@extends('layouts.app')

@section('title', 'Consultas')

@php
    $estados = [0 => 'Rechazada', 1 => 'Aceptada'];
    $rol = auth()
        ->user()
        ->hasRole(['Nutricionista', 'Entrenador', 'Psicologo']);
@endphp

@section('content')
    <div class="pagetitle">
        <h3>Consultas</h3>
    </div>

    @if (session('no-response'))
        <div class="alert alert-info" role="alert">
            {{ session('no-response') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-info" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <section class="section dashboard mb-5">
        <div class="row ">
            <div class="col-lg-11">

                <div class="row">
                    <table class="table" style="margin:20px">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($consultas as $consulta)
                                <tr>
                                    <td>{{ $consulta->id }}</td>
                                    <td>{{ is_null($consulta->estado) ? 'Por confirmar' : $estados[$consulta->estado] }}
                                    </td>
                                    <td>{{ $consulta->usuario->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($consulta->created_at)->format('d-m-Y h:i a') }}</td>
                                    @if (is_null($consulta->estado))
                                        <td class="btn-group">
                                            <form
                                                action="{{ route('consultas.state', ['consulta' => $consulta, 'estado' => 1]) }}"
                                                method="POST" class="btn-group">
                                                @csrf
                                                <button class="btn btn-primary">
                                                    Aceptar
                                                </button>
                                            </form>
                                            <form
                                                action="{{ route('consultas.state', ['consulta' => $consulta, 'estado' => 0]) }}"
                                                method="POST" class="btn-group">
                                                @csrf
                                                <button class="btn btn-warning">
                                                    Rechazar
                                                </button>
                                            </form>
                                        </td>
                                    @else
                                        <td>
                                            <a href="{{ route('consultas.profile', $consulta) }}" class="btn btn-primary">
                                                Ver perfil
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            {{ $consultas->links() }}
                        </ul>
                    </nav><!-- End Basic Pagination -->

                    <!-- </div> -->
                </div>
            </div>
        </div>
    </section>

@endsection

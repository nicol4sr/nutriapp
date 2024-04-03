@extends('layouts.app')

@section('title', 'Consulta con especialista')

@php
    $estados = [0 => 'Rechazada', 1 => 'Aceptada'];
@endphp

@section('content')
    <div class="pagetitle">
        <h3>Consultas</h3>
    </div>

    @if (session('not-found'))
        <div class="alert alert-info" role="alert">
            {{ session('not-found') }}
        </div>
    @endif

    @if (!isset($especializacion))
        <x-modal id="especialistas" title="Solicitar consulta">
            <section class="section">
                <div class="row justify-content-center">
                    <div class="mb-3 col-12">
                        <p class="text-muted">Seleccione un especialista para su consulta</p>
                    </div>

                    <div class="col-4">
                        <a href="{{ route('consultas.select', '0') }}">
                            <div class="card" style="width: 9rem;">
                                <img src="{{ asset('images/consulta/entrenadorV.png') }}" class="card-img-top"
                                    alt="...">
                                <button class="btn btn-primary" type="button"
                                    id="citar"><strong>Entrenador</strong></button>
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="{{ route('consultas.select', '1') }}">
                            <div class="card" style="width: 9rem;">
                                <img src="{{ asset('images/consulta/psicologoV.png') }}" class="card-img-top"
                                    alt="...">
                                <button class="btn btn-primary" type="button"
                                    id="citar2"><strong>Psicologo</strong></button>
                            </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="{{ route('consultas.select', '2') }}">
                            <div class="card" style="width: 9rem;">
                                <img src="{{ asset('images/consulta/nutricionista.png') }}" class="card-img-top"
                                    alt="...">
                                <button class="btn btn-primary" type="button"
                                    id="citar3"><strong>Nutriologo</strong></button>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
        </x-modal>
        <div class="col-4">
            <x-modal_button id="especialistas">
                <i class="bis bi-start"></i>
                Especialistas
            </x-modal_button>
        </div>


        <section class="section dashboard mb-5">
            <div class="row ">
                <div class="col-lg-11">

                    <div class="row">
                        <table id="tabla" class="table" style="margin:20px">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Especialista</th>
                                    <th scope="col">Especialidad</th>
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
                                        <td>{{ $consulta->especialista->name }}</td>
                                        <td>{{ $consulta->especialista->getRoleNames()[0] }}</td>
                                        <td>{{ \Carbon\Carbon::parse($consulta->created_at)->format('d-m-Y h:i a') }}</td>
                                        <td class="btn-group">
                                            @if (is_null($consulta->estado) || is_null($consulta->respuesta))
                                                <p class="text-muted">Esperando por aceptación</p>
                                            @else
                                                <a type="button" href="{{ route('consultas.show', $consulta) }}"
                                                    class="btn btn-primary">Ver respuesta</a>
                                            @endif
                                        </td>
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
    @else
        <section class="section">
            <div class="row">
                <div class="mb-3 col-12">
                    <p class="text-muted">Busqueda de: {{ $especializacion }}</p>
                </div>
                <div class="col-4 mb-4">
                    <a href="{{ route('consultas.index') }}" class="btn btn-primary w-100">
                        <i class="bi bi-arrow-left"></i>
                        Regresar
                    </a>
                </div>

            </div>
            <div class="row">
                <div class="col-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('consultas.pick') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label>Especialistas</label>

                                    <div class="input-group">
                                        <select name="especialista"
                                            class="form-select @error('especialista') is-invalid @enderror"
                                            aria-label="Default select example">
                                            <option value="" disabled>Seleccionar</option>
                                            @foreach ($especialistas as $especialista)
                                                <option value="{{ $especialista->id }}">
                                                    {{ $especialista->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('especialista')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">
                                    Solicitar consulta
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

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

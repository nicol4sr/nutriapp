@extends('layouts.app')

@section('title', 'Receta nutricional')

@php
    $tipos = [0 => 'Psicológico', 1 => 'Físico', 2 => 'Calórico'];
@endphp

@section('content')
    <x-modal id="pregunta" title="Añadir pregunta" :route="isset($pregunta) ? route('preguntas.update', $pregunta) : route('preguntas.store')">
        @if (isset($pregunta))
            @method('PUT')
        @endif
        <div class="mx-auto">
            <div class="row px-2">
                <div class="mx-auto col-10">
                    <div class="row mb-3 justify-content-center ">
                        <label for="inputText" class="text-center">Pregunta</label>
                        <div class="input-group">

                            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                                placeholder="Ej: ¿Tiene alguna condición médica?"
                                value="{{ $pregunta->nombre ?? old('nombre') }}">

                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mx-auto col-10">
                    <div class="row mb-3 justify-content-center ">
                        <label for="inputText" class="text-center">Tipo</label>
                        <div class="input-group">

                            <select name="tipo" class="form-control @error('tipo') is-invalid @enderror">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="0"
                                    {{ (isset($pregunta) ? $pregunta->tipo === 0 : old('tipo') === '0') ? 'selected' : '' }}>
                                    Psicológica</option>
                                <option value="1"
                                    {{ (isset($pregunta) ? $pregunta->tipo === 1 : old('tipo') === '1') ? 'selected' : '' }}>
                                    Física
                                </option>
                            </select>

                            @error('tipo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row w-fit mb-3 text-center">
            <button type="submit" class="btn btn-primary btn-block w-75 mx-auto">Crear</button>
        </div>
    </x-modal>
    <div class="pagetitle">
        <h1>Crear pregunta</h1>
    </div><!-- End Page Title -->

    <div class="col-4 mb-4">
        <button id="btn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pregunta"><i
                class="bi bi-plus">
            </i>Añadir pregunta</button>
    </div>

    <section class="section dashboard mb-5">
        <div class="row ">
            <div class="col-lg-11">

                <div class="row">
                    <table id="preguntas" class="table" style="margin:20px">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Pregunta</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preguntas as $pregunta)
                                <tr>
                                    <th>{{ $pregunta->id }}</th>
                                    <td>{{ $pregunta->nombre }}</td>
                                    <td>{{ $tipos[$pregunta->tipo] }}</td>
                                    <td class="btn-group">
                                        <a type="button" href="{{ route('preguntas.edit', $pregunta) }}"
                                            class="btn btn-warning">Editar</a>
                                        <form action="{{ route('preguntas.delete', $pregunta) }}" method="POST"
                                            class="btn-group">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Borrar</button>
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
    @if (isset($pregunta))
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <script>
            $('#btn')[0].click()
        </script>
    @endif
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        new DataTable('#preguntas', {
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

@extends('layouts.app')

@section('title', 'Datos físicos')

@php
    $habitos = [
        0 => 'No respeto horarios de comida',
        1 => 'Como dulce o alimentos azucardos con frecuencia',
        2 => 'Como comida chatarra, procesada o enlatada',
        3 => 'Consumo alimentos fritos',
    ];
    $generos = [
        0 => 'Femenino',
        1 => 'Masculino',
    ];
@endphp

@section('content')
    <div class="pagetitle">
        <h1>Datos físicos</h1>
    </div>


    <div class="col-4 mb-4">
        <a href="{{ route('registrar-datos') }}" class="btn btn-primary w-50">
            <i class="bi bi-plus"> </i>Crear
        </a>
    </div>

    <div class="table-responsive">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                {{ $datos->links() }}
            </ul>
        </nav>
        <table class="table">
            <thead class="">
                <tr>
                    <th scope="col">Objetivo</th>
                    <th scope="col">Habitos</th>
                    <th scope="col">Peso (Kg)</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Nacionalidad</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $datos)
                    <tr>
                        <td>{{ $datos->objetivo->nombre }}</td>
                        <td>{{ $habitos[$datos->habitos] }}</td>
                        <td>{{ $datos->peso }}</td>
                        <td>{{ date('Y-m-d', strtotime($datos->nacimiento)) }}</td>
                        <td>{{ $generos[$datos->genero] }}</td>
                        <td>{{ $datos->nacionalidad->pais }}</td>
                        <td><a href="{{ route('editar-datos', $datos->id) }}" class="btn btn-primary active" role="button"
                                aria-pressed="true">Editar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

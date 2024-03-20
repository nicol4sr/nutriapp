@extends('layouts.app')

@section('title', 'Ejercicio')

@php
    $genero = [1 => 'Femenino', 2 => 'Masculino'];
@endphp

@section('content')
    <div class="pagetitle">
        <h1>Crear Ejercicio</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Crear Ejercicio</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                        <a href="{{ route('crear-ejercicio') }}" class="btn btn-primary w-25">
                            <i class="bi bi-star"> </i>Empezar
                        </a>
            </div>
        </div>
        <br>
    </section>

    <section class="section dashboard">
        <div class="row justify-content-center">
            <div class="col-lg-11">

                <div class="row">
                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Género</th>
                                <th scope="col">Parte del cuerpo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ejercicios as $ejercicio)
                                <tr>
                                    <td>{{ $ejercicio->id }}</td>
                                    <td>{{ $ejercicio->nombre }}</td>
                                    <td>{{ $genero[$ejercicio->genero] }}</td>
                                    <td>{{ $ejercicio->cuerpo->nombre }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('editar-ejercicio', $ejercicio->id) }}"
                                            class="btn btn-warning">Editar</a>
                                        <form action="{{ route('borrar-ejercicio', $ejercicio->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Borrar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Siguente</a></li>
                        </ul>
                    </nav><!-- End Basic Pagination -->

                    <!-- </div> -->
                </div>
            </div>
        </div>
    </section>
@endsection

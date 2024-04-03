@extends('layouts.app')

@section('title', 'Datos nutricionales')

@section('content')
    <div class="pagetitle">
        <h1>Datos nutricionales</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Valor nutricional</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row justify-content-center">
            <div class="col-lg-11">

                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Valor nutricional de alimentos</h5>
                            <table class="table table-striped" id="valor">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Calorias</th>
                                        <th scope="col">Carbohidratos</th>
                                        <th scope="col">Proteinas</th>
                                        <th scope="col">Grasas</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($referencias as $referencia)
                                        <tr>
                                            <th>{{ $referencia->id }}</th>
                                            <td>{{ $referencia->nombre }}</td>
                                            <td>{{ $referencia->calorias }}</td>
                                            <td>{{ $referencia->carbohidratos }}</td>
                                            <td>{{ $referencia->proteinas }}</td>
                                            <td>{{ $referencia->grasas }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    {{ $referencias->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection


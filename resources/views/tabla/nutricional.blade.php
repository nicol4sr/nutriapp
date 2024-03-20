@extends('layouts.app')

@section('title', 'Datos nutricionales')

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

@endsection

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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('js')

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>
    new DataTable('#valor');
</script>


@endsection
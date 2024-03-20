@extends('layouts.app')

@section('title', 'Editar d.físicos')

@section('css')
    <link href="css/reco.css" rel="stylesheet">
@endsection

@section('js')
    <script src="js/reco.js"></script>
@endsection

@section('content')
    <section class="">


        <div class="table-responsive">
            <table class="table table-primary">
                <thead class="table-primary">
                    <tr>

                        <th scope="col">Objetivo</th>
                        <th scope="col">Habitos</th>
                        <th scope="col">Peso</th>
                        <th scope="col">Fecha de nacimiento</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Nacionalidad</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $datos)
                        <tr>
                            <td>{{ $datos->objetivo }}</td>
                            <td>{{ $datos->habitos }}</td>
                            <td>{{ $datos->pesoi }}</td>
                            <td>{{ $datos->edad }}</td>
                            <td>{{ $datos->genero }}</td>
                            <td><a class="link-opacity-10" href="{{ route('pais') }}">{{ $datos->nacionalidades->pais}}</</a></td>
                            <td><a href="{{ route('editar.d', $datos) }}" class="btn btn-primary active" role="button"
                                    aria-pressed="true">Editar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Table with stripped rows -->


            <!-- </div> -->
        </div>

       
    </section>


@endsection

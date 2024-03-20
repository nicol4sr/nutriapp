@extends('layouts.app')

@section('title', 'Editar d.físicos')

@section('css')
    <link href="css/reco.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://code.highcharts.com/css/highcharts.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.2.0/css/searchPanes.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css ">
@endsection


@section('content')





    <div class="table-responsive ">
        <table class="table-primary" id="example">
            <thead class="table-primary">
                <tr>
                    <th scope="col">Pais</th>
                    <th scope="col">Altura</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Imc</th>
                    <th scope="col">sexo</th>

                </tr>
            </thead>
              
            </tbody>  @foreach ($nacionalidades as $nacionalidades)
            <tr>
                <td>{{ $nacionalidades->pais }}</td>
                <td>{{ $nacionalidades->altura}}</td>
                <td>{{ $nacionalidades->peso }}</td>
                <td>{{ $nacionalidades->imc }}</td>
                <td>{{ $nacionalidades->sexo}}</td>
               
            </tr>
        @endforeach
        </table>
       


        <!-- </div> -->
    </div>


 






@section('js')

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/searchpanes/2.2.0/js/dataTables.searchPanes.min.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
    <script>
        const table = new DataTable('#example');
    </script>
@endsection
@endsection

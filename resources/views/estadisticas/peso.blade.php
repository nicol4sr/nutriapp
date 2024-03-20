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
    <section class="">
        <div class="row">

            <div class="pagetitle">
                <h1>Logros y Metas</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Progreso</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body ">
                                <div id="demo-output" style="margin-bottom: 1em; " class="chart-display " ></div>

                                <!-- Bar Chart -->

                                <!-- End Bar Chart -->

                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table class="table-primary" id="example" >
                                        <thead class="table-primary" >
                                            <tr>


                                                <th scope="col">Peso</th>
                                                <th scope="col">Actualizacion</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($datos as $datos)
                                                <tr>
                                                    <td>{{ $datos->pesoi }}</td>
                                                    <td>{{ $datos->created_at }}</td>
                                                    <td><a href="{{ route('editar.d', $datos) }}"
                                                            class="btn btn-primary active" role="button"
                                                            aria-pressed="true">Actualizar</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- End Table with stripped rows -->


                                    <!-- </div> -->
                                </div>


                                <!-- End Line Chart -->

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Calculadora IMC</h5>
                                <div class="row">
                                    <div class="from-group mb-2">
                                        <label for="kg">Ingrese Peso (kg):</label>
                                        <input class="form-control" type="number" step="any"id="kg">
                                    </div>
                                    <div class="from-group mb-2">
                                        <label for="m">Ingrese Altura (cm):</label>
                                        <input class="form-control" type="number" step="any" id="m">
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary w-100"id="calc">Calcular</button>
                                    </div>
                                    <hr>

                                    <div class="progress-stacked">
                                        <div class="progress" role="progressbar" aria-label="Segment one" aria-valuenow="25"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                                            <div class="progress-bar bg-info">Por Debajo</div>
                                        </div>
                                        <div class="progress" role="progressbar" aria-label="Segment two" aria-valuenow="25"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                                            <div class="progress-bar bg-success">Peso Normal</div>
                                        </div>
                                        <div class="progress" role="progressbar" aria-label="Segment three"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                                            <div class="progress-bar bg-warning">Obesidad</div>
                                        </div>
                                        <div class="progress" role="progressbar" aria-label="Segment four"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                                            <div class="progress-bar bg-danger">Obesidad Morbida</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </section>


@section('js')

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/searchpanes/2.2.0/js/dataTables.searchPanes.min.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
    <script>
        const table = new DataTable('#example');


        // Create chart
        const chart = Highcharts.chart('demo-output', {
            chart: {
                type: 'pie',
                styledMode: true
            },
            title: {
                text: 'Bitacora de peso'
            },
            series: [{
                data: chartData(table)
            }]
        });

        // On each draw, update the data in the chart
        table.on('draw', function() {
            chart.series[0].setData(chartData(table));
        });

        function chartData(table) {
            var counts = {};

            // Count the number of entries for each position
            table
                .column(0, {
                    search: 'applied'
                })
                .data()
                .each(function(val) {
                    if (counts[val]) {
                        counts[val] += 1;
                    } else {
                        counts[val] = 1;
                    }
                });

            return Object.entries(counts).map((e) => ({
                name: e[0],
                y: e[1]
            }));
        }
    </script>
@endsection
@endsection

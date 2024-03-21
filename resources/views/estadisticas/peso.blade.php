@extends('layouts.app')

@section('title', 'Editar datos físicos')

@section('css')
    <link href="css/reco.css" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ asset('/js/calc.js') }}"></script>
    <script src="{{ asset('/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('/plugins/apexcharts/apexcharts.min.js') }}"></script>

    <script>
        const values = @json($datos);
        const options = {
            chart: {
                height: 280,
                type: "area"
            },
            dataLabels: {
                enabled: false
            },
            series: [{
                name: "Peso deseado",
                data: values.map(v => v.peso)
            }],
            title: {
                text: 'Histórico de pesos',
                align: 'center'
            },
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 90, 100]
                }
            },
            xaxis: {
                type: 'datetime',
                categories: values.map(v => v.created_at),
                labels: {
                    show: false,
                }
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy hh:mm tt'
                }
            }
        };

        const chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endsection

@section('content')
    <section class="mb-5">
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
                    <div class="col-12 mb-5">
                        <div class="card" style="height: 100%">
                            <div class="card-body ">
                                <div id="chart" style="margin-bottom: 1em; " class="chart-display "></div>

                                <!-- Bar Chart -->

                                <!-- End Bar Chart -->

                            </div>
                        </div>
                    </div>


                    <div class="col-12 mb-5">
                        <div style="height: 100%" class="card">
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table class="table" id="example">
                                        <thead>
                                            <tr>
                                                <th scope="col">Peso</th>
                                                <th scope="col">Actualizacion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($datos as $datos)
                                                <tr>
                                                    <td>{{ $datos->peso }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($datos->created_at)) }}</td>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Calculadora De Indice de Masa Corporal</h5>
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


@endsection

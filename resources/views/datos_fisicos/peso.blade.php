@extends('layouts.app')

@section('title', 'Datos físicos')

@section('css')
    <link href="css/reco.css" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ asset('/js/calc.js') }}"></script>
    <script src="{{ asset('/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>

    <script>
        document.getElementById('altura-datos').addEventListener('input', function() {
            if (this.value.length > 2) {
                var val = this.value.replace(/[^\d]/, '');
                val = val.substr(0, val.length - 2) + "." + val.substr(-2);
                this.value = val;
            }
        });
    </script>

    <script>
        const traduccion = {
            locales: [{
                "name": 'es',
                "options": {
                    "months": ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto",
                        "Septiembre", "Octubre", "Noviembre", "Diciembre"
                    ],
                    "shortMonths": ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep",
                        "Oct", "Nov", "Dic"
                    ],
                    "days": ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes",
                        "Sábado"
                    ],
                    "shortDays": ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                    "toolbar": {
                        "exportToSVG": "Descargar SVG",
                        "exportToPNG": "Descargar PNG",
                        "exportToCSV": "Descargar CSV",
                        "menu": "Menú",
                        "selection": "Selección",
                        "selectionZoom": "Selección Ver",
                        "zoomIn": "Acercar",
                        "zoomOut": "Alejar",
                        "pan": "Arrastrar",
                        "reset": "Reestablecer vista"
                    }
                }
            }],
            defaultLocale: 'es'
        }
        const json = @json($datos);
        const values = json.data
        const options = [{
                chart: {
                    height: 280,
                    type: "area",
                    ...traduccion
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
            },
            {
                chart: {
                    height: 280,
                    type: 'bar',
                    ...traduccion
                },
                dataLabels: {
                    enabled: false
                },
                series: [{
                    name: "Altura actual",
                    data: values.map(v => v.altura)
                }],
                title: {
                    text: 'Histórico de alturas',
                    align: 'center'
                },
                xaxis: {
                    categories: values.map(v => new Date(v.created_at).toLocaleString()),
                    labels: {
                        show: false,
                    }
                },
                plotOptions: {
                    bar: {
                        distributed: true,
                    }
                },
            }
        ]

        const chartPesos = new ApexCharts(document.querySelector("#pesos"), options[0]).render()
        const chartAlturas = new ApexCharts(document.querySelector("#alturas"), options[1]).render()

        // let pesos = ''
        // let alturas = ''

        // chartPesos.render().then(() => {
        //     setTimeout(function() {
        //         chartPesos.dataURI().then(({
        //             imgURI,
        //             blob
        //         }) => {
        //             pesos = imgURI;
        //         });
        //     }, 1000)
        // })

        // chartAlturas.render().then(() => {
        //     setTimeout(function() {
        //         chartAlturas.dataURI().then(({
        //             imgURI,
        //             blob
        //         }) => {
        //             const {
        //                 jsPDF
        //             } = window.jspdf
        //             const pdf = new jsPDF();
        //             pdf.addImage(imgURI, 'PNG', 0, 0);
        //             pdf.save("pdf-chart.pdf");
        //             // alturas = imgURI;
        //         });
        //     }, 1000)
        // })

        // const el = document.querySelector('#det')
        // el.addEventListener('click', () => {
        //     $.ajax({
        //         url: '/datos-fisicos/pdf',
        //         method: 'POST',
        //         data: {
        //             "_token": "{{ csrf_token() }}",
        //             pesos,
        //             alturas
        //         }
        //     })
        // })
    </script>
@endsection

@section('content')
    <div class="modal fade" id="datos" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center">Añadir altura</h4>
                    <div class="mt-3 row justify-content-center">
                        <form action="{{ route('datos-fisicos.store') }}" method="POST">
                            @csrf
                            <div class="mx-auto">
                                <div class="row px-2">
                                    <div class="col-6 mx-auto">

                                        <div class="row mb-3 justify-content-center ">
                                            <label for="inputText" class="text-center">Peso</label>
                                            <div class="input-group">

                                                <input type="number" name="peso"
                                                    class="form-control @error('peso') is-invalid @enderror"
                                                    placeholder="Ej: 80" value="{{ old('peso') }}">

                                                @error('peso')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row w-fit mb-3 text-center">
                                            <button type="submit"
                                                class="btn btn-primary btn-block w-100 mx-auto">Crear</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <section class="mb-5">
        <div class="row">

            <div class="pagetitle">
                <h1>Datos físicos</h1>
            </div>

            <div class="col-3 mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#datos"><i
                        class="bi bi-plus"> </i>Añadir datos</button>
            </div>
            <div class="col-3 mb-4">
                {{-- <form id="descargar" action="{{ route('datos-fisicos.pdf') }}" method="POST" class="hidden">
                    @csrf
                    <img id="pesos-img" src="" alt="">
                    <img id="alturas-img" src="" alt="">
                </form>
                <button id="det" class="btn btn-primary">
                    <i class="bi bi-download"> </i>Descargar pdf</button>
                </button> --}}
                <!-- <a href="{{ route('datos-fisicos.pdf') }}" class="btn btn-primary">
                                    <i class="bi bi-download"> </i>Descargar pdf</button>
                                </a> -->
            </div>

            <section class="section">
                <div class="row">
                    <div class="col-12 mb-5">
                        <div class="card" style="height: 100%">
                            <div class="card-body ">
                                <div id="pesos" style="margin-bottom: 1em; " class="chart-display "></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-5">
                        <div class="card" style="height: 100%">
                            <div class="card-body ">
                                <div id="alturas" style="margin-bottom: 1em; " class="chart-display "></div>
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
                                                <th scope="col">Altura</th>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Borrar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($datos as $dato)
                                                <tr>
                                                    <td>{{ $dato->peso }}</td>
                                                    <td>{{ $dato->altura }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($dato->created_at)) }}</td>
                                                    <td>
                                                        <form action="{{ route('datos-fisicos.delete', $dato) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            {{ $datos->links() }}
                                        </ul>
                                    </nav>
                                </div>
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
                                        <input class="form-control" type="number" step="any"id="kg"
                                            value="{{ $ultimosDatos->peso ?? '' }}">
                                    </div>
                                    <div class="from-group mb-2">
                                        <label for="m">Ingrese Altura (cm):</label>
                                        <input class="form-control" type="number" step="any" id="m"
                                            value="{{ $ultimosDatos->altura ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary w-100"id="calc">Calcular</button>
                                    </div>
                                    <hr>
                                    <div class="progress-stacked">
                                        <div class="progress" role="progressbar" aria-label="Segment one"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                                            <div class="progress-bar bg-info">Por Debajo</div>
                                        </div>
                                        <div class="progress" role="progressbar" aria-label="Segment two"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">
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

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Datos físicos</title>
    <link href="{{ asset('/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    <header class="row">
        <table>
            <tbody>
                <tr>
                    <td>
                        <p>{{ auth()->user()->name }}</p>
                        <p>18 años</p>
                    </td>
                    <td style="text-align: right">
                        <img src="{{ asset('images/icons/icon_x96.png') }}" />
                    </td>
                </tr>
            </tbody>
        </table>
    </header>

    <section class="my-5 text-center">
        <h3>Datos físicos</h3>
        @php
            $hoy = \Carbon\Carbon::now()->locale('es')->formatLocalized('%A %d %B %Y');
        @endphp
        <p>{{ $hoy }}</p>
    </section>


    <main style="width: 100px !important">
        <div class="col-12 mb-5">
            <div class="card" style="height: 100%">
                <div class="card-body ">
                    <div id="pesos" style="margin-bottom: 1em; " class="chart-display "></div>
                    <img id="pesos-img" src="" alt="">
                </div>
            </div>
        </div>

        <div class="col-12 mb-5">
            <div class="card" style="height: 100%">
                <div class="card-body ">
                    <div id="alturas" style="margin-bottom: 1em; " class="chart-display "></div>
                    <img id="alturas-img" src="" alt="">
                </div>
            </div>
        </div>
    </main>
</body>

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

    const chartPesos = new ApexCharts(document.querySelector("#pesos"), options[0])
    const chartAlturas = new ApexCharts(document.querySelector("#alturas"), options[1])
    chartPesos.render().then(() => {
        setTimeout(function() {
            chartPesos.dataURI().then(({
                imgURI,
                blob
            }) => {
                document.querySelector('#pesos-img').src = imgURI;
            });
        }, 1000)
    })

    chartAlturas.render().then(() => {
        setTimeout(function() {
            chartAlturas.dataURI().then(({
                imgURI,
                blob
            }) => {
                document.querySelector('#alturas-img').src = imgURI;
            });
        }, 1000)
    })
</script>

</html>

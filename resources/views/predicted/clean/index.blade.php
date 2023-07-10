@extends('layouts.panel')


@section('content')
    <div class="row layout-top-spacing">


        {{-- <div class="row">
            <div class="col-md-4">
                <div class="card component-card_2">
                    <div class="card-body">
                        <h5 class="card-title">MATERIALES Y UTILES DE OFICINA	 </h5>
                        <a href="#" class="btn btn-primary">Realizar Predicción</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card component-card_2">
                    <div class="card-body">
                        <h5 class="card-title">PRODUCTOS DE ASEO / LIMPIEZA	</h5>
                        <a href="#" class="btn btn-primary">Realizar Predicción</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card component-card_2">
                    <div class="card-body">
                        <h5 class="card-title">PRODUCTO DE 	PAPEL BOND</h5>
                        <a href="#" class="btn btn-primary">Realizar Predicción</a>
                    </div>
                </div>
            </div>
        </div> --}}












        <div class="page-meta">
            <a href="{{ route('predicted.createClean') }}" class="btn btn-xm btn-primary" style="float: right;">Realizar
                Prediccion</a>

            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Resultados</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Prediccion</li>
                </ol>
            </nav>
            <br>



        </div>

        {{-- <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <table id="zero-config" class="table table-striped dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>DS</th>
                                <th>YHAT</th>
                                <th>YHAT_LOWER</th>
                                <th>YHAT_UPPER</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($response->json() as $item)
                                <tr>

                                    <td>

                                        {{ \Carbon\Carbon::parse($item['ds'])->format('Y-m-d') }}
                                    </td>
                                    <td>
                                        {{ round($item['yhat'], 2) }}
                                    </td>
                                    <td>{{ round($item['yhat_lower'], 2) }}</td>
                                    <td>
                                        {{ round($item['yhat_upper'], 2) }}
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>

                    </table>
                </div>
            </div>

        </div> --}}

        <div class="row">
            
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold" style="color: #4C5755">Total De Pedidos por Mes</h6>

                    </div>
                    <div class="card-body">
                        <div class="chart-area pt-4 pb-2">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        {{-- <script>
            $(document).ready(function() {

                const cData = JSON.parse(`<?php echo $response; ?>`)
                console.log(cData);
                console.log('joan' + cData[0].yhat);

                const ctx = document.getElementById('myChart').getContext('2d');

                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [new Date(cData[0].ds), cData[1].ds, cData[3].ds, cData[4].ds, cData[5].ds],
                        datasets: [{
                            label: '# De Total De Cursos',
                            data: [cData[0].yhat, cData[1].yhat, cData[3].yhat, cData[4].yhat, cData[5]
                                .yhat
                            ],
                            backgroundColor: [
                                '#e1bee7',
                                '#e1bHJH',
                                '#e1bee7',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                '#e1bee7',
                                '#e1bHJH',
                                '#e1bee7',
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],

                            borderWidth: 1,

                        }]
                    },
                    options: {
                        scales: {
                            yAxes: {
                                beginAtZero: true
                            }
                        }
                    },


                });


            });
        </script> --}}

        {{-- <script>
            $(document).ready(function() {
                const cData = JSON.parse(`<?php echo $response; ?>`);
                console.log(cData);
                console.log('joan' + cData[0].yhat);

                const formatDate = (dateString) => {
                    const date = new Date(dateString);
                    return date.toLocaleDateString(); // Formato de fecha personalizable
                };

                const formattedLabels = [
                    formatDate(cData[0].ds),
                    formatDate(cData[1].ds),
                    formatDate(cData[2].ds),
                    formatDate(cData[3].ds),
                    formatDate(cData[4].ds),
                    formatDate(cData[5].ds),

                ];

                const ctx = document.getElementById('myChart').getContext('2d');

                const myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: formattedLabels,
                        datasets: [{
                            label: '# De Total De Cursos',
                            data: [
                                cData[0].yhat_upper,
                                cData[1].yhat_upper,
                                cData[2].yhat_upper,

                                cData[3].yhat_upper,
                                cData[4].yhat_upper,
                                cData[5].yhat_upper
                            ],
                            backgroundColor: [
                                '#e1bee7',
                                '#e1bHJH',
                                '#e1bee7',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                '#e1bee7',
                                '#e1bHJH',
                                '#e1bee7',
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            });
        </script> --}}

        <script>
            $(document).ready(function() {
                const cData = JSON.parse(`<?php echo $response; ?>`);
                console.log(cData);

                const formatDate = (dateString) => {
                    const date = new Date(dateString);
                    return date.toLocaleDateString(); // Customizable date format
                };

                const formattedLabels = cData.map((data) => formatDate(data.ds));
                const yhatUpperValues = cData.map((data) => data.yhat_upper);

                const ctx = document.getElementById('myChart').getContext('2d');

                const myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: formattedLabels,
                        datasets: [{
                            label: '# De Total De Pedidos',
                            data: yhatUpperValues,
                            backgroundColor: [
                                '#e1bee7',
                                '#e1bHJH',
                                '#e1bee7',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                '#e1bee7',
                                '#e1bHJH',
                                '#e1bee7',
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            });
        </script>
    @endsection

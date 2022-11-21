@extends('layout')
@section('title', 'Administrador')
@section('home', 'active')
@section('title-header', 'Painel de controle')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Grafíco de missões OP no ano de {{ date('Y') }}</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <p class="d-flex flex-column">
                        <span>Total: <span id="TotalMissionsOp" class="text-bold text-lg"></span></span>


                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                        <span class="text-muted">Responsável: COST</span>
                    </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                    <canvas id="missions-op" height="250"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                        <i class="fas fa-square text-success"></i> I
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-square text-primary"></i> II
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-square text-secondary"></i> II
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-square text-warning"></i> IV
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-square text-info"></i> V-a
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-square text-danger"></i> V-m
                    </span>
                    <span class="mr-2">
                        <i style='color:blueviolet' class="fas fa-square"></i> VI
                    </span>
                    <span class="mr-2">
                        <i style='color:rgb(250, 4, 151)' class="fas fa-square"></i> VII
                    </span>
                    <span class="mr-2">
                        <i style='color:rgb(11, 2, 112)' class="fas fa-square"></i> VIII
                    </span>
                    <span class="mr-2">
                        <i style='color:rgb(7, 42, 20)' class="fas fa-square"></i> IX
                    </span>
                    <span class="mr-2">
                        <i style='color:rgb(25, 8, 41)' class="fas fa-square"></i> X
                    </span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header border-0">
                <h3 class="card-title">Products</h3>
                <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-download"></i>
                    </a>
                    <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Sales</th>
                            <th>More</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>
                                <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                Some Product
                            </td>
                            <td>$13 USD</td>
                            <td>
                                <small class="text-success mr-1">
                                    <i class="fas fa-arrow-up"></i>
                                    12%
                                </small>
                                12,000 Sold
                            </td>
                            <td>
                                <a href="#" class="text-muted">
                                    <i class="fas fa-search"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                Some Product
                            </td>
                            <td>$13 USD</td>
                            <td>
                                <small class="text-success mr-1">
                                    <i class="fas fa-arrow-up"></i>
                                    12%
                                </small>
                                12,000 Sold
                            </td>
                            <td>
                                <a href="#" class="text-muted">
                                    <i class="fas fa-search"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                Some Product
                            </td>
                            <td>$13 USD</td>
                            <td>
                                <small class="text-success mr-1">
                                    <i class="fas fa-arrow-up"></i>
                                    12%
                                </small>
                                12,000 Sold
                            </td>
                            <td>
                                <a href="#" class="text-muted">
                                    <i class="fas fa-search"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                Some Product
                            </td>
                            <td>$13 USD</td>
                            <td>
                                <small class="text-success mr-1">
                                    <i class="fas fa-arrow-up"></i>
                                    12%
                                </small>
                                12,000 Sold
                            </td>
                            <td>
                                <a href="#" class="text-muted">
                                    <i class="fas fa-search"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                Another Product
                            </td>
                            <td>$29 USD</td>
                            <td>
                                <small class="text-warning mr-1">
                                    <i class="fas fa-arrow-down"></i>
                                    0.5%
                                </small>
                                123,234 Sold
                            </td>
                            <td>
                                <a href="#" class="text-muted">
                                    <i class="fas fa-search"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                Amazing Product
                            </td>
                            <td>$1,230 USD</td>
                            <td>
                                <small class="text-danger mr-1">
                                    <i class="fas fa-arrow-down"></i>
                                    3%
                                </small>
                                198 Sold
                            </td>
                            <td>
                                <a href="#" class="text-muted">
                                    <i class="fas fa-search"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="dist/img/default-150x150.png" alt="Product 1"
                                    class="img-circle img-size-32 mr-2">
                                Perfect Item
                                <span class="badge bg-danger">NEW</span>
                            </td>
                            <td>$199 USD</td>
                            <td>
                                <small class="text-success mr-1">
                                    <i class="fas fa-arrow-up"></i>
                                    63%
                                </small>
                                87 Sold
                            </td>
                            <td>
                                <a href="#" class="text-muted">
                                    <i class="fas fa-search"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col-md-6 -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Comparativo de missões entre OM e OP</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <p class="d-flex flex-column">
                        <span>Total: <span id="totalOmOp" class="text-bold text-lg"></span></span>

                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                        <span class="text-muted">Responsável: COST e Fisc Adm</span>
                    </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                    <canvas id="missionsOmOp" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                    <span class="mr-3">
                        <i class="fas fa-square text-gray"></i> OP
                    </span>
                    <span>
                        <i class="fas fa-square text-warning"></i> OM
                    </span>


                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tráfego de veículos na OM</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="chart-responsive">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="rel-gda" style="display: block; width: 218px; height: 109px;"
                                class="chartjs-render-monitor" width="218" height="109"></canvas>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <ul class="chart-legend clearfix">
                            <li><i class="far fa-circle text-warning"></i> Civil</li>
                            <li><i class="far fa-circle text-secondary"></i> Outra OM</li>
                            <li><i class="far fa-circle text-danger"></i> 3° B Sup</li>

                    </div>

                </div>

            </div>

            <div class="card-footer p-0">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            United States of America
                            <span class="float-right text-danger">
                                <i class="fas fa-arrow-down text-sm"></i>
                                12%</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            India
                            <span class="float-right text-success">
                                <i class="fas fa-arrow-up text-sm"></i> 4%
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            China
                            <span class="float-right text-warning">
                                <i class="fas fa-arrow-left text-sm"></i> 0%
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    <!-- /.col-md-6 -->

@endsection
@section('plugins')
    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script>
        /* global Chart:false */

        $(function() {
            'use strict'

            var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
            }

            var mode = 'index'
            var intersect = true

            var $missionsOmOp = $('#missionsOmOp')
            // eslint-disable-next-line no-unused-vars
            $.get("{{ route('getGraphicMissionsOmOp') }}", function(result) {
                $('#totalOmOp').text(result.totalOmOp)
                var missionsOmOp = new Chart($missionsOmOp, {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set',
                            'Out', 'Nov',
                            'Dez'
                        ],
                        datasets: result.statistics
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            mode: mode,
                            intersect: intersect
                        },
                        hover: {
                            mode: mode,
                            intersect: intersect
                        },
                        legend: {
                            display: false
                        },
                        scales: {
                            yAxes: [{
                                display: true,
                                gridLines: {
                                    display: true,
                                    color: 'rgba(0, 0, 0, .1)',
                                    zeroLineColor: 'transparent'
                                },

                                ticks: $.extend({
                                    beginAtZero: true,
                                    suggestedMax: 50
                                }, ticksStyle)
                            }],
                            xAxes: [{
                                display: true,
                                gridLines: {
                                    display: true

                                },
                                ticks: ticksStyle
                            }]
                        }
                    }
                })
            })
            var $missionsCost = $('#missions-op')
            $.get("{{ route('getGraphicMissionsOp') }}", function(result) {
                $('#TotalMissionsOp').text(result.TotalMissionsOp);
                var missionsCost = new Chart($missionsCost, {
                    data: {
                        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set',
                            'Out', 'Nov',
                            'Dez'
                        ],
                        datasets: result.statisticsMission
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            mode: mode,
                            intersect: intersect
                        },
                        hover: {
                            mode: mode,
                            intersect: intersect
                        },
                        legend: {
                            display: false,
                        },
                        scales: {
                            yAxes: [{
                                // display: false,
                                gridLines: {
                                    display: true,
                                    lineWidth: '2px',
                                    color: 'rgba(0, 0, 0, .2)',
                                    zeroLineColor: 'transparent'
                                },
                                ticks: $.extend({
                                    beginAtZero: true,
                                    suggestedMax: 50
                                }, ticksStyle)
                            }],
                            xAxes: [{
                                display: true,
                                gridLines: {
                                    display: false
                                },
                                ticks: ticksStyle
                            }]
                        }
                    }
                })
            })
            // eslint-disable-next-line no-unused-vars



            var relGda = $('#rel-gda').get(0).getContext('2d')
            $.get("{{ route('getGraphicRelGda') }}", function(result) {
                var pieData = {
                    labels: ['Civil', 'Outra OM', '3° B Sup'],
                    datasets: [{
                        data: result.statistics,
                        backgroundColor: ['#ffc107 ', '#6c757d ', '#dc3545 ']
                    }]
                }
                var pieOptions = {
                    legend: {
                        display: false
                    }
                }
                var pieChart = new Chart(relGda, {
                    type: 'doughnut',
                    data: pieData,
                    options: pieOptions
                })
            })
        })


        // lgtm [js/unused-local-variable]
    </script>
@endsection

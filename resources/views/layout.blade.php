@php
    $perm = ['Cmt da Guarda', 'Pel Manut e Transp', 'Adjunto', 'COST', 'Fisc Adm', 'Administrador'];
@endphp
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    {{-- ==================================== CSS/JS ===================================== --}}

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('css/gfonts.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css') }}">

    {{-- CSS ESPECIFICO --}}
    @yield('css')
    {{-- CSS ESPECIFICO --}}
    {{-- sweetalert2 --}}
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('css/util.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/mask-jquery.js') }}"></script>
    <script src="{{ asset('js/bootbox.min.js') }}"></script>
    {{-- datatables --}}
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

    @yield('script')

    {{-- ====================================/ CSS/JS ===================================== --}}

</head>

<body class=" @if (session('theme') == 1) dark-mode @endif hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @if (session('animation') == 0)
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="{{ asset('img/logo.png') }}" height="200" width="200">
                <span class="fs-30"><strong>{{ config('app.name') }}</strong> </span>
            </div>
            @php
                session()->put('animation', 1);
            @endphp
        @endif
        <aside class="main-sidebar sidebar-dark-primary elevation-5">
            <div class="brand-link info">
                <img src="{{ asset('img/logo.png') }}" alt="CESV" class="brand-image img-circle">
                <span class="m-l-12 bold">CES Vtr</span>

            </div>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ 'https://sistao.3bsup.eb.mil.br/' . session('user')['photo'] }}"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <span
                            class="bold">{{ session('user')['rank'] . ' ' . session('user')['professionalName'] }}</span><br>
                        <span style="color:darkgray">{{ $perm[session('CESV')['profileType']] }}</span>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item ">
                            <a href="{{ route('home') }}" class="nav-link @yield('home')">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Início
                                </p>
                            </a>
                        </li>
                        @if (session('CESV')['profileType'] == 0 ||
                            session('CESV')['profileType'] == 2 ||
                            session('CESV')['profileType'] == 5)
                            <li class="nav-item ">
                                <a href="{{ route('reports') }}" class="nav-link @yield('reports')">
                                    <i class="nav-icon fas fa-file-chart-line"></i>
                                    <p>
                                        Relatório Guarda
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (session('CESV')['profileType'] == 5 || session('CESV')['profileType'] == 4)
                            <li class="nav-item ">
                                <a href="{{ route('missions') }}" class="nav-link @yield('mission')">
                                    <i class="nav-icon fas fa-truck-moving"></i>
                                    <p>
                                        Missões
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (session('CESV')['profileType'] == 1 || session('CESV')['profileType'] == 4)
                            <li class="nav-item ">
                                <a href="{{ route('fichas') }}" class="nav-link @yield('ficha')">
                                    <i class="nav-icon fas fa-clipboard-list"></i>
                                    <p id='f-c'>
                                        Fichas
                                    </p>
                                </a>
                            </li>
                        @else
                        @endif
                        @if (session('CESV')['profileType'] == 1 || session('CESV')['profileType'] == 5)
                            <li class="nav-item ">
                                <a href="{{ route('vtr') }}" class="nav-link @yield('vtr')">
                                    <i class="nav-icon fas fa-car"></i>
                                    <p>
                                        Viaturas
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('drivers') }}" class="nav-link @yield('mot')">
                                    <i class="nav-icon fas fa-tire"></i>
                                    <p>
                                        Motoristas
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (session('CESV')['profileType'] == 5)
                            <li class="nav-item ">
                                <a href="{{ route('users') }}" class="nav-link @yield('users')">
                                    <i class="nav-icon fas fa-users-cog"></i>
                                    <p>
                                        Usuários
                                    </p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item ">
                            <a href="{{ route('logout') }}" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Sair
                                </p>
                            </a>
                        </li>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title-header')</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid ">
                    <div class="row">
                        {{-- Conteudo --}}
                        @yield('content')

                        @if (session('CESV')['profileType'] < 3)
                            {{-- /CONTEUDO --}}
                            <section class="col-lg-3">
                                <div class="card bg-default">
                                    <div class="card-header border-0 bg-success">
                                        <h3 class="card-title">
                                            <i class="far fa-list-alt"></i>
                                            Fichas abertas
                                        </h3>
                                        <!-- /. tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body pt-0">
                                        <!--The calendar -->
                                        <table id="fichas_layout" class="table fs-14">
                                            <thead height="20">
                                                <tr>
                                                    <th>N°</th>
                                                    <th>Motorista</th>
                                                    <th>Missão</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <div class="card bg-default">
                                    <div class="card-header border-0 bg-success">

                                        <h3 class="card-title">
                                            <i class="far fa-calendar-alt"></i>
                                            Calendário
                                        </h3>
                                        <!-- /. tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body pt-0">
                                        <!--The calendar -->
                                        <div id="calendar" style="width: 100%"></div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </section>

                            <!-- right col -->
                        @endif

                        @if (session('CESV')['profileType'] == 3)
                            {{-- /CONTEUDO --}}
                            <section class="col-lg-3">
                                <div class="card bg-default">
                                    <div class="card-header border-0 bg-success">

                                        <h3 class="card-title">
                                            <i class="far fa-calendar-alt"></i>
                                            Calendário
                                        </h3>
                                        <!-- /. tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body pt-0">
                                        <!--The calendar -->
                                        <div id="calendar" style="width: 100%"></div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <div class="card">
                                    <div class="card-header border-0">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="card-title">Grafíco de missões OP no ano de {{ date('Y') }}
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <p class="d-flex flex-column">
                                                <span>Total: <span id="TotalMissionsOp"
                                                        class="text-bold text-lg"></span></span>


                                            </p>
                                            <p class="ml-auto d-flex flex-column text-right">
                                                <span class="text-muted">Responsável: COST</span>
                                            </p>
                                        </div>
                                        <!-- /.d-flex -->

                                        <div class="position-relative mb-4">
                                            <canvas id="graphicMission" height="250"></canvas>
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
                            </section>

                            <!-- right col -->
                        @endif
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <footer class="main-footer align-items-center ">
            <footer>
                <div class="text-center">
                    &copy;{{ config('app.name') . ' ' . date('Y') }} (v1.0) | integrado com &copy;SisTAO
                    {{ date('Y') }} (v1.5)
                    <br>
                    Desenvolvido por: <a href="https://www.linkedin.com/in/eduardo-martins-a100b6211/" target="_blank"
                        rel="noopener noreferrer">Eduardo Martins</a>
                </div>
            </footer>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    {{-- ========================== MODAL ========================== --}}
    @yield('modal')
    {{-- ==================================== PLUGINS ===================================== --}}
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

    <script>
        setInterval(() => {
            $.get("{{ route('getSession') }}", function(result) {
                if (result == false) {
                    document.location.reload(true);
                }
            })
        }, 60000);

        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('plugins/moment/locales.js') }}"></script>
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.j') }}s"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.js') }}"></script>
    <script src="{{ asset('js/calendar.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/numeric-comma.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    @yield('plugins')
    @if (session('CESV')['profileType'] < 3 || session('CESV')['profileType'] == 4)
        <script>
            $("#fichas_layout").DataTable({

                "paging": true,
                'pagingType': 'simple',
                "responsive": true,
                "lengthChange": true,
                "iDisplayLength": 5,
                "autoWidth": false,
                "dom": '<"top">rt<"bottom"ip><"clear">',
                "language": {
                    "url": "{{ asset('plugins/datatables/Portuguese3.json') }}"
                },
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('fichas_layout') }}",
                    "type": "POST",
                    "headers": {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },

                }
            });
        </script>
    @endif
    @if (session('CESV')['profileType'] == 3)
        <script>
            var $missionsCost = $('#graphicMission')
            $(function() {
                'use strict'

                var ticksStyle = {
                    fontColor: '#495057',
                    fontStyle: 'bold'
                }

                var mode = 'index'
                var intersect = true

                var $missionsOmOp = $('#missionsOmOp')
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
            })
        </script>
    @endif
    @if (session('CESV')['profileType'] == 4)
        <script>
            window.onload = countFicha();
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 8000
            })
            var count = 0

            function countFicha() {
                $.get("{{ route('getNewFichas') }}", function(result) {
                    result == 0 ? '' : $('#f-c').html('Fichas <span class="badge badge-success right">' + result +
                        '</span>')

                    if (count != result)
                        Toast.fire({
                            icon: 'success',
                            title: '&nbsp&nbsp Nova ficha foi solicitada.'
                        });
                    count = result
                })
            }
            setInterval(() => {
                countFicha()
            }, 30000);
        </script>
    @endif
    {{-- ====================================/ PLUGINS ===================================== --}}
</body>


</html>

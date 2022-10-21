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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
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
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/mask-jquery.js') }}"></script>
    <script src="{{ asset('js/bootbox.min.js') }}"></script>

    @yield('script')

    {{-- ====================================/ CSS/JS ===================================== --}}

</head>

<body class=" dark-mode  hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center  align-items-center">
            <img class="animation__shake" src="{{ asset('img/logo.png') }}" alt="" height="180"
                width="180">
            <br>
            <h3 class="fs-40 bold">{{ config('app.name') }}</h3>
        </div>
        <aside class="main-sidebar sidebar-dark-primary elevation-5">
            <div class="brand-link">
                <img src="{{ asset('img/logo.png') }}" alt="CoMiLMed" class="brand-image img-circle">
                <span class="bold">CES Vtr</span>
            </div>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('img/people.png') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="http://sistao.3bsup.eb.mil.br/profile/view" class="d-block">Cb Eduardo</a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item ">
                            <a href=" " class="nav-link @yield('home')">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Início
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

                        {{-- /CONTEUDO --}}
                        <section class="col-lg-3">
                            @if (1 == 1)
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
                                        <table id="event_list" class="table fs-14">
                                            <thead height="20">
                                                <tr>
                                                    <th>N°</th>
                                                    <th>Motorista</th>
                                                    <th>Fim</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1010</td>
                                                    <td>Cb Rocha</td>
                                                    <td>13/11/2022</td>
                                                </tr>
                                                <tr>
                                                    <td>1090</td>
                                                    <td>Cb Jesse</td>
                                                    <td>13/11/2022</td>
                                                </tr>
                                                <tr>
                                                    <td>1011</td>
                                                    <td>Cb Curioso</td>
                                                    <td>13/11/2022</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            @endif
                            @yield('content-add')
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
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
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
    @yield('plugins')
    {{-- @if (1 == 1)
        <script>
            $("#event_list").DataTable({

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
                    "url": "",
                    "type": "POST",
                    "headers": {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },

                }
            });
        </script>
    @endif --}}
    {{-- ====================================/ PLUGINS ===================================== --}}
</body>


</html>

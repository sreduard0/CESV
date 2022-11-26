@php
    $perm = ['Comandante da Guarda', 'Pel Manut e Transp', 'Adjunto', 'COST', 'Fiscal Administrativo', 'Administrador'];
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
    <style>
        .dataTables_wrapper .dataTables_filter {
            float: right;
            text-align: right;
            visibility: hidden;
        }
    </style>
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
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    @yield('plugins')
</body>


</html>

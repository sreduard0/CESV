@php
    $tools = new App\Classes\Tools();
    $i = 0;
@endphp
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - Relaório do cmt da missão</title>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    {{-- ==================================== CSS/JS ===================================== --}}
    <link rel="stylesheet" href="{{ asset('css/gfonts.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css') }}">
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
    <style>
        @media print {
            @page {
                margin-top: 0;
                margin-bottom: 0;
            }

            body {
                padding-top: 72px;
                padding-bottom: 72px;
            }
        }
    </style>

    {{-- ====================================/ CSS/JS ===================================== --}}

</head>

<body class="layout-top-nav">
    @if ($status == true)
        <section class="align-items-center">
            <div class="container-fluid col-xl-8">
                <div class="card-header border-0">
                    <h3>Relatório da missão {{ $mission->mission_name }} para
                        {{ $mission->destiny }}</h3>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title card-title-background "> <i class="fas fa-info-circle mr-1"></i>
                            Informações da missão</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="  float-l col-md-6">
                                <strong>Missão</strong>

                                <p class="text-muted">{{ $mission->mission_name }}</p>

                                <hr>

                                <strong>Tipo</strong>

                                <p class="text-muted">{{ $mission->type_mission }}</p>

                                <hr>

                                <strong>Destino</strong>

                                <p class="text-muted">{{ $mission->destiny }}</p>

                                <hr>


                                <strong>Classe</strong>

                                <p class="text-muted">{{ $mission->class }}</p>

                                <hr>


                                <strong>Nome do cmt da missão</strong>
                                <p class="text-muted">{{ $mission->pg_seg . ' ' . $mission->name_seg }}</p>


                                <hr>


                                <div class="row">
                                    <div class="col">
                                        <strong>Contato</strong>
                                        <p class="text-muted">
                                            {{ $tools->mask('+## (##) # ####-####', $mission->contact) }}
                                        </p>
                                    </div>
                                    <div class="col">
                                        <a href="https://api.whatsapp.com/send?phone={{ $mission->contact }}"
                                            target="_blank" class="float-r m-r-30 btn btn-success"><i
                                                class="fs-23 fab fa-whatsapp"></i></a>
                                    </div>
                                </div>


                                <hr>
                            </div>
                            <div class=" float-r col-md-6">
                                <strong>Domumento</strong>

                                <p class="text-muted">{{ $mission->doc }}</p>
                                <hr>
                                <strong>Viaturas</strong>
                                <table class="table table-hover">
                                    <tbody>
                                        @foreach ($mission->vtrinfo as $vtr)
                                            @php
                                                $i++;
                                            @endphp
                                            <tr data-widget="expandable-table" aria-expanded="true">
                                                <td>{{ $i }} - {{ $vtr->vtrinfo->mod_vtr }} <i
                                                        class="text-success float-r fa fa-eye"></i>
                                                </td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td>
                                                    <p class="m-l-30 text-muted">Ficha: {{ $vtr->nr_ficha }}
                                                    </p>
                                                    <p class="m-l-30 text-muted">Motorista:
                                                        {{ $vtr->motinfo->pg . ' ' . $vtr->motinfo->name }}
                                                    </p>
                                                    <p class=" m-l-30 text-muted">Segurança:
                                                        {{ $vtr->pg_seg . ' ' . $vtr->name_seg }}
                                                    </p>
                                                    <p class="m-l-30 text-muted">Km(s) rodados:
                                                        {{ $vtr->od_total }}
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <hr>

                                <strong>Status</strong>

                                <p class="text-muted">Finalizada</p>

                                <hr>

                                <strong>Prev. de partida</strong>

                                <p class="text-muted">
                                    {{ date('d/m/Y H:i', strtotime($mission->prev_date_part)) }}</p>

                                <hr>

                                <strong>Prev. de chegada</strong>

                                <p class="text-muted">
                                    {{ date('d/m/Y H:i', strtotime($mission->prev_date_chgd)) }}</p>

                                <hr>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <strong>Observações para execução </strong>
                                <p class="text-muted">{!! $mission->obs ? $mission->obs : 'Sem observações' !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title card-title-background "> <i class="fas fa-info-circle mr-1"></i>
                            Informações de
                            conclusão</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class=" float-l col-md-6">
                                <strong>Data de fim da missão</strong>

                                <p id="dateFinMission" class="text-muted">-</p>

                                <hr>

                                <strong>Peso</strong>

                                <p id="kg" class="text-muted">-</p>

                                <hr>
                                <strong>M <sup>3</sup> da carga</strong>

                                <p id="m3" class="text-muted">-</p>

                                <hr>



                            </div>
                            <div class=" float-r col-md-6">
                                <strong>Consumo gasolina</strong>

                                <p id="conGas" class="text-muted">-</p>
                                <hr>

                                <strong>Consumo diesel</strong>

                                <p id="conDiesel" class="text-muted">-</p>
                                <hr>
                                <strong>Alteração</strong>

                                <p id="alt" class="text-muted">-</p>

                                <hr>


                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <strong>Observações </strong>

                                <p id="obs" class="text-muted">-</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="m-t-100 align-items-center ">
            <div style="color:#000" class="text-center">
                ____________________________________________
                <br>
                {{ $mission->name_seg . ' - ' . $mission->pg_seg }}
                <br>
                Chefe da missão
            </div>
        </footer>
    @else
        <div class="content-wrapper">
            <section class="content align-items-center">
                <div class="container-fluid col-xl-8">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center align-items-center ">
                            <span class="text-muted">Você não pode acessar este documento</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endif
</body>
{{-- ==================================== PLUGINS ===================================== --}}
<script>
    window.print()
    window.close()
</script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
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

<script src="{{ asset('js/inputmask.js') }}"></script>

</html>

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
    @if (!$mission->finish_mission)
        <script src="{{ asset('js/form-report.js') }}"></script>
    @endif


    {{-- ====================================/ CSS/JS ===================================== --}}

</head>

<body id="theme" class="dark-mode layout-top-nav">

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
        <div class="" id="send-loading"></div>
        @if ($mission->finish_mission)
            <div class="content-wrapper">
                <section class="content align-items-center m-t-40">
                    <div class="container-fluid col-xl-8">
                        <div class="card">
                            <div class="card-body d-flex justify-content-center align-items-center ">
                                <span class="text-muted">Este relatório já foi finalizado.</span>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @else
            <div class="content-wrapper">
                <section class="m-t-40 content align-items-center">
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
                                                    <tr data-widget="expandable-table" aria-expanded="false">
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
                        <div id="panelInfoCon" class="card d-none">
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
                        <div id="form" class="card">
                            <div class="card-header">
                                <h3 class="card-title card-title-background "> <i class="fas fa-info-circle mr-1"></i>
                                    Informações de
                                    conclusão</h3>
                            </div>
                            <div class="card-body">
                                <div class="col">
                                    <div class="d-flex justify-content-sm-end">
                                        <p class="f-s-13">(Campos com <span style="color:red">*</span>
                                            são obrigatórios)</p>
                                    </div>
                                </div>
                                <form id="form-report">
                                    <input type="hidden" id="id_mission" name="id_mission"
                                        value="{{ $tools->hash($mission->id, 'encrypt') }}">
                                    <div class="row">
                                        <div class="float-l col-md-6">
                                            <div class="form-group">
                                                <label>Data de fim da missão<span style="color:red">*</span></label>
                                                <div class="input-group datet" id="dateFinishTarget"
                                                    data-target-input="nearest">
                                                    <div class="input-group-prepend" data-target="#dateFinishTarget"
                                                        data-toggle="datetimepicker">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control datetimepicker-input"
                                                        data-target="#dateFinishTarget" id="dateFinish"
                                                        name="dateFinish" value="">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="ton">Peso em KG<span
                                                        style="color:red">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-weight-hanging"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="kiloGram"
                                                        name="kiloGram" data-inputmask="'mask':'99999999999'"
                                                        data-mask="" inputmode="text" placeholder="Peso da carga">

                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="metersCub">M<sup>3</sup> da carga<span
                                                        style="color:red">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-cube"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="metersCub"
                                                        name="metersCub" data-inputmask="'mask':'99999999999'"
                                                        data-mask="" inputmode="text" placeholder="Metros cubicos">

                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class=" float-r col-md-6">
                                            <div class="form-group">
                                                <label for="consGas">Consumo de gasolina em litros<span
                                                        style="color:red">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-gas-pump"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="consGas"
                                                        name="consGas" data-inputmask="'mask':'99999999999'"
                                                        data-mask="" inputmode="text"
                                                        placeholder="Consumo de gasolina">

                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="consDiesel">Consumo de diesel em litros<span
                                                        style="color:red">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-gas-pump"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="consDiesel"
                                                        name="consDiesel" data-inputmask="'mask':'99999999999'"
                                                        data-mask="" inputmode="text"
                                                        placeholder="Consumo de diesel">

                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group col-md-5">
                                                <label for="altMission">Ouve alterações na missão? <span
                                                        style="color:red">*</span></label>
                                                <div class="input-group">
                                                    <select id="altMission" name="altMission" class="form-control">
                                                        <option selected value="">Selecione</option>
                                                        <option value="1">Sim</option>
                                                        <option value="0">Não</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <hr>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col">
                                            <label for="obsMission">Observações de conclusão </label> (Exemplo:
                                            alterações
                                            ou
                                            melhorias)
                                            <textarea name="obsMission" id="obsMission" rows="20" placeholder="Ex: Carro com impressoras."
                                                class=" text form-control"></textarea>
                                        </div>
                                    </div>
                                    <div id="ass" class="d-none row">
                                        <div class="form-group col-md-1">
                                            <label for="pg">Posto/Grad<span style="color:red">*</span></label>
                                            <select class="form-control" name="pg" id="pg">
                                                <option value="">-</option>
                                                <option value="Gen">Gen</option>
                                                <option value="Cel">Cel</option>
                                                <option value="TC">TC</option>
                                                <option value="Maj">Maj</option>
                                                <option value="Cap">Cap</option>
                                                <option value="1º Ten">1º Ten</option>
                                                <option value="2º Ten">2º Ten</option>
                                                <option value="Asp">Asp</option>
                                                <option value="ST">ST</option>
                                                <option value="1º Sgt">1º Sgt</option>
                                                <option value="2º Sgt">2º Sgt</option>
                                                <option value="3º Sgt">3º Sgt</option>
                                                <option value="Cb">Cb</option>
                                                <option value="Sd">Sd</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-5">
                                            <label for="fullName">Nome completo<span
                                                    style="color:red">*</span></label>
                                            <input minlength="2" maxlength="200" id="fullName" name="fullName"
                                                type="text" class="form-control" placeholder="Nome completo">
                                        </div>
                                    </div>
                                </form>
                                <div class="row  d-flex justify-content-between">
                                    <div class="form-group col-md-3">
                                        <label for="sendReport">Deseja receber este relatório? <span
                                                style="color:red">*</span></label>
                                        <div class="input-group">
                                            <select id="sendReport" name="sendReport" class="form-control">
                                                <option selected value="">Selecione uma opcão</option>
                                                <option value="0">Não receber</option>
                                                <option value="1">Email</option>
                                                <option disabled value="2">WhatsApp</option>
                                                <option value="3">Imprimir</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button onclick="saveReport()" class="float-r m-t-30 btn  btn-success">Salvar
                                            relatório</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        @endif
    </div>
    <div id="sandEmail"></div>
    <footer class="main-footer align-items-center ">
        <div class="text-center">
            &copy;{{ config('app.name') . ' ' . date('Y') }} (v1.0) | integrado com &copy;SisTAO
            {{ date('Y') }} (v1.5)
            <br>
            Desenvolvido por: <a href="https://www.linkedin.com/in/eduardo-martins-a100b6211/" target="_blank"
                rel="noopener noreferrer">Eduardo Martins</a>
        </div>
    </footer>

    {{-- ==================================== PLUGINS ===================================== --}}
    <script>
        document.getElementById('sendReport').addEventListener('change', event => {
            if (event.target.value >= 1) {
                $('#ass').removeClass('d-none')
            } else {
                $('#ass').addClass('d-none')
            }
        });
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

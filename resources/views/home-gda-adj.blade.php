@extends('layout')
@section('title', 'Guarda')
@section('home', 'active')
@section('title-header', 'Controle de viaturas')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    {{-- QR Code --}}
    <link rel="stylesheet" href="{{ asset('plugins/qr-scanner/style-qr-code.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Modal de registro manual -->
    <script src="{{ asset('js/hide-form.js') }}"></script>
    <style>
        .dataTables_wrapper .dataTables_filter {
            float: right;
            text-align: right;
            visibility: hidden;
        }
    </style>
@endsection

@section('content')
    <section class="col ">
        <div class="col">
            <h4 style="width:350px" class="border-bottom border-success">Veículos dentro e fora da OM</h4>
        </div>
        <div class="row ">

            <div class="col-lg-3 col-6">

                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3 id="ata">05 </h3>
                        <p class="bold">Outra OM</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-car"></i>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3 id="reintegrado">05</h3>
                        <p class=" bold">CIVIL</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-car"></i>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3 id="encostado">20</sup></h3>
                        <p class=" bold">ADMINISTRATIVA</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-car"></i>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3 id="adido">02</h3>
                        <p class=" bold">OPERACIONAL</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-car"></i>
                    </div>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row d-flex justify-content-between">
                    <div class="col-md-5">
                        <div class="row ">
                            <div class="form-group col">
                                <label for="condition_filter">Viatura</label>
                                <select id="condition_filter" name="condition_filter" class="form-control">
                                    <option selected value="">TODAS AS VIATURAS</option>
                                    <option value="">CIVIL</option>
                                    <option value="">Outra OM</option>
                                    <option value="">ADMINISTRATIVA</option>
                                    <option value="">OPERACIONAL </option>
                                </select>
                            </div>
                            <button onclick="return search_condition()" style="height: 40px;"
                                class="btn btn-success m-t-30"><i class="fa fa-search"></i></button>
                        </div>
                    </div>


                    <div class="d-flex justify-content-sm-end">
                        <div class="col">
                            <button class="btn btn-primary" data-toggle="modal"
                                data-target="#register-vtr">Registrar</button>

                            <button id="qr-read" class="btn btn-success" data-toggle="modal" data-target="#qr-code-modal">
                                <i class="fa fa-qrcode"></i> Ler QR
                                Code</button>
                        </div>
                    </div>
                </div>


                <div id="button-print"></div>



            </div>
            <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="30px">Ficha</th>
                            <th>Modelo Vtr</th>
                            <th>Motorista</th>
                            <th>Segurança</th>
                            <th>Hora - Saída</th>
                            <th>Odômetro - Saída</th>
                            <th>OM</th>
                            <th>Missão/Destino</th>
                            <th style="min-width:70px"><i class="fs-20 fa fa-info-circle"></i> info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1010</td>
                            <td>Maarua</td>
                            <td>Sd De Carvalho</td>
                            <td>Cb Rocha</td>
                            <td>12:40 30-10-2022</td>
                            <td>999999999</td>
                            <td>3bsup</td>
                            <td>Comer Quenga</td>
                            <td>
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#info-vtr"><i
                                        class="fa fa-car"></i></button>
                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#info-register"
                                    data-id='1'><i class="fa fa-list-alt"></i></button>

                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete"><i
                                        class="fa fa-trash"></i></button>
                            </td>
                        <tr>
                            <td>OOM</td>
                            <td>Maarua</td>
                            <td>Sd Bruno</td>
                            <td>Cb Jao</td>
                            <td>12:40 30-10-2022</td>
                            <td>999999999</td>
                            <td>8blog</td>
                            <td>Comer Quenga</td>
                            <td>
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#info-vtr"><i
                                        class="fa fa-car"></i></button>
                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#info-register"
                                    data-id='5'><i class="fa fa-list-alt"></i></button>

                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete"><i
                                        class="fa fa-trash"></i></button>
                            </td>
                        <tr>
                            <td>1010</td>
                            <td>Maarua</td>
                            <td>Sd CUca</td>
                            <td>Cb Pinto</td>
                            <td>12:40 30-10-2022</td>
                            <td>999999999</td>
                            <td>cms</td>
                            <td>Comer Quenga</td>
                            <td>
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#info-vtr"><i
                                        class="fa fa-car"></i></button>
                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#info-register"
                                    data-id='13'><i class="fa fa-list-alt"></i></button>

                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete"><i
                                        class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
@endsection
@section('modal')
    <!-- MODAL REGISTER VTR QR Code-->
    <div class="modal fade" id="qr-code-modal" tabindex="-1" role="dialog" aria-labelledby="qr-code-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="qr-code-modalLabel">Escaneie o QR Code da viatura</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body" style="max-height:550px">
                        <div id="video-container" class="style-2">
                            <video id="qr-video"></video>
                        </div>

                        <div style="margin-top: 10px" class="d-flex justify-content-between">

                            <div class="form-group col-md-3">
                                <select id="cam-list" class="form-control">
                                    <option value="environment" selected>Câmera traseira
                                    </option>
                                    <option value="user">Camera frontal</option>
                                </select>
                            </div>
                            <div class="col">
                                <div class="d-flex justify-content-sm-end">
                                    <button id='flash-btn' class='btn btn-secondary'><i
                                            class="fa fa-bolt"></i></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL REGISTER VTR MANUAL-->
    <div class="modal fade" id="register-vtr" tabindex="-1" role="dialog" aria-labelledby="register-vtrLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="register-vtrLabel">Registrar entrada/saída
                        de viatura</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        <div class="d-flex justify-content-sm-end">
                            <p class="f-s-13">(Campos com <span style="color:red">*</span>
                                são obrigatórios)</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="vicle_type">Tipo de veículo</label>
                            <select onchange="selectedata(this.value)" id="vicle_type" name="vicle_type"
                                class="form-control">
                                <option selected>SELECIONE O TIPO DE VEÍCULO</option>
                                <option value="civil">CIVIL</option>
                                <option value="oom">Outra OM</option>
                                <option value="adm">ADMINISTRATIVA</option>
                                <option value="op">OPERACIONAL</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-group">
                                <label>Data/Hora de entrada</label>
                                <div class="input-group" id="startDate_">
                                    <input disabled name="startDate" id="_hora" type="text" class="form-control "
                                        value="">
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- FORM CIVIL --}}
                    <div id="f-civil" style="display:none">
                        <form id="form-civil">
                            <div class="row">
                                <div class="form-group col">
                                    <label for="name">Nome do motorista <span style="color:red">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Nome do motorista">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="name">CPF/RG/CNH <span style="color:red">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="CPF/RG/CNH">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="name">Modelo veículo <span style="color:red">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Modelo veículo">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="name">Placa <span style="color:red">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Placa">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="name">Qtd de passageiros <span style="color:red">*</span></label>
                                    <input id="name" name="name" type="number" class="form-control"
                                        placeholder="Qtd de passageiros">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="name">Destino <span style="color:red">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Destino">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="name">Observações</label>
                                    <textarea name="" id="" rows="8" placeholder="Ex: Carro com impressoras."
                                        class="form-control"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- FORM OUTRA OM --}}
                    <div id="f-oom" style="display:none">
                        <form id="form-oom">
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="pg">Posto/Grad <span style="color:red">*</span></label>
                                    <select class="form-control" name="rank_id" id="rank_id">
                                        <option value="">Selecione</option>
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
                                <div class="form-group col">
                                    <label for="name">Nome do motorista <span style="color:red">*</span></label>
                                    <input id="name" name="name" typphp e="text" class="form-control"
                                        placeholder="Nome do motorista">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="pg">Posto/Grad <span style="color:red">*</span></label>
                                    <select class="form-control" name="rank_id" id="rank_id">
                                        <option value="">Selecione</option>
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
                                <div class="form-group col">
                                    <label for="name">Nome do segurança <span style="color:red">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Nome do segurança">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="name">Idt mil <span style="color:red">*</span> </label> (do mais
                                    antigo)
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Idt mil">
                                </div>
                                <div class="form-group col">
                                    <label for="name">Modelo veículo <span style="color:red">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Modelo veículo">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="name">Placa / EB <span style="color:red">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Placa / EB">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="name">OM <span style="color:red">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="OM">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="name">Destino / Missão <span style="color:red">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Destino / Missão">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="name">Observações</label>
                                    <textarea name="" id="" rows="8" placeholder="Ex: Autorizado sair sem segurança pelo CMT."
                                        class="form-control"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- FORM ADM/OP --}}
                    <div id="f-adm-op" style="display:none">
                        <form id="form-adm-op">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="pg">Número da ficha <span style="color:red">*</span></label>
                                    <select class="form-control" name="rank_id" id="rank_id">
                                        <option value="">Selecione</option>
                                        <option value="1580">1580 / Cb Jesse</option>
                                        <option value="1581">1581 / Sd De Carvalho
                                        </option>
                                        <option value="1582">1582 / Sgt Criss</option>
                                        <option value="1583">1583 / Ten Melzin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="pg">Posto/Grad <span style="color:red">*</span></label>
                                    <select class="form-control" name="rank_id" id="rank_id">
                                        <option value="">Selecione</option>
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
                                <div class="form-group col">
                                    <label for="name">Nome do motorista <span style="color:red">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Nome do motorista">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="pg">Posto/Grad <span style="color:red">*</span></label>
                                    <select class="form-control" name="rank_id" id="rank_id">
                                        <option value="">Selecione</option>
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
                                <div class="form-group col">
                                    <label for="name">Nome do segurança <span style="color:red">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Nome do segurança">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="name">Modelo veículo <span style="color:red">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Modelo veículo">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="name">Placa / EB <span style="color:red">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Placa / EB">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="name">Odômetro <span style="color:red">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Odômetro">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="name">Destino / Missão <span style="color:red">*</span></label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Destino / Missão">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="name">Observações</label>
                                    <textarea name="" id="" rows="8" placeholder="Ex: Autorizado sair sem segurança pelo CMT."
                                        class="form-control"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-success" onclick="">Registrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL INFORMAÇÕES DA VTR -->
    @include('component.info-vtr')

    {{--  INFORMÇOES DO REGISTRO DE ENTRADA E saída --}}
    @include('component.info-register')


@endsection
@section('plugins')
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
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
    <script src="{{ asset('js/actions.js') }}"></script>
    <script src="{{ asset('js/inputmask.js') }}"></script>
    {{-- QrCode --}}
    <script type="module" src="{{ asset('plugins/qr-scanner/qr-code.js') }}"></script>

    <script>
        // $(function() {
        //     var url = '/get_qtt_licensing';
        //     $.get(url, function(result) {
        //         document.getElementById('ata').innerText = result.ata;
        //         document.getElementById('reintegrado').innerText = result.reintegrado;
        //         document.getElementById('encostado').innerText = result.encostado;
        //         document.getElementById('adido').innerText = result.adido;
        //     })
        // });

        $(function() {
            $("#table").DataTable({
                "paging": true,
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                // "aoColumnDefs": [{
                //     'bSortable': false,
                //     'aTargets': [0, 4, 5, 6]
                // }],
                "language": {
                    "url": "{{ asset('plugins/datatables/Portuguese2.json') }}"
                },
                "processing": true,
                // "serverSide": true,

                // "ajax": {
                //     "url": "",
                //     "type": "POST",
                //     "headers": {
                //         'X-CSRF-TOKEN': "{{ csrf_token() }}",
                //     },
                // },
                "dom": "Bfrtip",
                "lengthMenu": [
                    [10, 25, 50, 100, 100000],
                    ["10", "25", "50", "100", "Todos"],
                ],
                "buttons": [{
                        "extend": "print",
                        "text": "Imprimir",
                        'messageTop': " ",
                        'messageBottom': 'Seção de Saúde',
                        'exportOptions': {
                            'columns': [1, 2, 3, 4, 5]
                        },
                        "autoPrint": true,
                    },
                    {
                        "extend": "pageLength",
                        "text": "Exibir",
                    },
                ],
            });

        });
    </script>

@endsection

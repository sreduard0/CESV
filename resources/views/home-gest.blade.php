@extends('layout')
@section('title', 'Transporte')
@section('home', 'active')
@section('title-header', 'Controle de missões')
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
        <div class="card">
            <div class="card-header">
                <div class="row d-flex justify-content-between">
                    <div class="col-md-5">
                        <div class="row ">
                            <div class="form-group col">
                                <label for="condition_filter">Viatura</label>
                                <select id="condition_filter" name="condition_filter" class="form-control">
                                    <option selected value="">TODAS AS VIATURAS</option>
                                    <option value="OM">OM</option>
                                    <option value="OP">OP</option>
                                </select>
                            </div>
                            <button onclick="return search_condition()" style="height: 40px;"
                                class="btn btn-success m-t-30"><i class="fa fa-search"></i></button>
                        </div>
                    </div>


                    <div class="d-flex justify-content-sm-end">
                        <div class="col">
                            <button class="btn btn-primary" data-toggle="modal"
                                data-target="#register-mission">Cadastrar</button>
                        </div>
                    </div>
                </div>


                <div id="button-print"></div>



            </div>
            <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="30px">#</th>
                            <th>Missão</th>
                            <th>Tipo</th>
                            <th>Destino</th>
                            <th>Documento</th>
                            <th>Classe</th>
                            <th>Vtr</th>
                            <th>Prev. partida</th>
                            <th>Status</th>
                            <th style="width:85px"><i class="fs-20 fa fa-info-circle"></i> info</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
@endsection
@section('modal')
    <!-- MODAL REGISTRAR MISSÃO-->
    <div class="modal fade" id="register-mission" tabindex="-1" role="dialog" aria-labelledby="register-missionLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="register-missionLabel">Cadastrar missão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-mission">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="pg">Tipo de missão <span style="color:red">*</span></label>
                                <select class="form-control" name="rank_id" id="rank_id">
                                    <option value="">Selecione</option>
                                    <option value="OP">OP</option>
                                    <option value="OM">OM</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="name">Missão <span style="color:red">*</span></label>
                                <input id="name" name="name" typphp e="text" class="form-control"
                                    placeholder="Ex: Feno e Aveia">
                            </div>
                            <div class="form-group col">
                                <label for="name">Destino <span style="color:red">*</span></label>
                                <input id="name" name="name" type="text" class="form-control"
                                    placeholder="Destino da missão (OM ou local).">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="pg">Classe <span style="color:red">*</span></label>
                                <select class="form-control" name="rank_id" id="rank_id">
                                    <option selected value="">Selecione</option>
                                    <option value="1">I</option>
                                    <option value="2">II</option>
                                    <option value="3">III</option>
                                    <option value="4">IV</option>
                                    <option value="51">V (A)</option>
                                    <option value="52">V (M)</option>
                                    <option value="6">VI</option>
                                    <option value="7">VII</option>
                                    <option value="8">VIII</option>
                                    <option value="9">IX</option>
                                    <option value="10">X</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="pg">Viatura<span style="color:red">*</span></label>
                                <select class="form-control" name="rank_id" id="rank_id">
                                    <option selected value="">Selecione</option>
                                    <option value="1">I</option>
                                    <option value="2">II</option>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="name">Documento <span style="color:red">*</span> </label>
                                <input id="name" name="name" type="text" class="form-control"
                                    placeholder="documento que deu ordem para a realizar a missão.">
                            </div>
                            <div class="form-group colmd-3">
                                <label for="name">Origem <span style="color:red">*</span></label>
                                <input id="name" name="name" type="text" class="form-control"
                                    placeholder="De onde parte a missão.">
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
                                <label for="name">Nome do cmt da missão <span style="color:red">*</span></label>
                                <input id="name" name="name" type="text" class="form-control"
                                    placeholder="Nome do cmt da missão">
                            </div>

                        </div>
                        <div class="row">

                            <div class="form-group col">
                                <label>Prev. do dia e horário da partida</label>
                                <div class="input-group date" id="prev_part" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#prev_part" id="prev_part" name="prev_part" value="">
                                    <div class="input-group-append" data-target="#prev_part"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col">
                                <label>Prev. do dia e horário da chegada</label>
                                <div class="input-group date" id="prev_chgd" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#prev_chgd" id="prev_chgd" name="prev_chgd" value="">
                                    <div class="input-group-append" data-target="#prev_chgd"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="name">Telefone de contato <span style="color:red">*</span> </label>
                                <input id="name" name="name" type="text" class="form-control"
                                    placeholder="Ex: (51) 980514188">
                            </div>
                            {{-- <span class="form-group  fs-12">(Inserir o
                                telefone celular do Cmt da Missão (COM DDD), visando contato de coordenação)</span> --}}
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="name">Observações</label>
                                <textarea name="" id="" rows="8"
                                    placeholder="Detalhes importantes da missão. Exemplo: Para Eixo Sul PGT" class="form-control"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-success" onclick="">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL INFORMAÇÕES DA VTR -->
    @include('component.info-vtr')

    {{--  INFORMÇOES DO REGISTRO DE ENTRADA E saída --}}
    @include('component.info-mission')


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

    <script>
        $(function() {
            $("#table").DataTable({
                "paging": true,
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [0, 8]
                }],
                "language": {
                    "url": "{{ asset('plugins/datatables/Portuguese2.json') }}"
                },
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('post_missions_list') }}",
                    "type": "POST",
                    "headers": {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                },
                "dom": "Bfrtip",
                "lengthMenu": [
                    [10, 25, 50, 100, 100000],
                    ["10", "25", "50", "100", "Todos"],
                ],
                "buttons": [{
                        "extend": "print",
                        "text": "Imprimir",
                        'messageTop': " ",
                        'messageBottom': 'Seção de Transporte e Manutenção',
                        'exportOptions': {
                            'columns': [1, 2, 3, 4, 5, 6, 7, 8]
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

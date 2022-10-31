@extends('layout')
@section('title', 'Transporte')
@section('home', 'active')
@section('title-header', 'Controle de missões')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    {{-- QR Code --}}
    <link rel="stylesheet" href="{{ asset('plugins/qr-scanner/style-qr-code.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    {{-- CRUD .JS --}}
    <script src="{{ asset('js/crud-missions.js') }}"></script>
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
                    <form id="form-register-mission">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="typeMission">Tipo de missão <span style="color:red">*</span></label>
                                <select class="form-control" name="typeMission" id="typeMission">
                                    <option value="">Selecione</option>
                                    <option value="OP">OP</option>
                                    <option value="OM">OM</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="nameMission">Missão <span style="color:red">*</span></label>
                                <input id="nameMission" name="nameMission" typphp e="text" class="form-control"
                                    placeholder="Ex: Feno e Aveia">
                            </div>
                            <div class="form-group col">
                                <label for="destinyMission">Destino <span style="color:red">*</span></label>
                                <input id="destinyMission" name="destinyMission" type="text" class="form-control"
                                    placeholder="Destino da missão (OM ou local).">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="classMission">Classe <span style="color:red">*</span></label>
                                <select class="form-control" name="classMission" id="classMission">
                                    <option selected value="">Selecione</option>
                                    <option value="CL I">I</option>
                                    <option value="CL II">II</option>
                                    <option value="CL III">III</option>
                                    <option value="CL IV">IV</option>
                                    <option value="CL V (A)">V (A)</option>
                                    <option value="CL V (M)">V (M)</option>
                                    <option value="CL VI">VI</option>
                                    <option value="CL VII">VII</option>
                                    <option value="CL VIII">VIII</option>
                                    <option value="CL IX">IX</option>
                                    <option value="CL X">X</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="vtrMission">Viatura<span style="color:red">*</span></label>
                                <select class="form-control" name="vtrMission" id="vtrMission">
                                    <option selected value="">Selecione</option>
                                    @foreach ($viaturas as $viatura)
                                        <option value="{{ $viatura->id }}">{{ $viatura->mod_vtr }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="docMission">Documento <span style="color:red">*</span> </label>
                                <input id="docMission" name="docMission" type="text" class="form-control"
                                    placeholder="documento que deu ordem para a realizar a missão.">
                            </div>
                            <div class="form-group colmd-3">
                                <label for="originMission">Origem <span style="color:red">*</span></label>
                                <input id="originMission" name="originMission" type="text" class="form-control"
                                    placeholder="De onde parte a missão.">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="pgMotMission">Posto/Grad <span style="color:red">*</span></label>
                                <select class="form-control" name="pgMotMission" id="pgMotMission">
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
                                <label for="nameMotMission">Nome do motorista <span style="color:red">*</span></label>
                                <input id="nameMotMission" name="nameMotMission" typphp e="text"
                                    class="form-control" placeholder="Nome do motorista">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="pgSegMission">Posto/Grad <span style="color:red">*</span></label>
                                <select class="form-control" name="pgSegMission" id="pgSegMission">
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
                                <label for="nameSegMission">Nome do cmt da missão <span style="color:red">*</span></label>
                                <input id="nameSegMission" name="nameSegMission" type="text" class="form-control"
                                    placeholder="Nome do cmt da missão">
                            </div>

                        </div>
                        <div class="row">

                            <div class="form-group col">
                                <label>Prev. do dia e horário da partida</label>
                                <div class="input-group date" id="prev_part" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#prev_part" id="datePrevPartMission" name="datePrevPartMission"
                                        value="">
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
                                        data-target="#prev_chgd" id="datePrevChgdMission" name="datePrevChgdMission"
                                        value="">
                                    <div class="input-group-append" data-target="#prev_chgd"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="contactCmtMission">Telefone de contato <span style="color:red">*</span>
                                </label>
                                <input id="contactCmtMission" name="contactCmtMission" type="text"
                                    class="form-control" placeholder="Ex: (51) 980514188">
                            </div>
                            {{-- <span class="form-group  fs-12">(Inserir o
                                telefone celular do Cmt da Missão (COM DDD), visando contato de coordenação)</span> --}}
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="obsMission">Observações</label>
                                <textarea name="obsMission" id="obsMission" rows="8"
                                    placeholder="Detalhes importantes da missão. Exemplo: Para Eixo Sul PGT" class="text form-control"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-success" onclick="return registerMission()">Cadastrar</button>
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
    <script src="{{ asset('js/inputmask.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            $('.text').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font'],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table'],
                ]
            });
        });
    </script>
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

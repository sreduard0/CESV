@extends('layout')
@section('title')
    @switch(session('CESV')['profileType'])
        @case(1)
            Transporte
        @break

        @case(5)
            Missões
        @break

        @case(3)
            Missões do OP
        @break

        @case(4)
            Missões do OM
        @break
    @endswitch
@endsection
@if (session('CESV')['profileType'] == 5)
    @section('mission', 'active')
@else
    @section('home', 'active')
@endif
@section('title-header')
    @switch(session('CESV')['profileType'])
        @case(1)
        @case(5)
            Controle de missões OM/OP
        @break

        @case(3)
            Controle de missões do OP
        @break

        @case(4)
            Controle de missões do OM
        @break
    @endswitch
@endsection
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('css')

    {{-- QR Code --}}
    <link rel="stylesheet" href="{{ asset('plugins/qr-scanner/style-qr-code.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    {{-- CRUD .JS --}}
    <script src="{{ asset('js/crud-missions.js') }}"></script>
    @switch(session('CESV')['profileType'])
        @case(1)
        @case(3)

        @case(4)
            <style>
                .w-1 {
                    width: 100px;
                    column-width: 20px;
                }
            </style>
        @break

        @case(5)
            <style>
                .w-1 {
                    width: 20px;
                }
            </style>
        @break
    @endswitch

@endsection

@section('content')
    <section class="col ">
        <div class="card">
            <div class="card-header">
                <div class="row d-flex justify-content-between">
                    <div class="col-md-5">
                        <div class="row ">
                            <div class="form-group col">
                                <label for="statusMission">Status</label>
                                <select id="statusMission" class="form-control">
                                    <option selected value="">TODAS</option>
                                    <option value="1">NA FILA</option>
                                    <option value="2">EM ANDAMENTO</option>
                                    <option value="3">ENCERRADA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    @if (session('CESV')['profileType'] == 3 || session('CESV')['profileType'] == 4)
                        <div class="d-flex justify-content-sm-end">
                            <div class="col">
                                <button class="btn btn-primary" data-toggle="modal"
                                    data-target="#register-mission">Cadastrar</button>
                            </div>
                        </div>
                    @endif
                </div>
                <div id="button-print"></div>
            </div>
            <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="30px">#</th>
                            <th>Missão</th>
                            <th width="30px">Tipo</th>
                            <th>Destino</th>
                            <th>Documento</th>
                            <th width="35px">Classe</th>
                            <th>Qtd. Vtrs</th>
                            <th>Prev. partida</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
@endsection
@section('modal')
    @if (session('CESV')['profileType'] == 3 || session('CESV')['profileType'] == 4)
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
                        <div class="col">
                            <div class="d-flex justify-content-sm-end">
                                <p class="f-s-13">(Campos com <span style="color:red">*</span>
                                    são obrigatórios)</p>
                            </div>
                        </div>
                        <form id="form-register-mission">
                            @if (session('CESV')['profileType'] == 3)
                                <input type="hidden" name="typeMission" id="typeMission" value="OP">
                            @else
                                <input type="hidden" name="typeMission" id="typeMission" value="OM">
                            @endif
                            <div class="row">
                                <div class="form-group col">
                                    <label for="nameMission">Missão <span style="color:red">*</span></label>
                                    <input minlength="2" maxlength="200" id="nameMission" name="nameMission" type="text"
                                        class="form-control" placeholder="Ex: Feno e Aveia">
                                </div>
                                <div class="form-group col">
                                    <label for="destinyMission">Destino <span style="color:red">*</span></label>
                                    <input minlength="2" maxlength="200" id="destinyMission" name="destinyMission"
                                        type="text" class="form-control" placeholder="Destino da missão (OM ou local).">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="classMission">Classe <span style="color:red">*</span></label>
                                    <select class="form-control" name="classMission" id="classMission">
                                        <option selected value="">Selecione</option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                        <option value="V-arm">V-arm</option>
                                        <option value="V-mun">V-mun</option>
                                        <option value="VI">VI</option>
                                        <option value="VII">VII</option>
                                        <option value="VIII">VIII</option>
                                        <option value="IX">IX</option>
                                        <option value="X">X</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col">
                                    <label for="docMission">Documento</label>
                                    <input minlength="2" maxlength="200" id="docMission" name="docMission"
                                        type="text" class="form-control"
                                        placeholder="documento que deu ordem para a realizar a missão.">
                                </div>

                            </div>

                            <div class="row">

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
                                    <label for="nameSegMission">Nome do cmt da missão <span
                                            style="color:red">*</span></label>
                                    <input minlength="2" maxlength="200" id="nameSegMission" name="nameSegMission"
                                        type="text" class="form-control" placeholder="Nome do cmt da missão">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="contactCmtMission">Telefone de contato <span
                                            style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="contactCmtMission"
                                            name="contactCmtMission" data-inputmask="'mask':'(99) 9 9999-9999'"
                                            data-mask="" inputmode="text" placeholder="EX: (51) 9 8020-4426">
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="originMission">Origem <span style="color:red">*</span></label>
                                    <input minlength="2" maxlength="200" id="originMission" name="originMission"
                                        type="text" class="form-control" placeholder="De onde parte a missão.">
                                </div>
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
                        <button type="button" class="btn btn-success"
                            onclick="return registerMission()">Cadastrar</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- MODAL EDITAR MISSÃO --}}
        <div class="modal fade" id="edit-mission" tabindex="-1" role="dialog" aria-labelledby="edit-missionLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit-missionLabel">Editar missão</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-edit-mission">
                            <input type="hidden" id="idMission" name="idMission">
                            @if (session('CESV')['profileType'] == 3)
                                <input type="hidden" name="e_typeMission" id="e_typeMission" value="OP">
                            @else
                                <input type="hidden" name="e_typeMission" id="e_typeMission" value="OM">
                            @endif
                            <div class="row">
                                <div class="form-group col">
                                    <label for="e_nameMission">Missão <span style="color:red">*</span></label>
                                    <input minlength="2" maxlength="200" id="e_nameMission" name="e_nameMission"
                                        type="text" class="form-control" placeholder="Ex: Feno e Aveia">
                                </div>
                                <div class="form-group col">
                                    <label for="e_destinyMission">Destino <span style="color:red">*</span></label>
                                    <input minlength="2" maxlength="200" id="e_destinyMission" name="e_destinyMission"
                                        type="text" class="form-control"
                                        placeholder="Destino da missão (OM ou local).">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="e_classMission">Classe <span style="color:red">*</span></label>
                                    <select class="form-control" name="e_classMission" id="e_classMission">
                                        <option selected value="">Selecione</option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                        <option value="V-arm">V-arm</option>
                                        <option value="V-mun">V-mun</option>
                                        <option value="VI">VI</option>
                                        <option value="VII">VII</option>
                                        <option value="VIII">VIII</option>
                                        <option value="IX">IX</option>
                                        <option value="X">X</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="e_docMission">Documento</label>
                                    <input minlength="2" maxlength="200" id="e_docMission" name="e_docMission"
                                        type="text" class="form-control"
                                        placeholder="documento que deu ordem para a realizar a missão.">
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="e_pgSegMission">Posto/Grad <span style="color:red">*</span></label>
                                    <select class="form-control" name="e_pgSegMission" id="e_pgSegMission">
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
                                    <label for="e_nameSegMission">Nome do cmt da missão <span
                                            style="color:red">*</span></label>
                                    <input minlength="2" maxlength="200" id="e_nameSegMission" name="e_nameSegMission"
                                        type="text" class="form-control" placeholder="Nome do cmt da missão">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="e_contactCmtMission">Telefone de contato <span
                                            style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="e_contactCmtMission"
                                            name="e_contactCmtMission" data-inputmask="'mask':'(99) 9 9999-9999'"
                                            data-mask="" inputmode="text" placeholder="EX: (51) 9 8020-4426">
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group colmd-3">
                                    <label for="e_originMission">Origem <span style="color:red">*</span></label>
                                    <input minlength="2" maxlength="200" id="e_originMission" name="e_originMission"
                                        type="text" class="form-control" placeholder="De onde parte a missão.">
                                </div>
                                <div class="form-group col">

                                    <label>Prev. do dia e horário da partida</label>
                                    <div class="input-group date" id="e_prev_part" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input"
                                            data-target="#e_prev_part" id="e_datePrevPartMission"
                                            name="e_datePrevPartMission" value="">
                                        <div class="input-group-append" data-target="#e_prev_part"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label>Prev. do dia e horário da chegada</label>
                                    <div class="input-group date" id="e_prev_chgd" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input"
                                            data-target="#e_prev_chgd" id="e_datePrevChgdMission"
                                            name="e_datePrevChgdMission" value="">
                                        <div class="input-group-append" data-target="#e_prev_chgd"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="e_obsMission">Observações</label>
                                    <textarea name="e_obsMission" id="e_obsMission" rows="8"
                                        placeholder="Detalhes importantes da missão. Exemplo: Para Eixo Sul PGT" class="text form-control"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-success" onclick="return editMission()">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{--  INFORMÇOES DO REGISTRO DA MISSAO --}}
    @include('component.info-mission')


@endsection
@section('plugins')

    <script src="{{ asset('js/inputmask.js') }}"></script>

    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        document.getElementById('statusMission').addEventListener('change', event => {
            $('#table').DataTable().column(3).search(event.target.value).draw();
        });
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
        @if (session('CESV')['profileType'] == 3 || session('CESV')['profileType'] == 4)
            $('#edit-mission').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var modal = $(this);
                var url = "{{ url('info_mission') }}/" + id;
                $.get(url, function(result) {
                    //  Form edição
                    modal.find('#idMission').val(result.id)
                    modal.find('#e_nameMission').val(result.mission_name)
                    modal.find('#e_destinyMission').val(result.destiny)
                    modal.find('#e_classMission').val(result.class)
                    modal.find('#e_docMission').val(result.doc)
                    modal.find('#e_originMission').val(result.origin)
                    modal.find('#e_contactCmtMission').val(result.contact)
                    modal.find('#e_pgSegMission').val(result.pg_seg)
                    modal.find('#e_nameSegMission').val(result.name_seg)
                    modal.find('#e_datePrevPartMission').val(moment(result.prev_date_part).format(
                        'DD-MM-YYYY H:m'))
                    modal.find('#e_datePrevChgdMission').val(moment(result.prev_date_chgd).format(
                        'DD-MM-YYYY H:m'))
                    modal.find('#e_obsMission').summernote('code', result.obs)
                })
            });
        @endif
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
                    },
                    {
                        'className': 'w-1 text-center',
                        "targets": [9]
                    }
                ],
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
                        'exportOptions': {
                            'columns': [1, 2, 3, 4, 5, 6, 7, 8],
                            'title': 'Relatório de entrada e saída de veículos ',
                            'pgUser': "{{ session('user')['rank'] }}",
                            'nameUser': "{{ session('user')['professionalName'] }}",
                            'fullNameUser': "{{ session('user')['name'] }}",
                            'functionUser': "{{ session('CESV')['profileType'] }}",
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

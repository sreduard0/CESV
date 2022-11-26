@extends('layout')
@section('title')
    @switch(session('CESV')['profileType'])
        @case(1)
            Transporte
        @break

        @case(5)
        @case(4)
            Fichas
        @break
    @endswitch
@endsection
@section('ficha', 'active')
@section('title-header', 'Fichas')
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
    {{-- CRUD JS --}}
    <script src="{{ asset('js/crud-ficha.js') }}"></script>
    @switch(session('CESV')['profileType'])
        @case(1)
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
                                <label for="statusFicha">Filtrar por status</label>
                                <select id="statusFicha" name="statusFicha" class="form-control">
                                    <option value="">Selecione</option>
                                    <option value="3">Aguardando autorização</option>
                                    <option value="1">Abertas</option>
                                    <option value="2">Fechadas</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    @if (session('CESV')['profileType'] == 1)
                        <div class="d-flex justify-content-sm-end">
                            <div class="col">
                                <button class="btn btn-primary" data-toggle="modal"
                                    data-target="#register-ficha">Cadastrar</button>
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
                            <th width="30px">N°</th>
                            <th>Viatura</th>
                            <th>Missão</th>
                            <th>Por ordem </th>
                            <th>Motorista</th>
                            <th>Segurança</th>
                            <th>Natureza</th>
                            <th>Status</th>
                            <th style=" white-space: nowrap; width:auto;">Ações</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
@endsection
@section('modal')
    @if (session('CESV')['profileType'] == 1)
        <!-- MODAL CADASTRO FICHA-->
        <div class="modal fade" id="register-ficha" tabindex="-1" role="dialog" aria-labelledby="register-fichaLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="register-fichaLabel">Cadastrar ficha</h5>
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
                        <form id="form-register-ficha">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="nrFicha">Nº ficha<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-list"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="nrFicha" name="nrFicha"
                                            data-inputmask="'mask':'9999'" data-mask="" inputmode="text"
                                            placeholder="EX: 1515">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="vtrFicha">Viatura<span style="color:red">*</span></label>
                                    <select class="form-control" name="vtrFicha" id="vtrFicha">
                                        <option selected value="">Selecione</option>
                                        @foreach ($viaturas as $viatura)
                                            <option value="{{ $viatura->id }}">{{ $viatura->nr_vtr }} |
                                                {{ $viatura->mod_vtr }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="missionFicha">Missão<span style="color:red">*</span></label>
                                    <select class="form-control" name="missionFicha" id="missionFicha">
                                        <option selected value="0">Missão interna</option>
                                        @foreach ($missions as $mission)
                                            <option value="{{ $mission->id }}">{{ $mission->type_mission }} |
                                                {{ $mission->mission_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="inOrderFicha">Por ordem<span style="color:red">*</span></label>
                                    <select class="form-control" name="inOrderFicha" id="inOrderFicha">
                                        <option value="">Selecione</option>
                                        <option value="Fisc Adm">Fisc Adm</option>
                                        <option value="COST">COST</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label for="idMotFicha">Motorista <span style="color:red">*</span></label>
                                    <select class="form-control" name="idMotFicha" id="idMotFicha">
                                        <option value="">Selecione</option>
                                        @foreach ($motoristas as $motorista)
                                            <option value="{{ $motorista->id }}">
                                                {{ $motorista->pg . ' ' . $motorista->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="pgSegFicha">Posto/Grad</label>
                                    <select class="form-control" name="pgSegFicha" id="pgSegFicha">
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
                                    <label for="nameSegFicha">Nome do segurança</label>
                                    <input minlength="2" maxlength="200" id="nameSegFicha" name="nameSegFicha"
                                        type="text" class="form-control" placeholder="Nome do segurança">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col">
                                    <label for="natOfServFicha">Natureza do serviço</label>
                                    <input minlength="2" maxlength="200" id="natOfServFicha" name="natOfServFicha"
                                        type="text" class="form-control" placeholder="Ex: Transporte de pessoal">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-success"
                            onclick="return registerFicha()">Cadastrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL EDITAR FICHA-->
        <div class="modal fade" id="edit-ficha" tabindex="-1" role="dialog" aria-labelledby="edit-fichaLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit-fichaLabel">Cadastrar ficha</h5>
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
                        <form id="form-edit-ficha">
                            <input type="hidden" name="id_ficha" id="id_ficha">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="e_nrFicha">Nº<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-list"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="e_nrFicha" name="e_nrFicha"
                                            data-inputmask="'mask':'9999'" data-mask="" inputmode="text"
                                            placeholder="EX: 1515">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="e_vtrFicha">Viatura<span style="color:red">*</span></label>
                                    <select class="form-control" name="e_vtrFicha" id="e_vtrFicha">
                                        <option selected value="">Selecione</option>
                                        @foreach ($viaturas as $viatura)
                                            <option value="{{ $viatura->id }}">{{ $viatura->nr_vtr }} |
                                                {{ $viatura->mod_vtr }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="e_missionFicha">Missão<span style="color:red">*</span></label>
                                    <select class="form-control" name="e_missionFicha" id="e_missionFicha">
                                        <option selected value="">Selecione</option>
                                        <option value="0">Serviço / Guarnição</option>
                                        @foreach ($missions as $mission)
                                            <option value="{{ $mission->id }}">{{ $mission->type_mission }} |
                                                {{ $mission->mission_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="e_inOrderFicha">Por ordem<span style="color:red">*</span></label>
                                    <select class="form-control" name="e_inOrderFicha" id="e_inOrderFicha">
                                        <option value="">Selecione</option>
                                        <option value="Fisc Adm">Fisc Adm</option>
                                        <option value="COST">COST</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="e_idMotFicha">Motorista <span style="color:red">*</span></label>
                                    <select class="form-control" name="e_idMotFicha" id="e_idMotFicha">
                                        <option value="">Selecione</option>
                                        @foreach ($motoristas as $motorista)
                                            <option value="{{ $motorista->id }}">
                                                {{ $motorista->pg . ' ' . $motorista->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="e_pgSegFicha">Posto/Grad</label>
                                    <select class="form-control" name="e_pgSegFicha" id="e_pgSegFicha">
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
                                    <label for="e_nameSegFicha">Nome do segurança</label>
                                    <input minlength="2" maxlength="200" id="e_nameSegFicha" name="e_nameSegFicha"
                                        type="text" class="form-control" placeholder="Nome do segurança">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col">
                                    <label for="e_natOfServFicha">Natureza do serviço</label>
                                    <input minlength="2" maxlength="200" id="e_natOfServFicha" name="e_natOfServFicha"
                                        type="text" class="form-control" placeholder="Ex: Transporte de pessoal">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-success" onclick="return editFicha()">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- MODAL INFORMAÇÕES DA VTR -->
    @include('component.info-vtr')
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
    <script src="{{ asset('js/inputmask.js') }}"></script>

    <script>
        document.getElementById('statusFicha').addEventListener('change', event => {
            $('#table').DataTable().column(3).search(event.target.value).draw();
        });
        $(function() {
            $("#table").DataTable({
                "paging": true,
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "aoColumnDefs": [{
                    'className': 'w-1 text-center',
                    'aTargets': [8]
                }],
                "language": {
                    "url": "{{ asset('plugins/datatables/Portuguese2.json') }}"
                },
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ url('post_fichas_list') }}",
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
                        'messageBottom': 'Seção de Transporte',
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
        @if (session('CESV')['profileType'] == 1)
            $('#edit-ficha').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var modal = $(this);
                var url = "{{ url('get_info_ficha') }}/" + id;
                $.get(url, function(result) {
                    modal.find('#id_ficha').val(result.id)
                    modal.find('#e_nrFicha').val(result.nr_ficha)
                    modal.find('#e_vtrFicha').val(result.id_vtr)
                    modal.find('#e_missionFicha').val(result.id_mission)
                    modal.find('#e_inOrderFicha').val(result.in_order)
                    modal.find('#e_idMotFicha').val(result.id_mot)
                    modal.find('#e_pgSegFicha').val(result.pg_seg)
                    modal.find('#e_nameSegFicha').val(result.name_seg)
                    modal.find('#e_natOfServFicha').val(result.nat_of_serv)

                })
            });
            $('#edit-ficha').on('hide.bs.modal', function(event) {
                $('#form-edit-ficha')[0].reset();
            });
        @endif
    </script>

@endsection

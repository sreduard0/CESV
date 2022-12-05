@extends('layout')
@section('title')
    @switch(session('CESV')['profileType'])
        @case(1)
            Transporte
        @break

        @case(5)
            Viaturas
        @break
    @endswitch
@endsection
@section('vtr', 'active')
@section('title-header', 'Viaturas')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    {{-- QR Code --}}
    <link rel="stylesheet" href="{{ asset('plugins/qr-scanner/style-qr-code.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    {{-- CRUD JS --}}
    <script src="{{ asset('js/crud-vtr.js') }}"></script>
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
                                <label for="vtrStatus">Filtrar por status</label>
                                <select id="vtrStatus" class="form-control">
                                    <option selected value="">Todas</option>
                                    <option value="1">Disponível</option>
                                    <option value="3">Disp. c/ restrição</option>
                                    <option value="2">Indisponível</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    @if (session('CESV')['profileType'] == 1)
                        <div class="d-flex justify-content-sm-end">
                            <div class="col">
                                <button class="btn btn-primary" data-toggle="modal"
                                    data-target="#register-vtr">Cadastrar</button>
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
                            <th width="30px">Nr</th>
                            <th>Modelo da viatura</th>
                            <th>EB/ Placa</th>
                            <th width="100px">Capacidade</th>
                            <th>M <sup>3</sup></th>
                            <th>Status</th>
                            <th width="100px">Ações</th>
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
        <!-- MODAL CADASTRO VTR-->
        <div class="modal fade" id="register-vtr" tabindex="-1" role="dialog" aria-labelledby="register-vtrLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="register-vtrLabel">Cadastrar viatura</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-register-vtr">
                            <div class="row">
                                <div class="form-group col">
                                    <label for="nrVtr">Nº<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-car"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="nrVtr" name="nrVtr"
                                            data-inputmask="'mask':'999'" data-mask="" inputmode="text"
                                            placeholder="EX: 5">
                                    </div>

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="typeVtr">Tipo<span style="color:red">*</span></label>
                                    <select class="form-control" name="typeVtr" id="typeVtr">
                                        <option value="">Selecione</option>
                                        <option value="adm">Administrativa</option>
                                        <option value="op">Operacional</option>
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="modVtr">Modelo<span style="color:red">*</span></label>
                                    <input maxlength="255" id="modVtr" name="modVtr" type="text" class="form-control"
                                        placeholder="Ex: VTE CAVALO MECÂNICO MERCEDES BENZ AXOR 2644 ">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="ebPlacaVtr">EB/Placa <span style="color:red">*</span></label>
                                    <input maxlength="20" id="ebPlacaVtr" name="ebPlacaVtr" type="text"
                                        class="form-control" placeholder="Ex: 252627662 ">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="tonVtr">Toneladas<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><strong>Ton</strong></span>
                                        </div>
                                        <input type="text" class="form-control" id="tonVtr" name="tonVtr"
                                            data-inputmask="'mask':'999'" data-mask="" inputmode="text"
                                            placeholder="EX: 5">
                                    </div>

                                </div>
                                <div class="form-group col">
                                    <label for="volVtr">M<sup>3</sup> <span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><strong>M<sup>3</sup></strong></span>
                                        </div>
                                        <input type="text" class="form-control" id="volVtr" name="volVtr"
                                            data-inputmask="'mask':'999'" data-mask="" inputmode="text"
                                            placeholder="EX: 5">
                                    </div>

                                </div>
                                <div class="form-group colmd-3">
                                    <label for="statusVtr">Status <span style="color:red">*</span></label>
                                    <select class="form-control" name="statusVtr" id="statusVtr">
                                        <option value="">Selecione</option>
                                        <option value="1">Disponível</option>
                                        <option value="3">Disp. c/ restrição</option>
                                        <option value="2">Indisponível</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="obsVtr">Observações</label><br><span class="fs-12">Detalhes importantes
                                        sobre a
                                        viatura, como falta de peças, etc.</span>
                                    <textarea class="text" name="obsVtr" id="obsVtr" rows="8" class="form-control"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-success" onclick="return registerVtr()">Cadastrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL EDITAR VTR-->
        <div class="modal fade" id="edit-vtr" tabindex="-1" role="dialog" aria-labelledby="edit-vtrLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit-vtrLabel">Editar viatura</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-edit-vtr">
                            <input type="hidden" id="id_vtr" name="id_vtr">
                            <div class="row">
                                <div class="form-group col">
                                    <label for="e_nrVtr">Nº<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-car"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="e_nrVtr" name="e_nrVtr"
                                            data-inputmask="'mask':'999'" data-mask="" inputmode="text"
                                            placeholder="EX: 5">
                                    </div>

                                </div>
                                <div class="form-group col">
                                    <label for="e_typeVtr">Tipo<span style="color:red">*</span></label>
                                    <select class="form-control" name="e_typeVtr" id="e_typeVtr">
                                        <option value="">Selecione</option>
                                        <option value="adm">Administrativa</option>
                                        <option value="op">Operacional</option>
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="e_modVtr">Modelo<span style="color:red">*</span></label>
                                    <input maxlength="255" id="e_modVtr" name="e_modVtr" type="text"
                                        class="form-control"
                                        placeholder="Ex: VTE CAVALO MECÂNICO MERCEDES BENZ AXOR 2644 ">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="e_ebPlacaVtr">EB/Placa <span style="color:red">*</span></label>
                                    <input maxlength="20" id="e_ebPlacaVtr" name="e_ebPlacaVtr" type="text"
                                        class="form-control" placeholder="Ex: 252627662 ">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="e_tonVtr">Toneladas<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><strong>Ton</strong></span>
                                        </div>
                                        <input type="text" class="form-control" id="e_tonVtr" name="e_tonVtr"
                                            data-inputmask="'mask':'999'" data-mask="" inputmode="text"
                                            placeholder="EX: 5">
                                    </div>

                                </div>
                                <div class="form-group col">
                                    <label for="e_volVtr">M<sup>3</sup> <span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><strong>M<sup>3</sup></strong></span>
                                        </div>
                                        <input type="text" class="form-control" id="e_volVtr" name="e_volVtr"
                                            data-inputmask="'mask':'999'" data-mask="" inputmode="text"
                                            placeholder="EX: 5">
                                    </div>

                                </div>
                                <div class="form-group colmd-3">
                                    <label for="e_statusVtr">Status <span style="color:red">*</span></label>
                                    <select class="form-control" name="e_statusVtr" id="e_statusVtr">
                                        <option value="">Selecione</option>
                                        <option value="1">Disponível</option>
                                        <option value="2">Indisponível</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="e_obsVtr">Observações</label><br><span class="fs-12">Detalhes importantes
                                        sobre a
                                        viatura, como falta de peças, etc.</span>
                                    <textarea class="text" name="e_obsVtr" id="e_obsVtr" rows="8" class="form-control"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-success" onclick="return editVtr()">Salvar</button>
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

    <script src="{{ asset('js/inputmask.js') }}"></script>
    <script>
        document.getElementById('vtrStatus').addEventListener('change', event => {
            $('#table').DataTable().column(3).search(event.target.value).draw();
        });

        $(function() {
            $("#table").DataTable({
                "paging": true,
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "language": {
                    "url": "{{ asset('plugins/datatables/Portuguese2.json') }}"
                },
                "aoColumnDefs": [{
                    'className': 'text-center',
                    'aTargets': [6]
                }],
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('listVtr') }}",
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
                            'columns': [0, 1, 2, 3, 4, 5],
                            'title': 'Relatório de viaturas',
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
        @if (session('CESV')['profileType'] == 1)
            $('#edit-vtr').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var modal = $(this);
                var url = "{{ url('get_info_vtr') }}/" + id;
                $.get(url, function(result) {
                    modal.find('#id_vtr').val(result.id)
                    modal.find('#e_nrVtr').val(result.nr_vtr)
                    modal.find('#e_typeVtr').val(result.type_vtr)
                    modal.find('#e_modVtr').val(result.mod_vtr)
                    modal.find('#e_ebPlacaVtr').val(result.ebplaca)
                    modal.find('#e_tonVtr').val(result.ton)
                    modal.find('#e_volVtr').val(result.vol)
                    modal.find('#e_statusVtr').val(result.status)
                    modal.find('#e_obsVtr').summernote('code', result.obs)
                })
            });
            $('#edit-vtr').on('hide.bs.modal', function(event) {
                $('#form-edit-vtr')[0].reset();
                $('#e_obsVtr').summernote('code', '');
            });
        @endif
    </script>

@endsection

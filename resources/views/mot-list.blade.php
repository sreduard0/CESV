@extends('layout')
@section('title','Motoristas')
@section('mot', 'active')
@section('title-header', 'Motoristas')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">

    {{-- QR Code --}}
    <link rel="stylesheet" href="{{ asset('plugins/qr-scanner/style-qr-code.css') }}">
    {{-- CRUD JS --}}
    <script src="{{ asset('js/crud-mot.js') }}"></script>
    <style>
        .w-1 {
            width: 100px;
            column-width: 100px;
        }
    </style>
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
                                <label for="catMotFilter">Categoria</label>
                                <select class="form-control" name="catMotFilter" id="catMotFilter">
                                    <option value="">Todas</option>
                                    <option value="A">A</option>
                                    <option value="AB">AB</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    @if (session('CESV')['profileType'] == 1 || session('CESV')['profileType'] == 6)
                        <div class="d-flex justify-content-sm-end">
                            <div class="col">
                                <button class="btn btn-primary" data-toggle="modal"
                                    data-target="#register-drive">Cadastrar</button>
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
                            <th width="30px">P/ G</th>
                            <th>Nome de guerra</th>
                            <th>Nome completo</th>
                            <th width="80px">CNH</th>
                            <th width="20px">Cat</th>
                            <th width="70">Val. CNH</th>
                            <th width="80">Idt Mil</th>
                            <th width="150px">Contato</th>
                            @if (session('CESV')['profileType'] == 1 || session('CESV')['profileType'] == 6)
                                <th>Ações</th>
                            @elseif (session('CESV')['profileType'] == 5)
                                <th width="30px">Ver</th>
                            @endif

                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
    @include('component.mot-profile')
@endsection

@if (session('CESV')['profileType'] == 1 || session('CESV')['profileType'] == 6)
    @section('modal')
        <!-- MODAL CADASTRO MOTORA-->
        <div class="modal fade" id="register-drive" tabindex="-1" role="dialog" aria-labelledby="register-driveLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="register-driveLabel">Cadastrar motorista</h5>
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
                        <form id="form-register-drive">
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="pgMot">Posto/Grad <span style="color:red">*</span></label>
                                    <select class="form-control" name="pgMot" id="pgMot">
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
                                    <label for="nameMot">Nome de guerra<span style="color:red">*</span></label>
                                    <input minlength="2" maxlength="200" id="nameMot" name="nameMot" type="text"
                                        class="form-control" placeholder="Nome de guerra">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="catMot">Categoria <span style="color:red">*</span></label>
                                    <select class="form-control" name="catMot" id="catMot">
                                        <option value="">Selecione</option>
                                        <option value="A">A</option>
                                        <option value="AB">AB</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="fullNameMot">Nome completo<span style="color:red">*</span></label>
                                    <input minlength="2" maxlength="200" id="fullNameMot" name="fullNameMot"
                                        type="text" class="form-control" placeholder="Nome completo">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="contactMot">Telefone de contato <span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="contactMot" name="contactMot"
                                            data-inputmask="'mask':'(99) 9 9999-9999'" data-mask="" inputmode="text"
                                            placeholder="EX: (51) 9 8020-4426">
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="cnhMot">Nº registro CNH <span style="color:red">*</span></label>
                                    <input minlength="2" maxlength="11" id="cnhMot" name="cnhMot" type="text"
                                        class="form-control" placeholder="Nº CNH">
                                </div>
                                <div class="form-group col">
                                    <label>Validade da CNH<span style="color:red">*</span></label>
                                    <div class="input-group datet" id="ValCnhMotTarget" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input"
                                            data-target="#ValCnhMotTarget" id="ValCnhMot" name="ValCnhMot"
                                            value="">
                                        <div class="input-group-append" data-target="#ValCnhMotTarget"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="idtMot">Idt militar <span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="idtMot" name="idtMot"
                                            data-inputmask="'mask':'999.999.999-9'" data-mask="" inputmode="text"
                                            placeholder="___.___.___-_">
                                    </div>

                                </div>
                            </div>
                            <label for="esp">Especialização</label>
                            <div id="esp">
                                <div class="custom-control custom-checkbox m-l-20">
                                    <input class=" custom-control-input" type="checkbox" id="mopp" name="mopp"
                                        value="1">
                                    <label for="mopp" class="custom-control-label">MOPP</label>
                                </div>
                                <div class="custom-control custom-checkbox m-l-20">
                                    <input class=" custom-control-input" type="checkbox" id="tc" name="tc"
                                        value="1">
                                    <label for="tc" class="custom-control-label">Transporte Coletivo</label>
                                </div>
                                <div class="custom-control custom-checkbox m-l-20">
                                    <input class=" custom-control-input" type="checkbox" id="cve" name="cve"
                                        value="1">
                                    <label for="cve" class="custom-control-label">Condutor de Veículo de
                                        Emergência</label>
                                </div>
                                <div class="custom-control custom-checkbox m-l-20">
                                    <input class=" custom-control-input" type="checkbox" id="ci" name="ci"
                                        value="1">
                                    <label for="ci" class="custom-control-label">Cargas Indivisíveis</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-success" onclick="return registerMot()">Cadastrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL EDITAR MOTORA-->
        <div class="modal fade" id="edit-drive" tabindex="-1" role="dialog" aria-labelledby="edit-driveLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit-driveLabel">Editar informações do motorista</h5>
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
                        <form id="form-edit-drive">
                            <input type="hidden" name="e_idMot" id="e_idMot">
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="e_pgMot">Posto/Grad <span style="color:red">*</span></label>
                                    <select class="form-control" name="e_pgMot" id="e_pgMot">
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
                                    <label for="e_nameMot">Nome de guerra<span style="color:red">*</span></label>
                                    <input minlength="2" maxlength="200" id="e_nameMot" name="e_nameMot"
                                        type="text" class="form-control" placeholder="Nome de guerra">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="e_catMot">Categoria <span style="color:red">*</span></label>
                                    <select class="form-control" name="e_catMot" id="e_catMot">
                                        <option value="">Selecione</option>
                                        <option value="A">A</option>
                                        <option value="AB">AB</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="e_fullNameMot">Nome completo<span style="color:red">*</span></label>
                                    <input minlength="2" maxlength="200" id="e_fullNameMot" name="e_fullNameMot"
                                        type="text" class="form-control" placeholder="Nome completo">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="e_contactMot">Telefone de contato <span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="e_contactMot" name="e_contactMot"
                                            data-inputmask="'mask':'(99) 9 9999-9999'" data-mask="" inputmode="text"
                                            placeholder="EX: (51) 9 8020-4426">
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="e_cnhMot">Nº registro CNH <span style="color:red">*</span></label>
                                    <input minlength="2" maxlength="11" id="e_cnhMot" name="e_cnhMot" type="text"
                                        class="form-control" placeholder="Nº CNH">
                                </div>
                                <div class="form-group col">
                                    <label>Validade da CNH<span style="color:red">*</span></label>
                                    <div class="input-group datet" id="eValCnhMotTarget" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input"
                                            data-target="#eValCnhMotTarget" id="e_ValCnhMot" name="e_ValCnhMot"
                                            value="">
                                        <div class="input-group-append" data-target="#eValCnhMotTarget"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="e_idtMot">Idt militar <span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="e_idtMot" name="e_idtMot"
                                            data-inputmask="'mask':'999.999.999-9'" data-mask="" inputmode="text"
                                            placeholder="___.___.___-_">
                                    </div>

                                </div>
                            </div>
                            <label for="e_esp">Especialização</label>
                            <div id="e_esp">
                                <div class="custom-control custom-checkbox m-l-20">
                                    <input class=" custom-control-input" type="checkbox" id="e_mopp" name="e_mopp"
                                        value="1">
                                    <label for="e_mopp" class="custom-control-label">MOPP</label>
                                </div>
                                <div class="custom-control custom-checkbox m-l-20">
                                    <input class=" custom-control-input" type="checkbox" id="e_tc" name="e_tc"
                                        value="1">
                                    <label for="e_tc" class="custom-control-label">Transporte Coletivo</label>
                                </div>
                                <div class="custom-control custom-checkbox m-l-20">
                                    <input class=" custom-control-input" type="checkbox" id="e_cve" name="e_cve"
                                        value="1">
                                    <label for="e_cve" class="custom-control-label">Condutor de Veículo de
                                        Emergência</label>
                                </div>
                                <div class="custom-control custom-checkbox m-l-20">
                                    <input class=" custom-control-input" type="checkbox" id="e_ci" name="e_ci"
                                        value="1">
                                    <label for="e_ci" class="custom-control-label">Cargas Indivisíveis</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-success" onclick="return editMot()">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif

@section('plugins')
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

    <script src="{{ asset('js/inputmask.js') }}"></script>

    <script>
        document.getElementById('catMotFilter').addEventListener('change', event => {
            $('#table').DataTable().column(3).search(event.target.value).draw();
        });
        $(function() {
            $("#table").DataTable({
                "paging": true,
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                @if (session('CESV')['profileType'] == 1 || session('CESV')['profileType'] == 6)
                    "aoColumnDefs": [{
                        'className': 'w-1 text-center',
                        'aTargets': [8]
                    }],
                @endif
                "language": {
                    "url": "{{ asset('plugins/datatables/Portuguese2.json') }}"
                },
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ url('post_mot_list') }}",
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
                            'columns': [0, 1, 2, 3, 4, 5, 6],
                            'title': 'Motoristas registrados',
                            'pgUser': "{{ session('user')['rank'] }}",
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
        @if (session('CESV')['profileType'] == 1 || session('CESV')['profileType'] == 6)
            $('#edit-drive').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var modal = $(this);
                var url = "{{ url('get_info_mot') }}/" + id;
                $.get(url, function(result) {
                    modal.find('#e_idMot').val(result.id)
                    modal.find('#e_pgMot').val(result.pg)
                    modal.find('#e_nameMot').val(result.name)
                    modal.find('#e_catMot').val(result.cat)
                    modal.find('#e_fullNameMot').val(result.full_name)
                    modal.find('#e_contactMot').val(result.contact)
                    modal.find('#e_cnhMot').val(result.cnh)
                    modal.find('#e_ValCnhMot').val(moment(result.val_cnh).format('DD-MM-YYYY'))
                    modal.find('#e_idtMot').val(result.idt_mil)
                    if (result.mopp == 1) {
                        modal.find('#e_mopp').attr('checked', true)
                    }
                    if (result.tc == 1) {
                        modal.find('#e_tc').attr('checked', true)
                    }
                    if (result.cve == 1) {
                        modal.find('#e_cve').attr('checked', true)
                    }
                    if (result.ci == 1) {
                        modal.find('#e_ci').attr('checked', true)

                    }
                })
            });
            $('#edit-drive').on('hide.bs.modal', function(event) {
                $('#form-edit-drive')[0].reset();
            });
        @endif
    </script>

@endsection

@extends('layout')
@section('title', 'Transporte')
@section('mot', 'active')
@section('title-header', 'Motoristas')
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
    <script src="{{ asset('js/crud-mot.js') }}"></script>
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


                    <div class="d-flex justify-content-sm-end">
                        <div class="col">
                            <button class="btn btn-primary" data-toggle="modal"
                                data-target="#register-drive">Cadastrar</button>
                        </div>
                    </div>
                </div>
                <div id="button-print"></div>
            </div>
            <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th width="150px">CNH</th>
                            <th width="40px">Cat</th>
                            <th width="150px">Val. CNH</th>
                            <th width="200px">Contato</th>
                            <th width="90px"><i class="fs-20 fa fa-info-circle"></i> info</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
@endsection
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
                                <label for="cnhMot">CNH <span style="color:red">*</span></label>
                                <input minlength="2" maxlength="200" id="cnhMot" name="cnhMot" type="text"
                                    class="form-control" placeholder="Nº CNH">
                            </div>
                            <div class="form-group col">
                                <label>Validade da CNH<span style="color:red">*</span></label>
                                <div class="input-group datet" id="ValCnhMotTarget" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#ValCnhMotTarget" id="ValCnhMot" name="ValCnhMot" value="">
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-success" onclick="return registerMot()">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>

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
        document.getElementById('catMotFilter').addEventListener('change', event => {
            $('#table').DataTable().column(3).search(event.target.value).draw();
        });
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
                modal.find('#e_pgMotFicha').val(result.pg_mot)
                modal.find('#e_nameMotFicha').val(result.name_mot)
                modal.find('#e_pgSegFicha').val(result.pg_seg)
                modal.find('#e_nameSegFicha').val(result.name_seg)
                modal.find('#e_natOfServFicha').val(result.nat_of_serv)

            })
        });
        $('#edit-ficha').on('hide.bs.modal', function(event) {
            $('#form-edit-ficha')[0].reset();
        });
    </script>

@endsection

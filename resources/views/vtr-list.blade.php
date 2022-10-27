@extends('layout')
@section('title', 'Transporte')
@section('home', 'active')
@section('title-header', 'Viaturas')
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
                <div class=" col d-flex justify-content-sm-end">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#register-vtr">Cadastrar</button>
                </div>
                <div id="button-print"></div>
            </div>
            <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="30px">Nr</th>
                            <th>Modelo Vtr</th>
                            <th>EB/Placa</th>
                            <th>Ton</th>
                            <th>M <sup>3</sup></th>
                            <th>Status</th>
                            <th style="width:85px"><i class="fs-20 fa fa-info-circle"></i> info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Marrua</td>
                            <td>EB3434535353</td>
                            <td>2</td>
                            <td>50</td>
                            <td>Disponível</td>
                            <td>
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#info-vtr"
                                    data-id='1'><i class="fa fa-car"></i></button>
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#register-vtr"
                                    data-id='1'><i class="fa fa-edit"></i></button>
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
                    <form id="form-vtr">
                        <div class="row">
                            <div class="form-group col">
                                <label for="name">Nr <span style="color:red">*</span></label>
                                <input id="name" name="name" typphp e="text" class="form-control"
                                    placeholder="Ex: 15">
                            </div>
                            <div class="form-group col">
                                <label for="name">Modelo vtr <span style="color:red">*</span></label>
                                <input id="name" name="name" type="text" class="form-control"
                                    placeholder="Ex: VTE CAVALO MECÂNICO MERCEDES BENZ AXOR 2644 ">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="pg">EB/Placa <span style="color:red">*</span></label>
                                <input id="name" name="name" type="text" class="form-control"
                                    placeholder="Ex: 252627662 ">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="pg">Toneladas<span style="color:red">*</span></label>
                                <input id="name" name="name" type="text" class="form-control"
                                    placeholder="Ex: 20">

                            </div>
                            <div class="form-group col">
                                <label for="name">M<sup>3</sup> <span style="color:red">*</span> </label>
                                <input id="name" name="name" type="text" class="form-control"
                                    placeholder="Ex: 102">
                            </div>
                            <div class="form-group colmd-3">
                                <label for="name">Status <span style="color:red">*</span></label>
                                <select class="form-control" name="rank_id" id="rank_id">
                                    <option value="">Selecione</option>
                                    <option value="Gen">Disponível</option>
                                    <option value="Cel">Indisponível</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="name">Observações</label>
                                <textarea name="" id="" rows="8"
                                    placeholder="Detalhes importantes sobre a viatura, como falta de peças, etc." class="form-control"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-success" onclick="">Salvar</button>
                </div>
            </div>
        </div>
    </div>

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
    <script src="{{ asset('js/actions.js') }}"></script>
    <script src="{{ asset('js/inputmask.js') }}"></script>

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




{{-- <form id="form-mission">
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
                    </form> --}}

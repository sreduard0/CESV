@extends('layout')
@section('title', 'Relatório')
@section('reports', 'active')
@section('title-header', 'Relatório de entrada e saída de viaturas na OM')
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
    <script src="{{ asset('js/crud-gda.js') }}"></script>
    <style>
        .dataTables_wrapper .dataTables_filter {
            float: right;
            text-align: right;
            visibility: hidden;
        }
    </style>
@endsection

@section('content')
    <section class="col">
        <div class="card">
            <div class="card-header">
                <div class="row d-flex justify-content-between">
                    <div class="col">
                        <div class="row ">
                            <div class="form-group col">
                                <label for="typevtr_filter">Tipo de veículo</label>
                                <select id="typevtr_filter" class="form-control">
                                    <option selected value="">TODOS</option>
                                    <option value="civil">CIVIL</option>
                                    <option value="oom">Outra OM</option>
                                    <option value="adm">3º B Sup | Administrativa</option>
                                    <option value="op">3º B Sup | Operacional</option>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="vtr_filter">Veiculo</label>
                                <select id="vtr_filter" class="form-control">
                                    <option selected value="">TODOS</option>
                                    @foreach ($viaturas as $viatura)
                                        <option value="{{ $viatura->ebplaca }}">
                                            {{ $viatura->nr_vtr . ' | ' . $viatura->mod_vtr }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="mot_filter">Motorista</label>
                                <select id="mot_filter" class="form-control">
                                    <option selected value="">TODOS</option>
                                    @foreach ($motoristas as $motorista)
                                        <option value="{{ $motorista->id }}">{{ $motorista->pg . ' ' . $motorista->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="om_filter">OM</label>
                                <input id="om_filter" type="text" class="form-control" maxlength="199"
                                    placeholder="EX: 3º B Sup">
                            </div>


                            <div class="form-group col-md-2">
                                <label>Data inicial</label>
                                <div class="input-group date" id="dateEntTarget" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#dateEntTarget" id="dateEnt_filter" value="">
                                    <div class="input-group-append" data-target="#dateEntTarget"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Data final</label>
                                <div class="input-group date" id="dateSaiTarget" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#dateSaiTarget" id="dateSai_filter" value="">
                                    <div class="input-group-append" data-target="#dateSaiTarget"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button onclick="filterReports()" style="height: 40px;" class="btn btn-success m-t-30"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>


                <div id="button-print"></div>



            </div>
            <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Modelo veículo</th>
                            <th>Motorista</th>
                            <th>Segurança</th>
                            <th>Hora - Entrada</th>
                            <th>Hora - Saída</th>
                            <th>OM</th>
                            <th>Missão/Destino</th>
                            <th style="width:2em">Ver</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
@endsection
@section('modal')
    {{--  INFORMÇOES DO REGISTRO DE ENTRADA E saída --}}
    @include('component.info-register')
    {{-- INFORMAçÔES DA FICHA --}}
    @include('component.info-ficha')
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
    <script src="{{ asset('js/reports-filter.js') }}"></script>
    <script>
        $(function() {
            $("#table").DataTable({
                "paging": true,
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [7]
                }],
                "language": {
                    "url": "{{ asset('plugins/datatables/Portuguese2.json') }}"
                },
                "processing": false,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('report_relgda_list') }}",
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
                        'messageTop': "{{ session('user')['rank'] . ' ' . session('user')['professionalName'] }} ",
                        'messageBottom': 'Seção de Transporte',
                        'exportOptions': {
                            'columns': [0, 1, 2, 3, 4, 5, 6, 7]
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

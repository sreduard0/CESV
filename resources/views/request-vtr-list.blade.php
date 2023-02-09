@extends('layout')
@section('title', 'Solicitações de viatura')
@section('vtrmenu', 'menu-is-opening menu-open')
@section('vtr', 'active')
@section('requestVtr', 'active')
@section('title-header', 'Solicitações de viatura')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('css')
    <script src="{{ asset('js/crud-req-vtr.js') }}"></script>
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
            <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="30px">Ord.</th>
                            <th width="80px">P/ G</th>
                            <th>Nome</th>
                            <th>Missão</th>
                            <th>Destino</th>
                            <th width="150px">Data de part.</th>
                            <th width="150px">Contato</th>
                            <th width="70px">Efetivo</th>
                            <th width="65px">Ações</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
@endsection
@section('plugins')
    <script>
        $(function() {
            $("#table").DataTable({
                "order": [
                    [0, 'asc']
                ],
                "paging": true,
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "aoColumnDefs": [{
                    'className': 'text-center',
                    'aTargets': [8]
                }, ],
                "language": {
                    "url": "{{ asset('plugins/datatables/Portuguese2.json') }}"
                },
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('listReqVtr') }}",
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
                            'columns': [0, 1, 2, 3, 4, 5, 7],
                            'title': 'Solicitações de viatura',
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

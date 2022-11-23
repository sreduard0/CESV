@extends('layout')
@section('title', 'Usuários')
@section('users', 'active')
@section('title-header', 'Gerenciamento de usuários')
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
            width: 50px;
            column-width: 20px;
        }
    </style>
@endsection
@section('content')
    <section class="col ">
        <div class="card">
            <div class="card-header">
                <div id="button-print"></div>
                <h3 class="card-title">Permissões de usuários</h3>

            </div>
            <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Usuário</th>
                            <th width="100px">Permissão</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
@endsection

@section('plugins')
    <!-- Select2 -->
    <script src="{{ asset('js/ger-users.js') }}"></script>
    <script src="{{ asset('js/inputmask.js') }}"></script>

    <script>
        $(function() {

            $("#table").DataTable({
                "order": [
                    [0, 'desc']
                ],
                "aoColumnDefs": [{
                    'className': 'w-1 text-center',
                    "targets": [2]
                }],
                "bInfo": false,
                "paging": true,
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "language": {
                    "url": "{{ asset('plugins/datatables/Portuguese2.json') }}"
                },
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "{{ url('post_users_list') }}",
                    "type": "POST",
                    "headers": {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                },
                "dom": '<"top">rt<"bottom"ip><"clear">',
            });

        });
    </script>

@endsection

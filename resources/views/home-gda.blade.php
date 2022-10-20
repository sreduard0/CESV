@extends('layout')
@section('title', 'Início')
@section('home', 'active')
@section('title-header', 'Controle de viaturas')
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
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <script src="{{ asset('js/hide-form.js') }}"></script>
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
        <div class="col">
            <h4 style="width:350px" class="border-bottom border-success">Veiculos dentro e fora da OM</h4>
        </div>
        <div class="row ">

            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3 id="ata">05 </h3>
                        <p class="bold">Outra OM</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-car"></i>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3 id="reintegrado">05</h3>
                        <p class=" bold">CIVIL</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-car"></i>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3 id="encostado">20</sup></h3>
                        <p class=" bold">ADMINISTRATIVA</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-car"></i>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 id="adido">02</h3>
                        <p class=" bold">OPERACIONAL</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-car"></i>
                    </div>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row d-flex justify-content-between">
                    <div class="col-md-5">
                        <div class="row ">
                            <div class="form-group col">
                                <label for="condition_filter">Viatura</label>
                                <select id="condition_filter" name="condition_filter" class="form-control">
                                    <option selected value="">TODAS AS VIATURAS</option>
                                    <option selected value="">CIVIL</option>
                                    <option selected value="">Outra OM</option>
                                    <option selected value="">ADMINISTRATIVA</option>
                                    <option selected value="">OPERACIONAL </option>
                                </select>
                            </div>
                            <button onclick="return search_condition()" style="height: 40px;"
                                class="btn btn-success m-t-30"><i class="fa fa-search"></i></button>
                        </div>
                    </div>


                    <div class="d-flex justify-content-sm-end">
                        <div class="col">
                            <button class="btn btn-success" data-toggle="modal"
                                data-target="#register-vtr">Adicionar</button>

                            <button id="qr-read" class="btn btn-success" data-toggle="modal" data-target="#qr-code">QR
                                Code</button>
                        </div>
                    </div>
                </div>


                <div id="button-print"></div>



            </div>
            <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="30px">Ficha</th>
                            <th>Modelo Vtr</th>
                            <th>Motorista</th>
                            <th>Segurança</th>
                            <th>Hora - Entrada</th>
                            <th>Odômetro - Entrada</th>
                            <th>Hora - Saída</th>
                            <th>Odômetro - Saída</th>
                            <th>OM</th>
                            <th>Missão/Destino</th>
                            <th width="85px">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1010</td>
                            <td>Maarua</td>
                            <td>Sd De Carvalho</td>
                            <td>Cb Rocha</td>
                            <td>{{ date('h:i') }}</td>
                            <td>123456789</td>
                            <td>12:40 30-10-2022</td>
                            <td>999999999</td>
                            <td>3bsup</td>
                            <td>Comer Quenga</td>
                            <td>
                                <button class="btn btn-primary"><i class="fa fa-user"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                        <tr>
                            <td>OOM</td>
                            <td>Maarua</td>
                            <td>Sd Bruno</td>
                            <td>Cb Jao</td>
                            <td>10:40 30-10-2022</td>
                            <td>123456789</td>
                            <td>12:40 30-10-2022</td>
                            <td>999999999</td>
                            <td>8blog</td>
                            <td>Comer Quenga</td>
                            <td>
                                <button class="btn btn-primary"><i class="fa fa-user"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                        <tr>
                            <td>1010</td>
                            <td>Maarua</td>
                            <td>Sd CUca</td>
                            <td>Cb Pinto</td>
                            <td>10:40 30-10-2022</td>
                            <td>123456789</td>
                            <td>12:40 30-10-2022</td>
                            <td>999999999</td>
                            <td>cms</td>
                            <td>Comer Quenga</td>
                            <td>
                                <button class="btn btn-primary"><i class="fa fa-user"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
    <!-- MODAL VTR -->
    <div class="modal fade" id="register-vtr" tabindex="-1" role="dialog" aria-labelledby="registerLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerLabel">Cadastrar viatura</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <span class="form-group col fs-20"><strong>Dados do veiculo:</strong></span>
                        <div class="m-r-15">(Campos com * são obrigatórios)</div>
                    </div>

                    <form id="vtr-register-form">
                        <div class="row">
                            <input type="hidden" id="image_profile" name="image_profile" value="">
                            <div class="form-group col-md-4">
                                <label for="condition_id">Tipo de veiculo</label>
                                <select onclick="selectedata(this.value)" id="condition_id" name="condition_id"
                                    class="form-control">
                                    <option selected>SELECIONE O TIPO DE VEICULO</option>
                                    <option value="1">CIVIL</option>
                                    <option value="2">Outra OM</option>
                                    <option value="3">ADMINISTRATIVA</option>
                                    <option value="4">OPERACIONAL</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-2 oom" style="display:none">
                                <label for="rank">P/G *</label>
                                <select id="rank" name="rank" class="form-control">

                                    <option selected disabled value="">Post/Grad</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3 op" style="display:none">
                                <label for="professionalName">Nome de guerra *</label>
                                <input id="professionalName" name="professionalName" type="text" class="form-control"
                                    placeholder="Nome de guerra">
                            </div>
                            <div class="form-group col adm" style="display:none">
                                <label for="fullName">Nome completo *</label>
                                <input id="fullName" name="fullName" type="text" class="form-control"
                                    placeholder="Nome completo">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-success" onclick="return add_adido()">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal QR Code-->
    <div class="modal fade" id="qr-code" tabindex="-1" role="dialog" aria-labelledby="registerLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">Escaneie o QR Code da viatura</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="video-container" class="style-2">
                        <video width="100%" id="qr-video"></video>
                    </div>
                    <div style="margin-top: 10px" class="d-flex justify-content-between">

                        <div class="form-group col-md-3">
                            <select id="cam-list" class="form-control">
                                <option value="environment" selected>Câmera traseira</option>
                                <option value="user">Camera frontal</option>
                            </select>
                        </div>
                        <div class="col">
                            <div class="d-flex justify-content-sm-end">
                                <button id='flash-btn' class='btn btn-secondary'><i class="fa fa-bolt"></i></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="qr-stop" type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal de envio de imagem --}}
    <div id="uploadimage" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ajustar imagem</h4>
                </div>
                <div class="modal-body">
                    <div id="image_demo"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button class="btn btn-success crop_image">Enviar</button>
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
    <script src="{{ asset('js/actions.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('js/inputmask.js') }}"></script>
    <script src="{{ asset('js/crop-img-profile.js') }}"></script>
    {{-- QrCode --}}
    <script type="module" src="{{ asset('plugins/qr-scanner/qr-code.js') }}"></script>

    <script>
        $(function() {
            var url = '/get_qtt_licensing';
            $.get(url, function(result) {
                document.getElementById('ata').innerText = result.ata;
                document.getElementById('reintegrado').innerText = result.reintegrado;
                document.getElementById('encostado').innerText = result.encostado;
                document.getElementById('adido').innerText = result.adido;
            })
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

            // Summernote
            $('.new_menu').summernote({
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

@endsection

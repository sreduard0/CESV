<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>CES Vtr - Solicitar viatura</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('img/logo.png') }}" />
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/all.css') }}">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/util.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">


    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <style>
        .note-editable {
            background-color: #2e2e2e;
            color: white;
        }

        .note-toolbar {
            background-color: #2c2828;
            color: white;
        }

        .note-editor {
            background-color: #2e2e2e;
            color: white;
        }
    </style>
</head>

<body class="gradient">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-register100">
                <span class="login100-form-title m-b-10">
                    Solicitar viatura
                </span>
                <span class="login100-form-title padding-title">
                    <img src="{{ asset('/img/logo.png') }}" class="img-logo-vtr" alt="">
                </span>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="wrap-input100">
                            <select style="background-color:#2e2e2e;" class="input100" name="rank_id" id="rank_id">
                                <option value=""></option>
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
                            <span class="focus-input100" data-placeholder="Post/ Grad"></span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="wrap-input100">
                            <input class="input100" type="text" name="professional_name" id="professional_name">
                            <span class="focus-input100" data-placeholder="Nome de guerra"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="wrap-input100">
                            <input class="input100" type="text" name="name" id="name">
                            <span class="focus-input100" data-placeholder="Missão"></span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="wrap-input100">
                            <input class="input100" type="text" name="email" id="email">
                            <span class="focus-input100" data-placeholder="Destino"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">




                        <div class="form-group">
                            <div data-target="#dateFinishTarget" data-toggle="datetimepicker" class="wrap-input100 date"
                                id="dateFinishTarget" data-target-input="nearest">

                                <input type="text" class="input100 datetimepicker-input"
                                    data-target="#dateFinishTarget" id="dateFinish" name="dateFinish" value="">
                                <span class="focus-input100" data-placeholder="Data prevista da missão"></span>

                            </div>

                        </div>



                    </div>





                    <div class="col">
                        <div class="wrap-input100">
                            <input class="input100" type="text" name="idt_mil" id="idt_mil"
                                data-inputmask="'mask': ['(99) 9 9999-9999 ']" data-mask="" inputmode="text">
                            <span class="focus-input100" data-placeholder="Contato"></span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="wrap-input100">
                            <input class="input100" type="text" name="idt_mil" id="idt_mil"
                                data-inputmask="'mask': ['99']" data-mask="" inputmode="text">
                            <span class="focus-input100" data-placeholder="Qtd de militares"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <textarea class="input100 text" type="text" name="email" id="email">
                            </textarea>
                    </div>
                </div>
                <div class="container-login100-form-btn m-t-10">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button onclick="return apply();" class="login100-form-btn">
                            SOLICITAR
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- SCRIPTS --}}
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('plugins/moment/locales.js') }}"></script>
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <script src="{{ asset('js/adminlte.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>

    <script src="{{ asset('js/inputmask.js') }}"></script>
    {{-- /SCRIPTS --}}
</body>

</html>

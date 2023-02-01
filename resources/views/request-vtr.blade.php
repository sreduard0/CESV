<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>CES Vtr - Solicitar viatura</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('img/logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/util.css') }}">
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/bootbox.min.js') }}"></script>
    <script type="text/javascript"></script>

</head>

<body class=" gradient">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-register100">
                <span class="login100-form-title m-b-10">
                    CES Vtr
                </span>
                <span class="login100-form-title padding-title">
                    <img src="{{ asset('/img/logo.png') }}" class="img-login" alt="">
                </span>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="wrap-input100">
                            <select class="input100" name="rank_id" id="rank_id">
                                <option class="option" value=""></option>

                            </select>
                            <span class="focus-input100" data-placeholder="P/G"></span>
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
                            <span class="focus-input100" data-placeholder="Nome completo"></span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="wrap-input100">
                            <input class="input100" type="email" name="email" id="email">
                            <span class="focus-input100" data-placeholder="E-mail (opcional)"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                        <div class="wrap-input100">
                            <select name="company_id" id="company_id" class="input100">
                                <option class="option" value=""></option>

                            </select>
                            <span class="focus-input100" data-placeholder="CIA"></span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="wrap-input100">
                            <select name="departament_id" id="departament_id" class="input100">
                                <option class="option" value=""></option>

                            </select>
                            <span class="focus-input100" data-placeholder="SEÇ/SET/CL"></span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="wrap-input100">
                            <input class="input100" type="text" name="idt_mil" id="idt_mil"
                                data-inputmask="'mask': ['999999999-9']" data-mask="" inputmode="text">
                            <span class="focus-input100" data-placeholder="IDT Militar (Ex: 031234567-8)"></span>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col">
                        <div class="wrap-input100">
                            <span class="btn-show-pass">
                                <i class="fa fa-eye"></i>
                            </span>
                            <input class="input100" type="password" name="password" id="password">
                            <span class="focus-input100" data-placeholder="Senha"></span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="wrap-input100">
                            <span class="btn-show-pass">
                                <i class="fa fa-eye"></i>
                            </span>
                            <input class="input100" type="password" name="conf_password" id="conf_password">
                            <span class="focus-input100" data-placeholder="Confirmar senha"></span>
                        </div>
                    </div>
                </div>

                <a class="btn btn-success m-t-10" onclick="stepper.previous()">Anterior</a>
                <div class="container-login100-form-btn m-t-10">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button onclick="return apply();" class="login100-form-btn">
                            SOLICITAR USUÁRIO
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- SCRIPTS --}}
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Money Euro
            $('[data-mask]').inputmask()

        })
    </script>
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- BS-Stepper -->
    <script src="{{ asset('plugins/bs-stepper/js/bs-stepper.js') }}"></script>
    <script>
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>
    {{-- /SCRIPTS --}}
</body>

</html>

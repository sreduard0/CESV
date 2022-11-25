<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>SisTAO - Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('img/logo.png') }}" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/util.css') }}">
</head>

<body class="gradient">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form id="form_login " action="{{ route('loginSubmit') }}" method="POST"
                    class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title p-b-26">
                        SisTAO > CES Vtr
                    </span>
                    <span class="login100-form-title padding-title">
                        <img src="{{ asset('/img/logo.png') }}" class="img-login" alt="">
                    </span>

                    <div class="wrap-input100">
                        <input class="input100" type="text" name="login" id="login">
                        <span class="focus-input100" data-placeholder="IDT Militar"></span>
                    </div>

                    <div class="wrap-input100">
                        <span class="btn-show-pass">
                            <i class="fa fa-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password" id="password">
                        <span class="focus-input100" data-placeholder="Senha"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button onclick="return loginSubmit()" type="submit" class="login100-form-btn">
                                Entrar
                            </button>
                        </div>
                    </div>

                    <div class="height mt-3">
                        @if (session('erro'))
                            <p id="error" class="alert alert-danger">{{ session('erro') }}</p>
                        @endif
                         @if ($errors->any())

                            <ul id="error" class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        @endif
                    </div>

                    <div class="text-center">
                        <span class="txt1">
                            Primeiro acesso?
                        </span><br>
                        <a class="txt2" href="https://sistao.3bsup.eb.mil.br/register">
                            Clique aqui
                        </a>
                        <br>
                        <br>
                        <span class="txt1">
                            Desenvolvedor: <br>
                            <a class="txt1" href="https://www.linkedin.com/in/eduardo-martins-a100b6211">
                                Eduardo Martins
                            </a>
                        </span><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('js/form-login.js') }}"></script>
</body>


</html>

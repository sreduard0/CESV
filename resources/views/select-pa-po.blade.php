@extends('layout')
@section('title', 'Guarda')
@section('home', 'active')
@section('title-header', 'Você esta em qual guarda?')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    {{-- QR Code --}}
    <link rel="stylesheet" href="{{ asset('plugins/qr-scanner/style-qr-code.css') }}">
    <link rel="stylesheet" href="{{ asset('ionicon/css/ionicons.css') }}">
    <!-- Modal de registro manual -->
    <script src="{{ asset('js/crud-gda.js') }}"></script>
@endsection
@section('content')
    <section class="col">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-3 col-6">
                <a href="{{ route('home') }}" class="small-box bg-success">
                    <div class="inner">
                        <h3>PA</h3>
                        <p>Portão das Armas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-home"></i>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-6">

                <a href="{{ route('home') }}" class="small-box bg-primary">
                    <div class="inner">
                        <h3>PO</h3>
                        <p>Portão Oeste</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-home"></i>
                    </div>

                </a>
            </div>
        </div>
    </section>
@endsection

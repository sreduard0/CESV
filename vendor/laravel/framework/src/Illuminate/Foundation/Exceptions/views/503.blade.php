@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code')
    503
    <script>
        setTimeout(() => {
            window.location.reload(true);
        }, 6000);
    </script>
@endsection
@section('message', __('Service Unavailable'))
@extends('errors::minimal')

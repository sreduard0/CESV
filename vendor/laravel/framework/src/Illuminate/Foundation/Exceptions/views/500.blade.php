@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code')
    500
    <script>
        setTimeout(() => {
            window.location.reload(true);
        }, 6000);
    </script>
@endsection
@section('message', __('Server Error'))

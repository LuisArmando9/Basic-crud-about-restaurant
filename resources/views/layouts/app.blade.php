

@extends('adminlte::page')
@section('content')
    <div id="app">
        @yield('custom_content')
    </div>
@stop
@section('js')
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/alert-delete.js')}}"></script>
    @include('sweetalert::alert')
    @yield('custom-js')
    
@stop



@extends("layouts.app")
@section('content_header')
    <h1>Crear un nuevo cliente</h1>
@stop
@section('custom_content')
<x-adminlte-card title="Registro" theme="lightblue" theme-mode="outline">
    <form method="POST" action="{{route('customer.store')}}">
        @csrf

        {{-- With label, invalid feedback disabled and form group class --}}
        <div class="row">
            <x-adminlte-input name="name" label="Nombre" placeholder="Pedro Martinez"
                fgroup-class="col-md-12" disable-feedback value="{{old('name')}}" required/>
           @error("name")
                <x-adminlte-alert theme="danger">
                     {{$message}}
                </x-adminlte-alert>
           @enderror
        </div>
        <div class="row">
            <x-adminlte-input name="email" label="Correo" placeholder="example@gmail.com"
                fgroup-class="col-md-12" type="email" disable-feedback required value="{{old('email')}}"/>
            @error("email")
                <x-adminlte-alert theme="danger" >
                     {{$message}}
                </x-adminlte-alert>
           @enderror
        </div>
        <div class="row">
            <x-adminlte-input name="phone" label="Número Telefónico" placeholder="24645454545"
                fgroup-class="col-md-12" disable-feedback required value="{{old('phone')}}"/>
            @error("phone")
                <x-adminlte-alert theme="danger" >
                     {{$message}}
                </x-adminlte-alert>
           @enderror
        </div>
        <x-adminlte-button class="btn-md " theme="outline-info" type="submit" label="Crear" />
    </form>
</x-adminlte-card>
@stop

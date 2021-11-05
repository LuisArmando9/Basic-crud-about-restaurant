@extends("layouts.app")
@section('content_header')
    <h1>Editar</h1>
@stop
@section('content')
<x-adminlte-card title="Cliente:{{$customer->name}}" theme="lightblue" theme-mode="outline">
    <form method="POST" action="{{route('customer.update', $customer->id)}}">
        @csrf
        @method("PUT")
        {{-- With label, invalid feedback disabled and form group class --}}
        <div class="row">
            <x-adminlte-input name="name" label="Nombre" placeholder="Pedro Martinez"
                fgroup-class="col-md-12" disable-feedback value="{{$customer->name}}"/>
           @error("name")
                <x-adminlte-alert theme="danger" title="Danger">
                     {{$message}}
                </x-adminlte-alert>
           @enderror
        </div>
        <div class="row">
            <x-adminlte-input name="email" label="Correo" placeholder="example@gmail.com"
                fgroup-class="col-md-12" type="email" disable-feedback value="{{$customer->email}}"/>
            @error("email")
                <x-adminlte-alert theme="danger" title="Danger">
                     {{$message}}
                </x-adminlte-alert>
           @enderror
        </div>
        <div class="row">
            <x-adminlte-input name="phone" label="Número Telefónico" placeholder="24645454545"
                fgroup-class="col-md-12" disable-feedback value="{{$customer->phone}}"/>
            @error("phone")
                <x-adminlte-alert theme="danger" title="Danger">
                     {{$message}}
                </x-adminlte-alert>
           @enderror
        </div>
        <x-adminlte-button class="btn-md " theme="outline-info" type="submit" label="Editar" />
    </form>
</x-adminlte-card>
@stop

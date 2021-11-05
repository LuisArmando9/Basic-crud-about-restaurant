@extends("layouts.app")
@section('content_header')
    <h1>Crear nuevo pedido</h1>
@stop
@section('content')
<x-adminlte-card title="Registro" theme="lightblue" theme-mode="outline">
    <form method="POST" action="{{route('order.store')}}">
        @csrf
        <div class="container">
            <label>Cliente</label>
            <x-adminlte-select name="customerId">
                   @foreach($customers as $customer)
                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                   @endforeach
            </x-adminlte-select>
           @error("customerId")
                <x-adminlte-alert theme="danger" title="Danger">
                     {{$message}}
                </x-adminlte-alert>
           @enderror
        </div>
        <x-adminlte-button class="btn-md " theme="outline-info" type="submit" label="Crear" />
    </form>
</x-adminlte-card>
@stop

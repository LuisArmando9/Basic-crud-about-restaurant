@extends("layouts.app")
@section('content_header')
    <h1>Asignar platillos a {{$customer->name}}</h1>
@stop
@section('content')
<x-adminlte-card title="N°  {{$order->id}} de Orden" theme="lightblue" theme-mode="outline">
    <form method="POST" action="{{route('orderhasfood.store')}}">
        @csrf
        {{-- With label, invalid feedback disabled and form group class --}}
        <div class="row">
            <x-adminlte-input name="orderId" label="Nombre" type="hidden"
                fgroup-class="col-md-12" disable-feedback value="{{$order->id}}" required/>
        </div>
        <div class="container">
            <label>Platillos</label>
            <x-adminlte-select name="foodI">
                @foreach($foods as $food)
                    <option selected value="{{$food->id}}">{{$food->name}}</option> 
                @endforeach
            </x-adminlte-select>
           @error("foodId")
                <x-adminlte-alert theme="danger" title="Danger">
                     {{$message}}
                </x-adminlte-alert>
           @enderror
        </div>
        <x-adminlte-button class="btn-md " theme="outline-info" type="submit" label="Actualizar" />
    </form>
</x-adminlte-card>
@stop

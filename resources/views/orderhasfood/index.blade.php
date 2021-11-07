@extends("layouts.app")
@section('content_header')
    <h1>Asignar platillos a {{$customer->name}}</h1>
@stop
@section('content')
<x-adminlte-card title="N°  {{$order->id}} de Orden" theme="lightblue" theme-mode="outline">
    <form method="POST" action="{{route('orderhasfood.store')}}">
        @csrf
        <label><small>PLATILLOS ELEGIDOS</small></label>
        <div class="row" id="food-selected">
        </div>
        
        {{-- With label, invalid feedback disabled and form group class --}}
        <div class="row">
            <x-adminlte-input name="orderId" type="hidden"
                fgroup-class="col-md-12" disable-feedback value="{{$order->id}}" required/>
        </div>
        <div class="container">
            <label>Platillos</label>
            <x-adminlte-select name="foodId"  id="foods">
                @foreach($foods as $food)
                    <option selected value="{{$food->id}}">{{$food->name}}</option> 
                @endforeach
            </x-adminlte-select>
            <small class="m-2"><span id="insert-error" class="text-danger"></span></small>
           @error("foodId")
                <x-adminlte-alert theme="danger" title="Danger">
                     {{$message}}
                </x-adminlte-alert>
           @enderror
        </div>
        <x-adminlte-button class="btn-md " theme="outline-info" class="mt-2" type="submit" label="Actualizar" />
    </form>
</x-adminlte-card>
@stop
@section('custom-js')
    <script src="{{asset('js/food.js')}}"></script>
@stop
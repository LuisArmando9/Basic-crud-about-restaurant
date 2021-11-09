@extends("layouts.app")
@section('content_header')
    <h1>Editar</h1>
@stop
@section('custom_content')
<x-adminlte-card title="Registro" theme="lightblue" theme-mode="outline">
    <form method="POST" action="{{route('order.update', $order->id)}}">
        @csrf
        @method("PUT")
        <div class="container">
            <label>Cliente</label>
            <x-adminlte-select name="customerId">
                   @foreach($customers as $customer)
                        @if($customer->id == $order->customerId)
                            <option selected value="{{$customer->id}}">{{$customer->name}}</option> 
                        @else
                            <option  value="{{$customer->id}}">{{$customer->name}}</option> 
                        @endif
                   @endforeach
            </x-adminlte-select>
           @error("customerId")
                <x-adminlte-alert theme="danger" title="Danger">
                     {{$message}}
                </x-adminlte-alert>
           @enderror
        </div>
        <div class="container">
            <label>Estado del pedido</label>
            <x-adminlte-select name="status">
                @foreach($status as $key => $content)
                    @if($order->status == $key)
                        <option selected value="{{$key}}">{{$content}}</option> 
                    @else
                        <option  value="{{$key}}">{{$content}}</option>
                    @endif
                @endforeach
            </x-adminlte-select>
           @error("status")
                <x-adminlte-alert theme="danger" title="Danger">
                     {{$message}}
                </x-adminlte-alert>
           @enderror
        </div>
       
        <x-adminlte-button class="btn-md " theme="outline-info" type="submit" label="Crear" />
    </form>
   
</x-adminlte-card>
@stop

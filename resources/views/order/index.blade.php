@extends("layouts.app")
@section('content_header')
    <h1>Pedidos</h1>
@stop
@section('content')
<x-adminlte-card title="Registros" theme="lightblue" theme-mode="outline">
    <div class="container">
        <a class="btn btn-primary p-2" href="order/create"><i class="fas  fa-plus"></i> Agregar</a>
    </div>
    <table class="table">
    <thead>
        <tr>
            <th scope="col">Status</th>
            <th scope="col">No de pedido</th>
            <th scope="col">Cliente</th>
            <th scope="col">Asignar platillos</th>
            <th scope="col">Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr>
                <th scope="row">{!!getStatus($order->status)!!}</th>
                <td>{{$order->id}}</td>
                <td>{{$order->name}}</td>
                <td>
                    <a class="btn btn-info" href="/orderhasfood?order={{$order->id}}"><i class="fas fa-plus"></i></a>
                </td>
                <td>
                     <form  class="form-material form-delete"  action="{{route('order.destroy', $order->id)}}" method="POST">
                        <a class="btn btn-info" href="{{route('order.edit', $order->id)}}"><i class="fas fa-pencil-alt"></i></a>
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        
    </table>
    <div class="container">
        {!!$orders->links()!!}
    </div>
</x-adminlte-card>
@stop

@extends("layouts.app")
@section('content_header')
    <h1>Clientes</h1>
@stop
@section('custom_content')
<x-adminlte-card title="Registros" theme="lightblue" theme-mode="outline">
    <div class="container">
        <a class="btn btn-primary p-2" href="customer/create"><i class="fas  fa-plus"></i> Agregar</a>
    </div>  
    <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
            <tr>
                <th scope="row">{{$customer->id}}</th>
                <td>{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                <td>
                     <form  class="form-material form-delete"  action="{{route('customer.destroy', $customer->id)}}" method="POST">
                        <a class="btn btn-info" href="{{route('customer.edit', $customer->id)}}"><i class="fas fa-pencil-alt"></i></a>
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
   
    </tbody>
    </table>
    <div class="container">
        {!!$customers->links()!!}
    </div>
</x-adminlte-card>

@stop

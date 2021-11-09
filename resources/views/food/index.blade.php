@extends("layouts.app")
@section('content_header')
    <h1>Platillos</h1>
@stop
@section('custom_content')
<x-adminlte-card title="Registros" theme="lightblue" theme-mode="outline">
    <div class="container">
        <a class="btn btn-primary p-2" href="food/create"><i class="fas  fa-plus"></i> Agregar</a>
    </div>
    <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($foods as $food)
            <tr>
                <th scope="row">{{$food->id}}</th>
                <td>{{$food->name}}</td>
                <td>{{$food->price}}</td>
                <td>
                     <form  class="form-material form-delete"  action="{{route('food.destroy', $food->id)}}" method="POST">
                        <a class="btn btn-info" href="{{route('food.edit', $food->id)}}"><i class="fas fa-pencil-alt"></i></a>
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
        {!!$foods->links()!!}
    </div>
</x-adminlte-card>
@stop

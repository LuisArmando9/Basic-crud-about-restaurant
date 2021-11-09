@extends("layouts.app")
@section('content_header')
    <h1>Editar</h1>
@stop
@section('custom_content')
<x-adminlte-card title="Platillo: {{$food->name}}" theme="lightblue" theme-mode="outline">
    <form method="POST" action="{{route('food.update', $food->id)}}">
        @csrf
        @method("PUT")
        {{-- With label, invalid feedback disabled and form group class --}}
        <div class="row">
            <x-adminlte-input name="name" label="Nombre" placeholder="Cemitas la michoacana"
                fgroup-class="col-md-12" disable-feedback value="{{$food->name}}" required/>
           @error("name")
                <x-adminlte-alert theme="danger">
                     {{$message}}
                </x-adminlte-alert>
           @enderror
        </div>
        <div class="row">
            <x-adminlte-input name="price" label="Precio" placeholder="80.23"
                fgroup-class="col-md-12" type="text" disable-feedback required value="{{$food->price}}"/>
            @error("price")
                <x-adminlte-alert theme="danger" >
                     {{$message}}
                </x-adminlte-alert>
           @enderror
        </div>
        <div class="row">
            <x-adminlte-textarea name="description" required  label="Descripción"  fgroup-class="col-md-12" >
              {{$food->description}}
            </x-adminlte-textarea>
            @error("description")
                <x-adminlte-alert theme="danger" >
                     {{$message}}
                </x-adminlte-alert>
           @enderror

        </div>
        <x-adminlte-button class="btn-md " theme="outline-info" type="submit" label="Actualizar" />
    </form>
</x-adminlte-card>
@stop

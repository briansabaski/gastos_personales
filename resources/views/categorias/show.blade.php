@extends('layouts.app')

@section('titulo', 'Categorias')

@section('contenido')

 <div>
    <div>
        <h1>Categoria</h1>
            <div>
                <p><strong>ID: </strong>{{$categoria['id']}}</p>
                <p><strong>Nombre: </strong>{{$categoria['nombre']}}</p>
                <p><strong>Nivel: </strong>{{$categoria['nivel']}}</p>
                <p><strong>Creado En: </strong>{{$categoria['creado_en']}}</p>

            </div>
            <a href="{{ route('categorias.index') }}">Volver al listado</a>
    </div>
 </div>
@endsection
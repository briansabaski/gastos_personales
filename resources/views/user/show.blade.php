@extends('layouts.app')

@section('titulo', 'Usuario')

@section('contenido')

 <div>
    <div>
        <h1>Usuario</h1>
            <div>
                <p><strong>ID de usuario: </strong>{{$user['user_id']}}</p>
                <p><strong>Nombre: </strong>{{$user['name']}}</p>
                <p><strong>Email: </strong>{{$user['email']}}</p>
                <p><strong>Contraseña: </strong>{{$user['password']}}</p>
                <p><strong>Email Verificado: </strong>{{$user['email_verified_at']}}</p>
                <p><strong>Rol ID: </strong>{{$user['role_id']}}</p>
                <p><strong>Recordar Token: </strong>{{ "No" }}</p>
                <p><strong>Creado en: </strong>{{$user['created_at']}}</p>
                <p><strong>Actualizado en: </strong>{{$user['updated_at']}}</p>

            </div>
            <a href="{{ route('user.index') }}">Volver al listado</a>
            <a href="{{ route('user.edit', $user['user_id']) }}">Editar</a>  
    </div>
 </div>
@endsection
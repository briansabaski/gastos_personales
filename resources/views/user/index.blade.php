@extends('layouts.app')

@section('titulo', 'Usuarios')

@section('contenido')

<div class="container mx-auto p-8 max-w-7xl">
    <h1 class="text-3xl font-bold mb-6 text-purple-800">Listado de usuarios</h1>
    <a href="{{ route('user.create') }}" class="text-purple-600 hover:underline mb-6 inline-block">Crear usuario</a>

    @if(session('exito'))
        <div class="bg-purple-100 border border-purple-400 text-green-700 px-4 py-3 rounded mb-4">
            <span>{{ session('exito') }}</span>
        </div>
    @endif

    @if(empty($datos) || count($datos) === 0)
        <p class="text-purple-600">No existen usuarios actualmente</p>
    @else
        <div class="overflow-x-auto">
          <table class="min-w-full w-screen bg-purple-20 shadow-md rounded border border-purple-400 text-left">                <thead>
                    <tr class="bg-purple-300">
                        <th class="px-4 py-2 border border-purple-400">Id de usuario</th>
                        <th class="px-4 py-2 border border-purple-400">Nombre</th>
                        <th class="px-4 py-2 border border-purple-400">Email</th>
                        <th class="px-4 py-2 border border-purple-400">Contraseña</th>
                        <th class="px-4 py-2 border border-purple-400">Email Verificado</th>
                        <th class="px-4 py-2 border border-purple-400">Rol ID</th>
                        <th class="px-4 py-2 border border-purple-400">Recordar token</th>
                        <th class="px-4 py-2 border border-purple-400">Creado en</th>
                        <th class="px-4 py-2 border border-purple-400">Actualizado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datos as $dato)
                    <tr class="hover:bg-purple-100">
                        <td class="px-4 py-2 border border-purple-300">{{ $dato['user_id'] }}</td>
                        <td class="px-4 py-2 border border-purple-300">{{ $dato['name'] }}</td>
                        <td class="px-4 py-2 border border-purple-300">{{ $dato['email'] }}</td>                      
                        <td class="px-4 py-2 border border-purple-300">{{ $dato['password'] }}</td>
                        <td class="px-4 py-2 border border-purple-300">{{ $dato['email_verified_at'] }}</td>
                        <td class="px-4 py-2 border border-purple-300">{{ $dato['role_id'] }}</td>
                        <td class="px-4 py-2 border border-purple-300">{{ "No" }}</td>
                        <td class="px-4 py-2 border border-purple-300">{{ $dato['created_at'] }}</td>
                        <td class="px-4 py-2 border border-purple-300">{{ $dato['updated_at'] }}</td>
                        <td class="px-4 py-2 border border-black border-opacity-85"><a href="{{ route('user.show', $dato['user_id']) }}" class="text-purple-600 hover:underline">Ver</a>
                        <a href="{{ route('user.edit', $dato['user_id']) }}" class="text-purple-600 hover:underline">Editar</a>
                         <form action=" {{route('user.destroy', $dato['user_id'])}}" method="POST" onsubmit="return confirm('Estas seguro que deseas eliminar el usuario?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-purple-600 hover:underline">Eliminar</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<script>
    // El código js se ejecuta luego de que todos los elementos del DOM haya creado
    document.addEventListener('DOMContentLoaded', function(){
        console.log("Cargó la pagina");
    });
</script>
@endsection

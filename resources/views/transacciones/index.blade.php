@extends('layouts.app')

@section('titulo', 'Transacciones')

@section('contenido')

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Listado de transacciones</h1>
    <a href="{{ route('transacciones.create') }}" class="text-blue-600 hover:underline mb-6 inline-block">Crear transacciones</a>

    @if(session('exito'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            <span>{{ session('exito') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <span>{{ session('error') }}</span>
        </div>
    @endif

    @empty($datos)
        <p class="text-gray-600">No existen transacciones actualmente</p>
    @else
        <div class="overflow-x-auto">
            <table class="w-full bg-yellow-100 shadow-md rounded border border-black border-opacity-85 text-left">
                <thead>
                    <tr class="bg-yellow-200">
                        <th class="px-4 py-2 border border-black border-opacity-85">Id de Transaccion</th>
                        <th class="px-4 py-2 border border-black border-opacity-85">Descripcion</th>
                        <th class="px-4 py-2 border border-black border-opacity-85">Monto</th>
                        <th class="px-4 py-2 border border-black border-opacity-85">Fecha de transaccion</th>
                        <th class="px-4 py-2 border border-black border-opacity-85">Creado en</th>
                        <th class="px-4 py-2 border border-black border-opacity-85">Actualizado</th>
                        <th class="px-4 py-2 border border-black border-opacity-85">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datos as $dato)
                    <tr class="hover:bg-yellow-50">
                        <td class="px-4 py-2 border border-black border-opacity-85">{{ $dato['id'] }}</td>
                        <td class="px-4 py-2 border border-black border-opacity-85">{{ $dato['descripcion'] }}</td>
                        <td class="px-4 py-2 border border-black border-opacity-85">{{ $dato['monto'] }}</td>
                        <td class="px-4 py-2 border border-black border-opacity-85">{{ $dato['fecha_transaccion'] }}</td>
                        <td class="px-4 py-2 border border-black border-opacity-85">{{ $dato['created_at'] }}</td>
                        <td class="px-4 py-2 border border-black border-opacity-85">{{ $dato['updated_at'] }}</td>
                        <td class="px-4 py-2 border border-black border-opacity-85"><a href="{{ route('transacciones.show', $dato['id']) }}" class="text-purple-600 hover:underline">Ver</a>
                        
            <a href="{{ route('transacciones.edit', $dato['id']) }}" class="text-purple-600 hover:underline">Editar</a>
                        
                        <form action=" {{route('transacciones.destroy', $dato['id'])}}" method="POST" onsubmit="return confirm('Estas seguro que deseas eliminar la transaccion')">
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
    @endempty
</div>

<script>
    // El código js se ejecuta luego de que todos los elementos del DOM haya creado
    document.addEventListener('DOMContentLoaded', function(){
        console.log("Cargó la pagina");
    });
</script>
@endsection

@extends('layouts.app')

@section('titulo', 'Categorias')

@section('contenido')
<div class="container mx-auto p-8 max-w-7xl">
    <h1 class="text-3xl font-bold mb-6 text-purple-800">Listado de Categorias</h1>

    @if(session('exito'))
        <div class="bg-purple-100 border border-purple-400 text-green-700 px-4 py-3 rounded mb-4">
            <span>{{ session('exito') }}</span>
        </div>
    @endif

    @if(empty($datos) || count($datos) === 0)
        <p class="text-purple-600">No existen categorias actualmente</p>
    @else
        <div class="overflow-x-auto">
          <table class="min-w-full w-screen bg-purple-20 shadow-md rounded border border-purple-400 text-left">                <thead>
                    <tr class="bg-purple-300">
                        <th class="px-4 py-2 border border-purple-400">Id de Categoría</th>
                        <th class="px-4 py-2 border border-purple-400">Nombre</th>
                        <th class="px-4 py-2 border border-purple-400">Nivel</th>
                        <th class="px-4 py-2 border border-purple-400">Creado en</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($datos as $dato)
                    <tr class="hover:bg-purple-100">
                        <td class="px-4 py-2 border border-purple-300">{{ $dato['id'] }}</td>
                        <td class="px-4 py-2 border border-purple-300">{{ $dato['nombre'] }}</td>
                        <td class="px-4 py-2 border border-purple-300">{{ $dato['nivel'] }}</td>                      
                        <td class="px-4 py-2 border border-purple-300">{{ $dato['creado_en'] }}</td>
                        <td class="px-4 py-2 border border-black border-opacity-85"><a href="{{ route('categorias.show', $dato['id']) }}" class="text-purple-600 hover:underline">Ver</a>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection

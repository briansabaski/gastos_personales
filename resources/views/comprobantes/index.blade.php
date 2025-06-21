@extends('layouts.app')

@section('titulo', 'Mis comprobantes')

@section('contenido')
<div class="bg-gray-100 min-h-screen">
    <div class="container mx-auto p-8 max-w-7xl bg-white shadow-md rounded">
        <h1>Listado de comprobantes</h1>
        <a href="{{ route('comprobantes.create') }}">Crear comprobante</a>
    </div>
    
    @empty($infoArchivos)
        <p>No existen comprobantes en este momento</p>
    @else
        <table class="bg-white shadow-md rounded border border-gray-100">
            <thead >
                <tr class="bg-gray-200 text-gray-700 text-center font-semibold">
                    <th>Nombre del archivo</th>
                    <th>Imagen</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-center font-semibold">
                @foreach($infoArchivos as $archivo) 
                    <tr class="hover:bg-gray-100 transition-colors duration-200 cursor-pointer">
                        <td class="">{{ $archivo['nombre'] }}</td>

                        <td class="flex justify-center items-center" style="margin-bottom:1.5rem;">
                            @php  
                                $extension = pathinfo($archivo['nombre'], PATHINFO_EXTENSION);
                            @endphp
                            @if(in_array($extension, ['jpg', 'jpeg', 'png']))
                                <img src="{{ $archivo['url'] }}" alt="{{ $archivo['nombre'] }}" style="max-height:200px">
                            @endif
                        </td>

                        <td c>
                            <a href="{{ $archivo['url'] }}" target="_blank">
                                Ver/Descargar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endempty
</div>
@endsection
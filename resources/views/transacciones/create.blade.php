@extends('layouts.app')

@section('titulo', 'Nueva transaccion')

@section('contenido')

<div class="max-w-xl mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-2xl font-bold mb-4">Crear nueva transacción</h1>

    @if($errors->any())
    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
        <strong class="block font-semibold mb-1">Error</strong>
        <span>Corrija errores del formulario</span>
        <!--
        <ul class="mt-2 list-disc pl-5">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        -->
    </div>
    @endif

    <form action="{{ route('transacciones.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción:</label>
            <input type="text" name="descripcion" id="descripcion" value="{{ old('descripcion') }}"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                required>
            @error('descripcion')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="monto" class="block text-sm font-medium text-gray-700">Monto:</label>
            <input type="number" name="monto" id="monto" value="{{ old('monto') }}"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                required>
            @error('monto')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="fecha_transaccion" class="block text-sm font-medium text-gray-700">Fecha Transacción:</label>
            <input type="date" name="fecha_transaccion" id="fecha_transaccion"
                value="{{ old('fecha_transaccion') }}"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('fecha_transaccion')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between items-center mt-6">
            <a href="{{ route('transacciones.index') }}"
               class="text-blue-600 hover:underline">Volver al listado</a>

            <button type="submit"
                class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition-colors">
                Guardar transacción
            </button>
        </div>
    </form>
</div>

@endsection

@extends('layouts.app')

@section('titulo', 'Nuevo comprobante')


@section('contenido')
<div class="max-w-xl mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-2xl font-bold mb-4">Crear nuevo comprobante</h1>

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

    <form action="{{ route('comprobantes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="comprobante">Comprobante</label>
            <input type="file" name="comprobante" id="comprobante" required>
            @error('comprobante')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <a href="{{ route('comprobantes.index') }}">Volver</a>
            <button type="submit">Guardar comprobante</button>
        </div>
    </form>


</div>

@endsection
@extends('layouts.app')

@section('titulo', 'Nuevo usuario')

@section('contenido')

<div class="max-w-xl mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-2xl font-bold mb-4">Crear nuevo Usuario</h1>

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

    <form action="{{ route('user.update', $user['user_id']) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

       <div>
    <label for="name" class="block text-sm font-medium text-gray-700">Nombre:</label>
    <input type="text" name="name" id="name" value="{{ old('name', $user['name']) }}"
        class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        required>
    @error('name')
    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
    <input type="email" name="email" id="email" value="{{ old('email', $user['email']) }}"
        class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        required>
    @error('email')
    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña:</label>
    <input type="password" name="password" id="password" value="{{ old('password', $user['password']) }}"
        class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        required>
    @error('password')
    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="role_id" class="block text-sm font-medium text-gray-700">Rol ID:</label>
    <input type="number" name="role_id" id="role_id" value="{{ old('role_id', $user['role_id']) }}"
        class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        required>
    @error('role_id')
    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

        <div class="flex justify-between items-center mt-6">
            <a href="{{ route('user.index') }}"
               class="text-blue-600 hover:underline">Volver al listado</a>

            <button type="submit"
                class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition-colors">
                Guardar Usuario
            </button>
        </div>
    </form>
</div>

@endsection

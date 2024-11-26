@extends('layouts.app')

@section('titulo', 'Editar Solicitud')

@section('contenido')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Editar Solicitud</h1>
        <form action="{{ route('solicituds.update', $solicitud->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Indica que el método del formulario es PUT -->

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <!-- Campo Cliente (Solo visualización) -->
                <div>
                    <label for="cliente_id" class="block text-sm font-medium text-gray-700">Cliente</label>
                    <input type="text" id="cliente_id" value="{{ $solicitud->cliente->nombre }} {{ $solicitud->cliente->apellidos }}" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" 
                        disabled>
                    @error('cliente_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Dispositivo (Solo visualización) -->
                <div>
                    <label for="dispositivo_id" class="block text-sm font-medium text-gray-700">Dispositivo</label>
                    <input type="text" id="dispositivo_id" value="{{ $solicitud->dispositivo->Marca }} {{ $solicitud->dispositivo->Modelo }}" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" 
                        disabled>
                    @error('dispositivo_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Fecha de Solicitud -->
                <div>
                    <label for="fecha_solicitud" class="block text-sm font-medium text-gray-700">Fecha de Solicitud</label>
                    <input type="datetime-local" id="fecha_solicitud" name="fecha_solicitud" value="{{ old('fecha_solicitud', $solicitud->fecha_solicitud) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('fecha_solicitud')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Descripción del Problema -->
                <div class="md:col-span-2">
                    <label for="descripcion_problema" class="block text-sm font-medium text-gray-700">Descripción del Problema</label>
                    <textarea id="descripcion_problema" name="descripcion_problema"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>{{ old('descripcion_problema', $solicitud->descripcion_problema) }}</textarea>
                    @error('descripcion_problema')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Botones de Guardar y Cancelar -->
            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Guardar
                </button>
                <a href="{{ route('solicituds.index') }}"
                    class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection

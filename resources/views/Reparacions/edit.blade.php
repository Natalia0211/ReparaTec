@extends('layouts.app')

@section('titulo', 'Editar Reparación')

@section('contenido')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Editar Reparación</h1>
        <form action="{{ route('reparacions.update', $reparacion->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Indica que el método del formulario es PUT -->

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <!-- Campo Solicitud ID -->
                <div>
                    <label for="solicitud_id" class="block text-sm font-medium text-gray-700">Solicitud ID</label>
                    <input type="number" id="solicitud_id" name="solicitud_id" value="{{ old('solicitud_id', $reparacion->solicitud_id) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('solicitud_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Empleado ID -->
                <div>
                    <label for="empleado_id" class="block text-sm font-medium text-gray-700">Empleado ID</label>
                    <input type="number" id="empleado_id" name="empleado_id" value="{{ old('empleado_id', $reparacion->empleado_id) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('empleado_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Fecha de Reparación -->
                <div>
                    <label for="fecha_reparacion" class="block text-sm font-medium text-gray-700">Fecha de Reparación</label>
                    <input type="datetime-local" id="fecha_reparacion" name="fecha_reparacion" value="{{ old('fecha_reparacion', $reparacion->fecha_reparacion) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('fecha_reparacion')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Costo de Reparación -->
                <div>
                    <label for="costo_reparacion" class="block text-sm font-medium text-gray-700">Costo de Reparación</label>
                    <input type="number" step="0.01" id="costo_reparacion" name="costo_reparacion" value="{{ old('costo_reparacion', $reparacion->costo_reparacion) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('costo_reparacion')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Botones de Guardar y Cancelar -->
            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="fas fa-save mr-2"></i> Guardar
                </button>
                <a href="{{ route('reparacions.index') }}"
                    class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    <i class="fas fa-times mr-2"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('titulo', 'Editar Factura')

@section('contenido')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Editar Factura</h1>
        <form action="{{ route('facturas.update', $factura->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Indica que el método del formulario es PUT -->

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <!-- Campo Fecha de Emisión -->
                <div>
                    <label for="fecha_emision" class="block text-sm font-medium text-gray-700">Fecha de Emisión</label>
                    <input type="datetime-local" id="fecha_emision" name="fecha_emision" value="{{ old('fecha_emision', $factura->fecha_emision) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('fecha_emision')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Monto Total -->
                <div>
                    <label for="monto_total" class="block text-sm font-medium text-gray-700">Monto Total</label>
                    <input type="number" step="0.01" id="monto_total" name="monto_total" value="{{ old('monto_total', $factura->monto_total) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('monto_total')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Estado -->
                <div>
                    <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                    <input type="text" id="estado" name="estado" value="{{ old('estado', $factura->estado) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('estado')
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
                <a href="{{ route('facturas.index') }}"
                    class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection

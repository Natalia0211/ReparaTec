@extends('layouts.app')

@section('titulo', 'Crear Factura')

@section('contenido')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Agregar Nueva Factura</h1>
        <form action="{{ route('facturas.store') }}" method="POST">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="solicitud_id" class="block text-sm font-medium text-gray-700">Solicitud ID</label>
                    <input type="number" id="solicitud_id" name="solicitud_id" value="{{ old('solicitud_id') }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('solicitud_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="fecha_emision" class="block text-sm font-medium text-gray-700">Fecha de Emisión</label>
                    <input type="datetime-local" id="fecha_emision" name="fecha_emision" value="{{ old('fecha_emision') }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('fecha_emision')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="monto_total" class="block text-sm font-medium text-gray-700">Monto Total</label>
                    <input type="number" step="0.01" id="monto_total" name="monto_total" value="{{ old('monto_total') }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('monto_total')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                    <select id="estado" name="estado" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                        <option value="">Selecciona un estado</option>
                        <option value="pendiente" {{ old('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="pagada" {{ old('estado') == 'pagada' ? 'selected' : '' }}>Pagada</option>
                        <option value="cancelada" {{ old('estado') == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                        <option value="en_proceso" {{ old('estado') == 'en_proceso' ? 'selected' : '' }}>En Proceso</option>
                    </select>
                    @error('estado')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

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

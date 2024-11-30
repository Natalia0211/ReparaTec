@extends('layouts.app')

@section('titulo', 'Editar Pago')

@section('contenido')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Editar Pago</h1>
        <form action="{{ route('pagos.update', $pago->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Indica que el método del formulario es PUT -->

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <!-- Campo Fecha de Pago -->
                <div>
                    <label for="fecha_pago" class="block text-sm font-medium text-gray-700">Fecha de Pago</label>
                    <input type="datetime-local" id="fecha_pago" name="fecha_pago" 
                        value="{{ old('fecha_pago', $pago->fecha_pago) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('fecha_pago')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Método de Pago -->
                <div>
                    <label for="metodo_pago" class="block text-sm font-medium text-gray-700">Método de Pago</label>
                    <input type="text" id="metodo_pago" name="metodo_pago" 
                        value="{{ old('metodo_pago', $pago->metodo_pago) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('metodo_pago')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Monto de Pago -->
                <div>
                    <label for="monto_pago" class="block text-sm font-medium text-gray-700">Monto de Pago</label>
                    <input type="number" step="0.01" id="monto_pago" name="monto_pago" 
                        value="{{ old('monto_pago', $pago->monto_pago) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('monto_pago')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo ID de Factura -->
                <div>
                    <label for="factura_id" class="block text-sm font-medium text-gray-700">ID de Factura</label>
                    <input type="number" id="factura_id" name="factura_id" 
                        value="{{ old('factura_id', $pago->factura_id) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('factura_id')
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
                <a href="{{ route('pagos.index') }}"
                    class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    <i class="fas fa-times mr-2"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection


@extends('layouts.app')

@section('titulo', 'Editar Inventario')

@section('contenido')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Editar Inventario</h1>
        <form action="{{ route('inventarios.update', $inventario->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Indica que el método del formulario es PUT -->

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <!-- Campo Producto -->
                <div>
                    <label for="producto_id" class="block text-sm font-medium text-gray-700">Producto</label>
                    <select id="producto_id" name="producto_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
                        @foreach($productos as $producto)
                            <option value="{{ $producto->id }}" {{ (old('producto_id', $inventario->producto_id) == $producto->id) ? 'selected' : '' }}>
                                {{ $producto->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('producto_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Proveedor -->
                <div>
                    <label for="proveedor_id" class="block text-sm font-medium text-gray-700">Proveedor</label>
                    <select id="proveedor_id" name="proveedor_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
                        @foreach($proveedors as $proveedor)
                            <option value="{{ $proveedor->id }}" {{ (old('proveedor_id', $inventario->proveedor_id) == $proveedor->id) ? 'selected' : '' }}>
                                {{ $proveedor->empresa }}
                            </option>
                        @endforeach
                    </select>
                    @error('proveedor_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Cantidad  -->
                <div>
                    <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad</label>
                    <input type="number" id="cantidad" name="cantidad" value="{{ old('cantidad', $inventario->cantidad) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('cantidad')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Precio Unitario -->
                <div>
                    <label for="precio_unitario" class="block text-sm font-medium text-gray-700">Precio Unitario</label>
                    <input type="number" step="0.01" id="precio_unitario" name="precio_unitario" value="{{ old('precio_unitario', $inventario->precio_unitario) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('precio_unitario')
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
                <a href="{{ route('inventarios.index') }}"
                    class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    <i class="fas fa-times mr-2"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection

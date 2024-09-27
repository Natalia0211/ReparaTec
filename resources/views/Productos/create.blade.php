@extends('layouts.app')

@section('titulo', 'Mis productos')

@section('contenido')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Crear Producto</h1>
        <form action="{{ route('productos.store') }}" method="POST">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                {{-- Nombre --}}
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre del producto"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                </div>

                {{-- Descripción --}}
                <div>
                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <input type="text" id="descripcion" name="descripcion" placeholder="Descripción"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                </div>

                {{-- Precio --}}
                <div>
                    <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
                    <input type="number" id="precio" name="precio" placeholder="Precio"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                </div>

                {{-- Categoría --}}
                <div>
                    <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                    <select id="categoria_id" name="categoria_id"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                        <option value="" disabled selected>Selecciona una categoría</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Proveedor --}}
                <div>
                    <label for="proveedor_id" class="block text-sm font-medium text-gray-700">Proveedor</label>
                    <select id="proveedor_id" name="proveedor_id"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                        <option value="" disabled selected>Selecciona un proveedor</option>
                        @foreach($proveedors as $proveedor)
                            <option value="{{ $proveedor->id }}">{{ $proveedor->empresa }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Crear Producto
                </button>
                <a href="{{ route('productos.index') }}"
                    class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection


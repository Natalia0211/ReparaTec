@extends('layouts.app')

@section('titulo', 'Página Principal')

@section('contenido')

    {{-- Mostrar mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif
    
    {{-- Formulario de búsqueda --}}
    <div class="m-4">
        <form action="{{ route('productos.index') }}" method="GET" class="flex items-center">
            <input type="text" name="search" placeholder="Buscar productos" class="input" />
            <select name="categoria" class="select ml-2">
                <option value="">Seleccione categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-outline ml-2">Buscar</button>
        </form>
    </div>

    {{-- Botón para crear un producto nuevo --}}
    <div class="flex justify-end m-4">
        <a href="{{ route('productos.create') }}" class="btn btn-outline">Nuevo producto</a>
    </div>

    {{-- Contenedor de productos en grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4">
        @foreach ($productos as $producto)
            <div class="card bg-base-100 shadow-xl">
                <figure>
                    <img src="https://picsum.photos/id/{{ $producto->id }}/240" alt="{{ $producto->nombre }}"
                        class="w-full h-40 object-cover" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">{{ $producto->nombre }}</h2>
                    <p>{{ $producto->descripcion }}</p>
                    Precio: <div class="badge badge-outline">{{ $producto->precio }}</div>
                    <p>Stock: <div class="badge badge-secondary">{{ $producto->cantidad }}</div></p> <!-- Mostrar stock -->
                    <div class="card-actions justify-end mt-4 flex space-x-2">
                        <!-- Botón Editar con ícono -->
                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning btn-xs">
                            <i class="fas fa-edit"></i> <!-- Ícono de editar -->
                        </a>

                        <!-- Botón Eliminar con ícono -->
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-error btn-xs" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">
                                <i class="fas fa-trash-alt"></i> <!-- Ícono de eliminar -->
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

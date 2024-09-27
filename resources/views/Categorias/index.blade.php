@extends('layouts.app')

@section('titulo', 'Listar Categorías')
@section('cabecera', 'Listar Categorías')

@section('contenido')
    {{-- Mostrar mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Botón para crear una categoría nueva --}}
    <div class="flex justify-end m-4">
        <a href="{{ route('categorias.create') }}" class="btn btn-outline btn-sm">Nueva Categoría</a>
    </div>

    {{-- Tabla de categorías --}}
    <div class="overflow-x-auto">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->descripcion }}</td>
                        <td class="flex space-x-2">
                            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning btn-xs">Editar</a>
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error btn-xs"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

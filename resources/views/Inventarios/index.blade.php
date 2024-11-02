@extends('layouts.app')

@section('titulo', 'Listar Inventario')
@section('cabecera', 'Listar Inventario')

@section('contenido')
    {{-- Mostrar mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabla de inventarios --}}
    <div class="overflow-x-auto">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Proveedor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if ($inventarios->isNotEmpty())
                    @foreach ($inventarios as $inventario)
                        <tr>
                            <td>{{ $inventario->id }}</td>
                            <td>{{ $inventario->producto->nombre ?? 'N/A' }}</td>
                            <td>{{ $inventario->cantidad }}</td>
                            <td>{{ $inventario->precio_unitario }}</td>
                            <td>{{ $inventario->proveedor ? $inventario->proveedor->empresa : '' }}</td>
                            <td class="flex space-x-2">
                                <a href="{{ route('inventarios.edit', $inventario->id) }}" class="btn btn-warning btn-xs">Editar</a>
                                <form action="{{ route('inventarios.destroy', $inventario->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error btn-xs" onclick="return confirm('¿Estás seguro de que deseas eliminar este inventario?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center">No hay inventario disponible.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection

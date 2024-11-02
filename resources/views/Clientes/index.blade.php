@extends('layouts.app')

@section('titulo', 'Listar Clientes')
@section('cabecera', 'Listar Clientes')

@section('contenido')
    {{-- Mostrar mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Formulario de búsqueda --}}
    <div class="flex justify-between items-center mb-4">
        <form action="{{ route('clientes.index') }}" method="GET">
            <input type="text" name="search" placeholder="Buscar cliente..." class="input input-bordered"
                   value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline btn-sm">Buscar</button>
        </form>
        <a href="{{ route('clientes.create') }}" class="btn btn-outline btn-sm">Nuevo Cliente</a>
    </div>

    {{-- Tabla de clientes --}}
    <div class="overflow-x-auto">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Correo Electrónico</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->apellidos }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>{{ $cliente->correo_electronico }}</td>
                        <td class="flex space-x-2">
                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-xs">Editar</a>
                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error btn-xs"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este cliente?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

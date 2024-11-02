@extends('layouts.app')

@section('titulo', 'Listar Empleados')
@section('cabecera', 'Listar Empleados')

@section('contenido')
    {{-- Mostrar mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Formulario de búsqueda --}}
    <div class="flex justify-between m-4">
        <div>
            <form action="{{ route('empleados.index') }}" method="GET" class="flex space-x-2">
                <input type="text" name="search" placeholder="Buscar empleado o cargo" value="{{ request('search') }}"
                    class="input input-bordered" />
                <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
            </form>
        </div>
        {{-- Botón para crear un empleado nuevo --}}
        <div>
            <a href="{{ route('empleados.create') }}" class="btn btn-outline btn-sm">Nuevo Empleado</a>
        </div>
    </div>

    {{-- Tabla de empleados --}}
    <div class="overflow-x-auto">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Cargo</th>
                    <th>Teléfono</th>
                    <th>Correo Electrónico</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->id }}</td>
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->apellidos }}</td>
                        <td>{{ $empleado->cargo }}</td>
                        <td>{{ $empleado->telefono }}</td>
                        <td>{{ $empleado->correo_electronico }}</td>
                        <td class="flex space-x-2">
                            <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-warning btn-xs">Editar</a>
                            <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error btn-xs" onclick="return confirm('¿Estás seguro de que deseas eliminar este empleado?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

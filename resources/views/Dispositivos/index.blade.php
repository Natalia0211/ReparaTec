@extends('layouts.app')

@section('titulo', 'Listar Dispositivos')
@section('cabecera', 'Listar Dispositivos')

@section('contenido')
    {{-- Mostrar mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Filtro --}}
    <div class="flex justify-between items-center m-4">
        <form action="{{ route('dispositivos.index') }}" method="GET" class="flex space-x-4">
            <select name="cliente_id" class="select select-bordered">
                <option value="">Seleccionar Cliente</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ request('cliente_id') == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->nombre }}
                    </option>
                @endforeach
            </select>
            <input type="text" name="modelo" placeholder="Buscar por modelo" class="input input-bordered" value="{{ request('modelo') }}">
            <button type="submit" class="btn btn-primary btn-sm">Filtrar</button>
        </form>

        {{-- Botón para crear un dispositivo nuevo --}}
        <a href="{{ route('dispositivos.create') }}" class="btn btn-outline btn-sm">Nuevo Dispositivo</a>
    </div>

    {{-- Tabla de dispositivos --}}
    <div class="overflow-x-auto">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>IMEI</th>
                    <th>ID Cliente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dispositivos as $dispositivo)
                    <tr>
                        <td>{{ $dispositivo->id }}</td>
                        <td>{{ $dispositivo->Marca }}</td>
                        <td>{{ $dispositivo->Modelo }}</td>
                        <td>{{ $dispositivo->IMEI }}</td>
                        <td>{{ $dispositivo->cliente_id }}</td>
                        <td class="flex space-x-2">
                            <a href="{{ route('dispositivos.edit', $dispositivo->id) }}" class="btn btn-warning btn-xs">Editar</a>
                            <form action="{{ route('dispositivos.destroy', $dispositivo->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error btn-xs"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este dispositivo?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

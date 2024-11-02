@extends('layouts.app')

@section('titulo', 'Listar Solicitudes')
@section('cabecera', 'Listar Solicitudes')

@section('contenido')
    {{-- Mostrar mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Botón para crear una nueva solicitud --}}
    <div class="flex justify-end m-4">
        <a href="{{ route('solicituds.create') }}" class="btn btn-outline btn-sm">Nueva Solicitud</a>
    </div>

    {{-- Tabla de solicitudes --}}
    <div class="overflow-x-auto">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Dispositivo</th>
                    <th>Fecha Solicitud</th>
                    <th>Descripción del Problema</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($solicituds as $solicitud)
                    <tr>
                        <td>{{ $solicitud->id }}</td>
                        <td>{{ $solicitud->cliente->nombre }} {{ $solicitud->cliente->apellidos }}</td>
                        <td>{{ $solicitud->dispositivo ? $solicitud->dispositivo->Marca . ' - ' . $solicitud->dispositivo->Modelo : 'No asignado' }}</td>
                        <td>{{ \Carbon\Carbon::parse($solicitud->fecha_solicitud)->format('d/m/Y H:i') }}</td>
                        <td>{{ $solicitud->descripcion_problema }}</td> <!-- Mostrar descripción del problema -->
                        <td>{{ $solicitud->estado }}</td>
                        <td class="flex space-x-2">
                            <a href="{{ route('solicituds.edit', $solicitud->id) }}" class="btn btn-warning btn-xs">Editar</a>
                            <form action="{{ route('solicituds.destroy', $solicitud->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error btn-xs" onclick="return confirm('¿Estás seguro de que deseas eliminar esta solicitud?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

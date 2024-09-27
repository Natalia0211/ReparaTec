@extends('layouts.app')

@section('titulo', 'Listar Facturas')
@section('cabecera', 'Listar Facturas')

@section('contenido')
    {{-- Mostrar mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Botón para crear una nueva factura --}}
    <div class="flex justify-end m-4">
        <a href="{{ route('facturas.create') }}" class="btn btn-outline btn-sm">Nueva Factura</a>
    </div>

    {{-- Tabla de facturas --}}
    <div class="overflow-x-auto">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Solicitud ID</th>
                    <th>Fecha de Emisión</th>
                    <th>Monto Total</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($facturas as $factura)
                    <tr>
                        <td>{{ $factura->id }}</td>
                        <td>{{ $factura->solicitud_id }}</td>
                        <td>{{ $factura->fecha_emision }}</td>
                        <td>{{ number_format($factura->monto_total, 2) }}</td>
                        <td>{{ $factura->estado }}</td>
                        <td class="flex space-x-2">
                            <a href="{{ route('facturas.edit', $factura->id) }}" class="btn btn-warning btn-xs">Editar</a>
                            <form action="{{ route('facturas.destroy', $factura->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error btn-xs"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar esta factura?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

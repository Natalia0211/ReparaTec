@extends('layouts.app')

@section('titulo', 'Listar Pagos')
@section('cabecera', 'Listar Pagos')

@section('contenido')
    {{-- Mostrar mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Botón registrar nuevo pago --}}
    <div class="flex justify-end m-4">
        <a href="{{ route('pagos.create') }}" class="btn btn-outline btn-sm">Agregar Pago</a>
    </div>

    {{-- Tabla de pagos --}}
    <div class="overflow-x-auto">
        <table class="table table-zebra w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Factura ID</th>
                    <th>Fecha de Pago</th>
                    <th>Método de Pago</th>
                    <th>Monto de Pago</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pagos as $pago)
                    <tr>
                        <td>{{ $pago->id }}</td>
                        <td>{{ $pago->factura_id }}</td>
                        <td>{{ \Carbon\Carbon::parse ($pago->fecha_pago)->format('Y-m-d H:i:s') }}</td>
                        <td>{{ $pago->metodo_pago }}</td>
                        <td>${{ number_format($pago->monto_pago, 2) }}</td>
                        <td class="flex space-x-2">
                            <a href="{{ route('pagos.edit', $pago->id) }}" class="btn btn-warning btn-xs">Editar</a>
                            <form action="{{ route('pagos.destroy', $pago->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error btn-xs"
                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este pago?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

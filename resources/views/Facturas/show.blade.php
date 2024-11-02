@extends('layouts.app')

@section('titulo', 'Detalles de la Factura')
@section('cabecera', 'Detalles de la Factura')

@section('contenido')
    <div class="m-4">
        <h2>Factura ID: {{ $factura->id }}</h2>
        <p><strong>Solicitud ID:</strong> {{ $factura->solicitud_id }}</p>
        <p><strong>Fecha de Emisión:</strong> {{ $factura->fecha_emision }}</p>
        <p><strong>Monto Total:</strong> {{ number_format($factura->monto_total, 2) }}</p>
        <p><strong>Estado:</strong> {{ $factura->estado }}</p>
        
        {{-- Botón para imprimir o descargar la factura --}}
        <div class="mt-4">
            <a href="{{ route('facturas.generatePDF', $factura->id) }}" class="btn btn-primary">Descargar Factura</a>
            <button class="btn btn-secondary" onclick="window.print()">Imprimir Factura</button>
            <a href="{{ route('facturas.index') }}" class="btn btn-secondary">Volver a la lista</a>
        </div>        
    </div>
@endsection

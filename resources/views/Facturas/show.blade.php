@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Detalles de la Factura</h1>

    <h2>Información de la Factura</h2>
    <p><strong>ID Factura:</strong> {{ $factura->id }}</p>
    <p><strong>Fecha de Emisión:</strong> {{ $factura->fecha_emision }}</p>
    <p><strong>Monto Total:</strong> {{ $factura->monto_total }}</p>
    <p><strong>Estado:</strong> {{ $factura->estado }}</p>

    <h2>Información del Cliente</h2>
    @if($factura->solicitud && $factura->solicitud->cliente)
        <p><strong>Nombre:</strong> {{ $factura->solicitud->cliente->nombre }}</p>
        <p><strong>Email:</strong> {{ $factura->solicitud->cliente->correo_electronico }}</p>
    @else
        <p>No se encontró información del cliente.</p>
    @endif

    <h2>Información del Dispositivo</h2>
    @if($factura->solicitud && $factura->solicitud->dispositivo)
        <p><strong>Marca:</strong> {{ $factura->solicitud->dispositivo->marca }}</p>
        <p><strong>Modelo:</strong> {{ $factura->solicitud->dispositivo->modelo }}</p>
    @else
        <p>No se encontró información del dispositivo.</p>
    @endif

    <h2>Detalles de la Reparación</h2>
    @if($factura->reparacion)
        <p><strong>Descripción:</strong> {{ $factura->reparacion->descripcion }}</p>
        <p><strong>Costo:</strong> {{ $factura->reparacion->costo }}</p>
    @else
        <p>No se encontraron detalles de la reparación.</p>
    @endif


</div>

@endsection

<!DOCTYPE html>
<html>
<head>
    <title>Factura {{ $factura->id }}</title>
</head>
<body>
    <div class="container">
        <h1>Factura ID: {{ $factura->id }}</h1>
        <p><strong>Fecha de Emisión:</strong> {{ $factura->fecha_emision }}</p>
        <p><strong>Monto Total:</strong> ${{ number_format($factura->monto_total, 2) }}</p>
        <p><strong>Estado:</strong> {{ $factura->estado }}</p>

        <hr>

        <h3>Detalles del Cliente</h3>
        @if ($factura->solicitud && $factura->solicitud->cliente)
            <p><strong>Nombre:</strong> {{ $factura->solicitud->cliente->nombre }} {{ $factura->solicitud->cliente->apellidos }}</p>
            <p><strong>Teléfono:</strong> {{ $factura->solicitud->cliente->telefono }}</p>
            <p><strong>Email:</strong> {{ $factura->solicitud->cliente->correo_electronico }}</p>
        @else
            <p>No hay información del cliente disponible.</p>
        @endif

        <hr>

        <h3>Detalles del Dispositivo</h3>
        @if ($factura->solicitud && $factura->solicitud->dispositivo)
            <p><strong>Marca:</strong> {{ $factura->solicitud->dispositivo->marca }}</p>
            <p><strong>Modelo:</strong> {{ $factura->solicitud->dispositivo->modelo }}</p>
            <p><strong>IMEI:</strong> {{ $factura->solicitud->dispositivo->imei }}</p>
        @else
            <p>No hay información del dispositivo disponible.</p>
        @endif

        <hr>

        <h3>Detalles de la Reparación</h3>
        @if ($factura->solicitud)
            <p><strong>Fecha de Solicitud:</strong> {{ $factura->solicitud->fecha_solicitud }}</p>
            @if ($factura->reparacion && $factura->reparacion->empleado)
                <p><strong>Empleado que Realizó la Reparación:</strong> {{ $factura->reparacion->empleado->nombre }} {{ $factura->reparacion->empleado->apellidos }}</p>
                <p><strong>Costo de Reparación:</strong> ${{ number_format($factura->reparacion->costo_reparacion, 2) }}</p>
            @else
                <p>No hay información de la reparación disponible.</p>
            @endif
        @else
            <p>No hay información de la solicitud disponible.</p>
        @endif

    </div>
</body>
</html>

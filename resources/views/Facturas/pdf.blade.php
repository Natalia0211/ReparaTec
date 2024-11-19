<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <!-- Tailwind CSS desde un CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">
    <div class="max-w-4xl mx-auto p-6 border rounded-lg shadow-lg bg-gray-50">
        <h1 class="text-2xl font-bold text-gray-800">Factura #{{ $factura->id }}</h1>
        <p class="text-gray-600">Fecha de Emisión: {{ $factura->fecha_emision }}</p>

        <h2 class="mt-6 text-xl font-semibold">Información del Cliente</h2>
        <div class="p-4 bg-white border rounded-lg shadow">
            <p><strong>Nombre:</strong> {{ $factura->solicitud->cliente->nombre }}</p>
            <p><strong>Email:</strong> {{ $factura->solicitud->cliente->correo_electronico }}</p>
        </div>

        <h2 class="mt-6 text-xl font-semibold">Información del Dispositivo</h2>
        <div class="p-4 bg-white border rounded-lg shadow">
            <p><strong>Marca:</strong> {{ $factura->solicitud->dispositivo->marca }}</p>
            <p><strong>Modelo:</strong> {{ $factura->solicitud->dispositivo->modelo }}</p>
        </div>

        <h2 class="mt-6 text-xl font-semibold">Detalles de la Reparación</h2>
        <div class="p-4 bg-white border rounded-lg shadow">
            @if($factura->reparacion)
                <p><strong>Costo:</strong> ${{ $factura->reparacion->costo_reparacion }}</p>
            @else
                <p>No se encontraron detalles de la reparación.</p>
            @endif
        </div>

    </div>
</body>
</html>

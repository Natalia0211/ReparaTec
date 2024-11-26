<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura #{{ $factura->id }}</title>
    <!-- Tailwind CSS desde un CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto p-6 border rounded-lg shadow-lg bg-white">
        <!-- Título de la Factura -->
        <h1 class="text-2xl font-bold text-gray-800">Factura #{{ $factura->id }}</h1>
        <p class="text-gray-600">Fecha de Emisión: {{ $factura->fecha_emision }}</p>

        <!-- Información del Cliente -->
        <h2 class="mt-6 text-xl font-semibold">Información del Cliente</h2>
        <div class="p-4 bg-white border rounded-lg shadow">
            <p><strong>Nombre:</strong> {{ $factura->solicitud->cliente->nombre }} {{ $factura->solicitud->cliente->apellidos }}</p>
            <p><strong>Teléfono:</strong> {{ $factura->solicitud->cliente->telefono }}</p>
            <p><strong>Email:</strong> {{ $factura->solicitud->cliente->correo_electronico }}</p>
        </div>

        <!-- Información del Dispositivo -->
        <h2 class="mt-6 text-xl font-semibold">Información del Dispositivo</h2>
        <div class="p-4 bg-white border rounded-lg shadow">
            <p><strong>Marca:</strong> {{ $factura->solicitud->dispositivo->Marca }}</p>
            <p><strong>Modelo:</strong> {{ $factura->solicitud->dispositivo->Modelo }}</p>
            <p><strong>IMEI:</strong> {{ $factura->solicitud->dispositivo->IMEI }}</p>
        </div>

        <!-- Detalles de la Reparación -->
        <h2 class="mt-6 text-xl font-semibold">Detalles de la Reparación</h2>
        <div class="p-4 bg-white border rounded-lg shadow">
            @if($factura->solicitud->reparacion)
                <p><strong>Descripción:</strong> {{ $factura->solicitud->descripcion_problema }}</p>
                <p><strong>Costo:</strong> ${{ $factura->solicitud->reparacion->costo_reparacion }}</p>
            @else
                <p>No se encontraron detalles de la reparación.</p>
            @endif
        </div>

        <!-- Detalles de los Productos/Servicios -->
        <div class="mt-6">
            <table class="w-full text-sm text-left text-gray-600 border-collapse border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">Descripción</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Cantidad</th>
                        <th class="border border-gray-300 px-4 py-2 text-right">Precio Unitario</th>
                        <th class="border border-gray-300 px-4 py-2 text-right">Monto</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">Reparación</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">1</td>
                        <td class="border border-gray-300 px-4 py-2 text-right">$560.00</td>
                        <td class="border border-gray-300 px-4 py-2 text-right">$560.00</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">Descuento</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">1</td>
                        <td class="border border-gray-300 px-4 py-2 text-right">-$30.00</td>
                        <td class="border border-gray-300 px-4 py-2 text-right">-$30.00</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Totales -->
        <div class="mt-6 flex justify-end">
            <div class="w-full max-w-xs">
                <div class="flex justify-between border-t pt-2">
                    <span class="text-gray-700">Subtotal:</span>
                    <span class="font-semibold">$680.00</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-700">Impuestos (3.8%):</span>
                    <span class="font-semibold">$25.84</span>
                </div>
                <div class="flex justify-between border-t border-gray-500 pt-2">
                    <span class="text-gray-800 font-bold">Total:</span>
                    <span class="font-bold text-gray-800">$705.84</span>
                </div>
            </div>
        </div>

        <!-- Pie de página -->
        <div class="mt-6 text-center text-sm text-gray-600">
            <p>Si tiene preguntas relacionadas con esta factura, póngase en contacto con nosotros.</p>
            <p>ReparaTec, (321) 456-7890, serviciotecnico@reparatec.com</p>
        </div>
    </div>
</body>
</html>

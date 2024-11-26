<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class FacturaController extends Controller
{
    // Mostrar una lista de facturas
    public function index()
    {
        $facturas = Factura::all(); // Obtener todas las facturas
        return view('facturas.index', compact('facturas'));
    }

    // Mostrar el formulario para crear una nueva factura
    public function create()
    {
        return view('facturas.create');
    }

    // Almacenar una nueva factura en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'solicitud_id' => 'required|integer',
            'fecha_emision' => 'required|date',
            'monto_total' => 'required|numeric',
            'estado' => 'required|string|max:255',
        ]);

        Factura::create($request->all());

        return redirect()->route('facturas.index')->with('success', 'Factura creada exitosamente.');
    }

    // Mostrar detalles de una factura específica
    public function show($id)
    {
        // Cargar factura con sus relaciones
        $factura = Factura::with(['solicitud.cliente', 'solicitud.dispositivo','solicitud.reparacion'])->findOrFail($id);
        
        return view('facturas.show', compact('factura'));
    }

    // Método para generar el PDF de una factura
    public function generatePDF($id)
    {
        // Cargar la factura con sus relaciones
        $factura = Factura::with(['solicitud', 'solicitud.reparacion'])->findOrFail($id);

        // Generar el PDF utilizando la vista 'facturas.pdf'
        $pdf = Pdf::loadView('facturas.pdf', compact('factura'));

        // Descargar el PDF
        return $pdf->download('factura_' . $factura->id . '.pdf');
    }

    // Mostrar el formulario para editar una factura específica
    public function edit(Factura $factura)
    {
        return view('facturas.edit', compact('factura'));
    }

    // Actualizar una factura específica en la base de datos
    public function update(Request $request, Factura $factura)
    {
        $request->validate([
            'fecha_emision' => 'required|date',
            'monto_total' => 'required|numeric',
            'estado' => 'required|string|max:255',
        ]);

        $factura->update($request->all());

        return redirect()->route('facturas.index')->with('success', 'Factura actualizada exitosamente.');
    }

    // Eliminar una factura específica de la base de datos
    public function destroy(Factura $factura)
    {
        $factura->delete();

        return redirect()->route('facturas.index')->with('success', 'Factura eliminada exitosamente.');
    }
}
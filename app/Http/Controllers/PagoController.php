<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    // Mostrar la lista de pagos
    public function index()
    {
        $pagos = Pago::all();
        return view('pagos.index', compact('pagos'));
    }

    // Mostrar el formulario para crear un nuevo pago
    public function create()
    {
        return view('pagos.create');
    }

    // Almacenar un nuevo pago
    public function store(Request $request)
    {
        $request->validate([
            'factura_id' => 'required|integer',
            'fecha_pago' => 'required|date',
            'metodo_pago' => 'required|string|max:255',
            'monto_pago' => 'required|numeric|min:0',
        ]);

        Pago::create($request->all());

        return redirect()->route('pagos.index')->with('success', 'Pago creado exitosamente.');
    }

    // Mostrar el formulario para editar un pago existente
    public function edit(Pago $pago)
    {
        return view('pagos.edit', compact('pago'));
    }

    // Actualizar un pago existente
    public function update(Request $request, Pago $pago)
    {
        $request->validate([
            'factura_id' => 'required|integer',
            'fecha_pago' => 'required|date',
            'metodo_pago' => 'required|string|max:255',
            'monto_pago' => 'required|numeric|min:0',
        ]);

        $pago->update($request->all());

        return redirect()->route('pagos.index')->with('success', 'Pago actualizado exitosamente.');
    }

    // Eliminar un pago existente
    public function destroy(Pago $pago)
    {
        $pago->delete();
        return redirect()->route('pagos.index')->with('success', 'Pago eliminado exitosamente.');
    }
}
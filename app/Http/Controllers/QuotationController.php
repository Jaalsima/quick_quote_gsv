<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotation;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quotations = Quotation::all();
        return view('quotation.index', compact('quotations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quotation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario, esto dependerá de tus requisitos
        $validatedData = $request->validate([
            // Especifica las reglas de validación aquí
        ]);

        // Crear la cotización en la base de datos
        $quotation = Quotation::create($validatedData);

        // Redireccionar a la vista de detalles de la cotización recién creada
        return redirect()->route('quotations.show', ['id' => $quotation->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quotation = Quotation::findOrFail($id);
        return view('quotation.show', compact('quotation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $quotation = Quotation::findOrFail($id);
        return view('quotation.edit', compact('quotation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario, esto dependerá de tus requisitos
        $validatedData = $request->validate([
            // Especifica las reglas de validación aquí
        ]);

        // Actualizar la cotización en la base de datos
        $quotation = Quotation::findOrFail($id);
        $quotation->update($validatedData);

        // Redireccionar a la vista de detalles de la cotización actualizada
        return redirect()->route('quotations.show', ['id' => $quotation->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Eliminar la cotización de la base de datos
        $quotation = Quotation::findOrFail($id);
        $quotation->delete();

        // Redireccionar a la lista de cotizaciones
        return redirect()->route('quotations.index');
    }
}

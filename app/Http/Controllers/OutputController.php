<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Output;
use App\Models\Product;

class OutputController extends Controller {
    // GET all outputs
    public function index() {
        $outputs = Output::with(['project', 'product'])->latest()->get();
        return response()->json($outputs);
    }

    // GET a single output by id
    public function show($id) {
        $output = Output::with(['project', 'product'])->find($id);
        if (!$output) {
            return response()->json(['message' => 'Output not found'], 404);
        }
        return response()->json($output);
    }

    // POST a new output
    public function store(Request $request) {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'product_id' => 'required|exists:products,id',
            'responsible' => 'required|string|max:100',
            'quantity' => 'required|integer',
            'description' => 'nullable|string|max:100',
            'date' => 'required|date'
        ]);

        // Buscar el producto
        $product = Product::findOrFail($request->product_id);

        // Verificar si hay suficiente cantidad disponible
        if ($product->quantity < $request->quantity) {
            return response()->json(['error' => 'No hay suficiente cantidad disponible.'], 400);
        }

        // Deducción de la cantidad en la tabla de productos
        $product->quantity -= $request->quantity;
        $product->save();

        // Crear la salida en la tabla de salidas
        $output = Output::create($request->all());

        return response()->json($output, 201);
    }
}

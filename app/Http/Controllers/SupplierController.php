<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    // GET all suppliers
    public function index()
    {
        $suppliers = Supplier::all();
        return response()->json($suppliers);
    }

    // GET a single supplier by id
    public function show($id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            return response()->json(['message' => 'Supplier not found'], 404);
        }
        return response()->json($supplier);
    }

    // POST a new supplier
    public function store(Request $request)
    {
        $request->validate([
            'article' => 'required|string|max:255',
            'price' => 'required|numeric',
            'company' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255'
        ]);

        $supplier = Supplier::create($request->all());
        return response()->json($supplier, 201);
    }

    // PUT or PATCH update a supplier
    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            return response()->json(['message' => 'Supplier not found'], 404);
        }

        $request->validate([
            'article' => 'string|max:255',
            'price' => 'numeric',
            'company' => 'string|max:255',
            'phone' => 'string|max:255',
            'email' => 'email|max:255'
        ]);

        $supplier->update($request->all());
        return response()->json($supplier);
    }

    // DELETE a supplier
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            return response()->json(['message' => 'Supplier not found'], 404);
        }
        $supplier->delete();
        return response()->json(['message' => 'Supplier deleted successfully']);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrance;

class EntranceController extends Controller
{
    // GET all entrances
    public function index()
    {
        $entrances = Entrance::with(['project', 'product'])->get();
        return response()->json($entrances);
    }

    // GET a single entrance by id
    public function show($id)
    {
        $entrance = Entrance::with(['project', 'product'])->find($id);
        if (!$entrance) {
            return response()->json(['message' => 'Entrance not found'], 404);
        }
        return response()->json($entrance);
    }

    // POST a new entrance
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'product_id' => 'required|exists:products,id',
            'responsible' => 'required|string|max:100',
            'quantity' => 'required|integer',
            'description' => 'nullable|string|max:100',
            'date' => 'required|date_format:Y-m-d H:i:s'
        ]);

        $entrance = Entrance::create($request->all());
        return response()->json($entrance, 201);
    }

}

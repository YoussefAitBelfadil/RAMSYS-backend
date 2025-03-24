<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mouse;
use Exception;
use Illuminate\Database\QueryException;

class MiceController extends Controller
{
    public function index()
    {
        $laptops = Mouse::all();
        return response()->json($laptops);
    }


    public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'processor' => 'required|string|max:255',
            'ram' => 'required|integer|min:1',
            'storage' => 'required|string|max:255',
        ]);

        Mouse::create($validatedData);

        return response()->json(['message' => 'Laptop added successfully'], 201);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'message' => 'Validation failed',
            'errors' => $e->errors()
        ], 422);

    } catch (QueryException $e) {
        return response()->json([
            'message' => 'Database error',
            'error' => $e->getMessage()
        ], 500);

    } catch (Exception $e) {
        return response()->json([
            'message' => 'Something went wrong',
            'error' => $e->getMessage()
        ], 500);
    }
}


    public function show(string $id)
    {
        $laptop = Mouse::findOrFail($id);
        return response()->json($laptop);
    }

    public function update(Request $request, string $id)
    {
        $laptop = Mouse::findOrFail($id);

        $request->validate([
            'brand' => 'sometimes|string',
            'model' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'specifications' => 'sometimes|string',
        ]);

        $laptop->update($request->all());
        return response()->json($laptop);
    }
}

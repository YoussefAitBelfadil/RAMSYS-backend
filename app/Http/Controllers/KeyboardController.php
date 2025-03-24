<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keyboard;
use Exception;
use Illuminate\Database\QueryException;

class KeyboardController extends Controller
{
    public function index()
    {
        $laptops = Keyboard::all();
        return response()->json($laptops);
    }


    public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type'=> 'required|string|max:255',
            'Marque'=> 'required|string|max:255',
            'Norme_du_clavier'=> 'required|string|max:255',
            'Liaison'=> 'required|in:Avec_fil,Sans_fil',
            'Poids'=> 'required|integer|min:1',
            'Clavier_rétroéclairé'=> 'required|in:OUI, NON',
            'Clavier_numérique'=> 'required|in:OUI, NON',
            'Prix'=> 'required|numeric',
            'Quantité_en_stock'=> 'required|integer|min:1',
            'Description'=> 'required|string|min:25',
            'Image'=> 'required|image|mimes:jpg,jpeg,png,gif|max:8,192',
        ]);

        Keyboard::create($validatedData);

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
        $laptop = Keyboard::findOrFail($id);
        return response()->json($laptop);
    }

    public function update(Request $request, string $id)
    {
        $laptop = Keyboard::findOrFail($id);

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


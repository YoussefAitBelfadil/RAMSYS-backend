<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Stockage;
use Exception;
use Illuminate\Database\QueryException;

class StockageController extends Controller
{
    public function index()
    {
        $laptops = Stockage::all();
        return response()->json($laptops);
    }


    public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'type'=> 'required|string|max:255',
            'Sous-catégories'=>  'required|in:Disque_dur_portable,Disque_dur_interne,Clé_USB, Carte_mémoire',
            'name' => 'required|string|max:255',
            'Marque'=> 'required|string|max:255',
            'Prix'=> 'required|numeric',
            'Quantité_en_stock'=> 'required|integer|min:1',
            'Description'=> 'required|string|min:25',
            'Image'=> 'required|image|mimes:jpg,jpeg,png,gif|max:8,192',
        ]);

        Stockage::create($validatedData);

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
        $laptop = Stockage::findOrFail($id);
        return response()->json($laptop);
    }

    public function update(Request $request, string $id)
    {
        $laptop = Stockage::findOrFail($id);

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

<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Laptop;
use Exception;
use Illuminate\Database\QueryException;

class LaptopController extends Controller
{
    public function index()
    {
        $laptops = Laptop::all();
        return response()->json($laptops);
    }


    public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'type'=> 'required|string|max:255',
            'name'=> 'required|string|max:255',
            'Sous-catégories'=>  'required|in:PC_portable,PC_portable_gamer, PC_de_bureau',
            'Marque'=> 'required|string|max:100',
            'processor'=> 'required|string|max:255',
            'ram'=> 'required|integer|min:1',
            'rom'=> 'required|integer|min:1',
            'Carte_graphique'=> 'required|string|max:255',
            'Poids'=> 'required|integer|min:1',
            'Taille_écran'=> 'required|string|max:255',
            'Couleur'=> 'required|string|max:255',
            'Dimensions'=> 'required|string|max:255',
            'Type_de_batterie'=> 'required|string|max:255',
            'Système_exploitation'=> 'required|string|max:255',
            'Prix'=> 'required|numeric',
            'Quantité_en_stock'=> 'required|integer|min:1',
            'Description'=> 'required|string|min:25',
            'Image'=> 'required|image|mimes:jpg,jpeg,png,gif|max:8,192',
        ]);

        Laptop::create($validatedData);

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
        $laptop = Laptop::findOrFail($id);
        return response()->json($laptop);
    }

    public function update(Request $request, string $id)
    {
        $laptop = Laptop::findOrFail($id);

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

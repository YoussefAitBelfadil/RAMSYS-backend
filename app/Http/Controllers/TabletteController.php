<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tablette;
use Exception;
use Illuminate\Database\QueryException;

class TabletteController extends Controller
{
    public function index()
    {
        $laptops = Tablette::all();
        return response()->json($laptops);
    }


    public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            "type"=> "required|string|max:255",
            'name' => 'required|string|max:255',
            'Marque'=> 'required|string|max:255',
            'Taille_de_la_tablette'=> 'required|string|max:255',
            'Surface_active'=> 'required|string|max:255',
            'Touches/Bouton'=> 'required|string|max:255',
            'Niveaux_de_pression'=> 'required|string|max:255',
            'Connectivité'=> 'required|string|max:255',
            'Poids'=> 'required|integer|min:1',
            'Résolution'=> 'required|string|max:255',
            'Stylet'=> 'required|string|max:255',
            'Vitesse_de_lecture'=> 'required|string|max:255',
            'Câble_fourni'=> 'required|string|max:255',
            'Batterie'=> 'required|string|max:255',
            'Durée_de_fonctionnement'=> 'required|string|max:255',
            'Ergonomie'=> 'required|string|max:255',
            'Saisie_multi-touch'=> 'required|string|max:255',
            'Prix'=> 'required|numeric',
            'Quantité_en_stock'=> 'required|integer|min:1',
            'Description'=> 'required|string|min:25',
            'Image'=> 'required|image|mimes:jpg,jpeg,png,gif|max:8,192',



        ]);

        Tablette::create($validatedData);

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
        $laptop = Tablette::findOrFail($id);
        return response()->json($laptop);
    }

    public function update(Request $request, string $id)
    {
        $laptop = Tablette::findOrFail($id);

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

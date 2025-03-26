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
            'Sous_catégories'=>  'required|in:PC_portable,PC_portable_gamer,PC_de_bureau',
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
            'Image'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
        ]);

        $imageUrl = null;
        if ($request->hasFile('Image')) {
            $image = $request->file('Image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->storeAs('public/images', $imageName);

            $imageUrl = asset('storage/images/' . $imageName);
        }


        $laptop = Laptop::create([
            'type' => $request->input('type'),
            'name' => $request->input('name'),
            'Sous_catégories' => $request->input('Sous_categorie'),
            'Marque' => $request->input('Marque'),
            'processor' => $request->input('processor'),
            'ram' => $request->input('ram'),
            'rom' => $request->input('rom'),
            'Carte_graphique' => $request->input('Carte_graphique'),
            'Poids' => $request->input('Poids'),
            'Taille_écran' => $request->input('Taille_écran'),
            'Couleur' => $request->input('Couleur'),
            'Dimensions' => $request->input('Dimensions'),
            'Type_de_batterie' => $request->input('Type_de_batterie'),
            'Système_exploitation' => $request->input('Système_exploitation'),
            'Prix' => $request->input('Prix'),
            'Quantité_en_stock' => $request->input('Quantité_en_stock'),
            'Description' => $request->input('Description'),
            'Image' => $imageUrl,
        ]);

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

    // Validate request data
    $validatedData = $request->validate([
        'type'=> 'required|string|max:255',
        'name'=> 'required|string|max:255',
        'Sous_catégories'=> 'required|in:PC_portable,PC_portable_gamer,PC_de_bureau',
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
        'Image'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:8192',
    ]);

    if ($request->hasFile('Image')) {
        $imagePath = $request->file('Image')->store('laptops', 'public');
        $validatedData['Image'] = $imagePath;
    }

    $laptop->update($validatedData);

    return response()->json($laptop);
}

}

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
            'Image2'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
            'Image3'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
            'Image4'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
            'Image5'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
        ]);

        $imageUrls = [];

foreach (['Image', 'Image2', 'Image3', 'Image4','Image5'] as $imageField) {
    $imageUrl = null;
    if ($request->hasFile($imageField)) {
        $image = $request->file($imageField);
        $imageName = time() . '-' . $imageField . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);
        $imageUrl = asset('storage/images/' . $imageName);
    }
    $imageUrls[$imageField] = $imageUrl;
}



        Laptop::create([
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
            'Image'=> $imageUrls['Image'],
            'Image2'=> $imageUrls['Image2'],
            'Image3'=> $imageUrls['Image3'],
            'Image4'=> $imageUrls['Image4'],
            'Image5'=> $imageUrls['Image5'],
        ]);

        return redirect()->back()->with('success', 'Le produit a été ajouté avec succès.');

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
        'Image'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
    ]);

    if ($request->hasFile('Image')) {
        $imagePath = $request->file('Image')->store('laptops', 'public');
        $validatedData['Image'] = $imagePath;
    }

    $laptop->update($validatedData);

    return response()->json($laptop);
}

}

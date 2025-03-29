<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tablette;
use Exception;
use Illuminate\Database\QueryException;

class TabletteController extends Controller
{

    public function show($id)
    {
        try {
            $laptop = Tablette::with(['brand', 'specifications'])
                ->findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $this->transformLaptop($laptop)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Laptop not found'
            ], 404);
        }
    }


    public function product()
    {
        return response()->json(Tablette::limit(10)->get()); // Fetch only 10 products
    }

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


        $tablette = Tablette::create([
            "type"=> $request->input('type'),
            'name' => $request->input('name'),
            'Marque'=> $request->input("Marque"),
            'Taille_de_la_tablette'=> $request->input("Taille_de_la_tablette"),
            'Surface_active'=> $request->input('Surface_active'),
            'Touches/Bouton'=> $request->input('Touches/Bouton'),
            'Niveaux_de_pression'=> $request->input('Niveaux_de_pression'),
            'Connectivité'=> $request->input('Connectivité'),
            'Poids'=> $request->input('Poids'),
            'Résolution'=> $request->input('Résolution'),
            'Stylet'=> $request->input('Stylet'),
            'Vitesse_de_lecture'=> $request->input('Vitesse_de_lecture'),
            'Câble_fourni'=> $request->input('Câble_fourni'),
            'Batterie'=> $request->input('Batterie'),
            'Durée_de_fonctionnement'=> $request->input('Durée_de_fonctionnement'),
            'Ergonomie'=> $request->input('Ergonomie'),
            'Saisie_multi-touch'=> $request->input('Saisie_multi-touch'),
            'Prix'=> $request->input('Prix'),
            'Quantité_en_stock'=> $request->input('Quantité_en_stock'),
            'Description'=> $request->input('Description'),
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


    

    public function update(Request $request, string $id)
    {
        $tablette = Tablette::findOrFail($id);

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
            'Image'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
        ]);

        if ($request->hasFile('Image')) {
            $imagePath = $request->file('Image')->store('laptops', 'public');
            $validatedData['Image'] = $imagePath;
        }

        $tablette->update($validatedData);
        return response()->json($tablette);
    }
}

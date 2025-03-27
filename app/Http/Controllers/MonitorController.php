<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Monitor;
use Exception;
use Illuminate\Database\QueryException;

class MonitorController extends Controller
{

    public function product()
    {
        return response()->json(data: Monitor::limit(10)->get()); // Fetch only 10 products
    }

    public function index()
    {
        $laptops = Monitor::all();
        return response()->json($laptops);
    }


    public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'type'=> 'required|string|max:255',
            'name'=> 'required|string|max:255',
            'Taille_écran'=> 'required|string|max:255',
            'Surface_active'=> 'required|string|max:255',
            'Luminosité'=> 'required|string|max:255',
            'Résolution'=> 'required|string|max:255',
            'Temps_de_réponse'=> 'required|numeric',
            'Connectivité'=> 'required|string|max:255',
            'Dimensions'=> 'required|string|max:255',
            'Poids'=> 'required|numeric',
            'Consommation_normale'=> 'required|string|max:255',
            'Courbure_écran'=> 'required|string|max:255',
            'Marque'=> 'required|string|max:255',
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

        Monitor::create([
            'type'=> $request->input('type'),
            'name'=> $request->input('name'),
            'Taille_écran'=> $request->input('Taille_écran'),
            'Surface_active'=> $request->input('Surface_active'),
            'Luminosité'=> $request->input('Luminosité'),
            'Résolution'=> $request->input('Résolution'),
            'Temps_de_réponse'=> $request->input('Temps_de_réponse'),
            'Connectivité'=> $request->input('Connectivité'),
            'Dimensions'=> $request->input('Dimensions'),
            'Poids'=> $request->input('Poids'),
            'Consommation_normale'=> $request->input('Consommation_normale'),
            'Courbure_écran'=> $request->input('Courbure_écran'),
            'Marque'=> $request->input('Marque'),
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


    public function show(string $id)
    {
        $monitor = Monitor::findOrFail($id);
        return response()->json($monitor);
    }

    public function update(Request $request, string $id)
    {
        $monitor = Monitor::findOrFail($id);

        $validatedData = $request->validate([
            'type'=> 'required|string|max:255',
            'name'=> 'required|string|max:255',
            'Taille_écran'=> 'required|string|max:255',
            'Surface_active'=> 'required|string|max:255',
            'Luminosité'=> 'required|string|max:255',
            'Résolution'=> 'required|string|max:255',
            'Temps_de_réponse'=> 'required|numeric',
            'Connectivité'=> 'required|string|max:255',
            'Dimensions'=> 'required|string|max:255',
            'Poids'=> 'required|numeric',
            'Consommation_normale'=> 'required|string|max:255',
            'Courbure_écran'=> 'required|string|max:255',
            'Marque'=> 'required|string|max:255',
            'Prix'=> 'required|numeric',
            'Quantité_en_stock'=> 'required|integer|min:1',
            'Description'=> 'required|string|min:25',
            'Image'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
        ]);

        $monitor->update($validatedData);
        return response()->json($monitor);
    }
}

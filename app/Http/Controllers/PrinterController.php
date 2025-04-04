<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Printer;
use Cloudinary\Cloudinary;
use Exception;
use Illuminate\Database\QueryException;

class PrinterController extends Controller
{

    public function show($id)
    {
        try {
            $laptop = Printer::with(['brand', 'specifications'])
                ->findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $this->transformLaptop($laptop)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Printer not found'
            ], 404);
        }
    }

    public function product()
    {
        return response()->json(Printer::limit(10)->get());
    }



    public function index()
    {
        $laptops = Printer::all();
        return response()->json($laptops);
    }


    public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'type'=> 'required|string|max:255',
            'name'=> 'required|string|max:255',
            'Marque'=> 'required|string|max:100',
            'Fonctions'=> 'required|string|max:255',
            'Cartouches_impression'=> 'required|string|max:255',
            'Vitesse_impression_noir'=> 'required|string|max:255',
            'Vitesse_impression_couleur'=> 'required|string|max:255',
            'Qualité_impression_noire'=> 'required|string|max:255',
            'Qualité_impression_couleur'=> 'required|string|max:255',
            'Écran'=> 'required|string|max:255',
            'Connectivité'=> 'required|string|max:255',
            'Impression_recto_verso'=> 'required|string|max:255',
            'Capacité_bac_papier'=> 'required|string|max:255',
            'Dimensions'=> 'required|string|max:255',
            'Poids'=> 'required|integer|min:1',
            'Photocopieur'=>  'required|in:OUI,NON',
            'Câble_fourni'=>  'required|in:OUI,NON',
            'Prix'=> 'required|numeric',
            'Quantité_en_stock'=> 'required|integer|min:1',
            'Description'=> 'required|string|min:25',
            'Image'=> 'required|image|mimes:jpg,jpeg,png,gif|max:10240',
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

        $printerData = array_merge($validatedData, $imageUrls);
        $printer = Printer::create($printerData);

        return redirect()->back()->with('success', 'L\'imprimante a été ajouté avec succès.');

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
        $printer= Printer::findOrFail($id);

        $validatedData = $request->validate([
            'type'=> 'required|string|max:255',
            'name'=> 'required|string|max:255',
            'Marque'=> 'required|string|max:100',
            'Fonctions'=> 'required|string|max:255',
            'Cartouches_impression'=> 'required|string|max:255',
            'Vitesse_impression_noir'=> 'required|string|max:255',
            'Vitesse_impression_couleur'=> 'required|string|max:255',
            'Qualité_impression_noire'=> 'required|string|max:255',
            'Qualité_impression_couleur'=> 'required|string|max:255',
            'Écran'=> 'required|string|max:255',
            'Connectivité'=> 'required|string|max:255',
            'Impression_recto_verso'=> 'required|string|max:255',
            'Capacité_bac_papier'=> 'required|string|max:255',
            'Dimensions'=> 'required|string|max:255',
            'Poids'=> 'required|integer|min:1',
            'Photocopieur'=>  'required|in:OUI,NON',
            'Câble_fourni'=>  'required|in:OUI,NON',
            'Prix'=> 'required|numeric',
            'Quantité_en_stock'=> 'required|integer|min:1',
            'Description'=> 'required|string|min:25',
            'Image'=> 'required|image|mimes:jpg,jpeg,png,gif|max:10240',
            'Image2'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
            'Image3'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
            'Image4'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
            'Image5'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
        ]);

        if ($request->hasFile('Image')) {
            $imagePath = $request->file('Image')->store('laptops', 'public');
            $validatedData['Image'] = $imagePath;
        }


        $printer->update($validatedData);
        return response()->json($printer);
    }
}

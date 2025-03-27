<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Printer;
use Exception;
use Illuminate\Database\QueryException;

class PrinterController extends Controller
{
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
            'Impression_recto/verso'=> 'required|string|max:255',
            'Capacité_bac_papier'=> 'required|string|max:255',
            'Dimensions'=> 'required|string|max:255',
            'Poids'=> 'required|integer|min:1',
            'Photocopieur'=>  'required|in:OUI,NON',
            'Câble_fourni'=>  'required|in:OUI,NON',
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

        $Printer = Printer::create([
            'type'=> $request->input('type'),
            'name'=> $request->input('name'),
            'Marque'=> $request->input('Marque'),
            'Fonctions'=> $request->input('Fonctions'),
            'Cartouches_impression'=> $request->input('Cartouches_impression'),
            'Vitesse_impression_noir'=> $request->input('Vitesse_impression_noir'),
            'Vitesse_impression_couleur'=> $request->input('Vitesse_impression_couleur'),
            'Qualité_impression_noire'=> $request->input('Qualité_impression_noire'),
            'Qualité_impression_couleur'=> $request->input('Qualité_impression_couleur'),
            'Écran'=> $request->input('Écran'),
            'Connectivité'=> $request->input('Connectivité'),
            'Impression_recto/verso'=> $request->input('Impression_recto/verso'),
            'Capacité_bac_papier'=> $request->input('Capacité_bac_papier'),
            'Dimensions'=> $request->input('Dimensions'),
            'Poids'=> $request->input('Poids'),
            'Photocopieur'=>  $request->input('Photocopieur'),
            'Câble_fourni'=>  $request->input('Câble_fourni'),
            'Prix'=> $request->input('Prix'),
            'Quantité_en_stock'=> $request->input('Quantité_en_stock'),
            'Description'=> $request->input('Description'),
            'Image'=> $imageUrl,
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
        $printer = Printer::findOrFail($id);
        return response()->json($printer);
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
            'Impression_recto/verso'=> 'required|string|max:255',
            'Capacité_bac_papier'=> 'required|string|max:255',
            'Dimensions'=> 'required|string|max:255',
            'Poids'=> 'required|integer|min:1',
            'Photocopieur'=>  'required|in:OUI,NON',
            'Câble_fourni'=>  'required|in:OUI,NON',
            'Prix'=> 'required|numeric',
            'Quantité_en_stock'=> 'required|integer|min:1',
            'Description'=> 'required|string|min:25',
            'Image'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
        ]);

        if ($request->hasFile('Image')) {
            $imagePath = $request->file('Image')->store('laptops', 'public');
            $validatedData['Image'] = $imagePath;
        }


        $printer->update($validatedData);
        return response()->json($printer);
    }
}

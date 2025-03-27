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
            'Clavier_rétroéclairé'=> 'required|in:OUI,NON',
            'Clavier_numérique'=> 'required|in:OUI,NON',
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

        Keyboard::create([
            'name' => $request->input('name'),
            'type'=> $request->input('type'),
            'Marque'=> $request->input('Marque'),
            'Norme_du_clavier'=> $request->input('Norme_du_clavier'),
            'Liaison'=> $request->input('Liaison'),
            'Poids'=> $request->input('Poids'),
            'Clavier_rétroéclairé'=> $request->input('Clavier_rétroéclairé'),
            'Clavier_numérique'=> $request->input('Clavier_numérique'),
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
        $keyboard = Keyboard::findOrFail($id);
        return response()->json($keyboard);
    }

    public function update(Request $request, string $id)
    {
        $keyboard = Keyboard::findOrFail($id);

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
            'Image'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
        ]);

        if ($request->hasFile('Image')) {
            $imagePath = $request->file('Image')->store('laptops', 'public');
            $validatedData['Image'] = $imagePath;
        }

        $keyboard->update($validatedData);
        return response()->json($keyboard);
    }
}


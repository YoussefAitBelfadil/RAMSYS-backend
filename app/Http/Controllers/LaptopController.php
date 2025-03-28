<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class LaptopController extends Controller
{
    // ... (keep your existing product(), index(), show() methods)

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'type' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'Sous_catégories' => 'required|in:PC_portable,PC_portable_gamer,PC_de_bureau',
                'Marque' => 'required|string|max:100',
                'processor' => 'required|string|max:255',
                'ram' => 'required|integer|min:1',
                'rom' => 'required|integer|min:1',
                'Carte_graphique' => 'required|string|max:255',
                'Poids' => 'required|integer|min:1',
                'Taille_écran' => 'required|string|max:255',
                'Couleur' => 'required|string|max:255',
                'Dimensions' => 'required|string|max:255',
                'Type_de_batterie' => 'required|string|max:255',
                'Système_exploitation' => 'required|string|max:255',
                'Prix' => 'required|numeric',
                'Quantité_en_stock' => 'required|integer|min:1',
                'Description' => 'required|string|min:25',
                'Image' => 'required|image|mimes:jpg,jpeg,png,gif|max:10240',
                'Image2' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
                'Image3' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
                'Image4' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
                'Image5' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
            ]);

            $imagePaths = [];
            $imageFields = ['Image', 'Image2', 'Image3', 'Image4', 'Image5'];

            foreach ($imageFields as $field) {
                if ($request->hasFile($field)) {
                    $image = $request->file($field);
                    $filename = time() . '-' . $field . '.' . $image->getClientOriginalExtension();

                    // Store in public storage
                    $path = $image->storeAs('public/images', $filename);

                    // Verify file was stored
                    if (!Storage::exists($path)) {
                        throw new Exception("Failed to upload {$field}");
                    }

                    $imagePaths[$field] = 'images/' . $filename;
                } else {
                    $imagePaths[$field] = null;
                }
            }

            $laptop = Laptop::create([
                'type' => $validatedData['type'],
                'name' => $validatedData['name'],
                'Sous_catégories' => $validatedData['Sous_catégories'],
                'Marque' => $validatedData['Marque'],
                'processor' => $validatedData['processor'],
                'ram' => $validatedData['ram'],
                'rom' => $validatedData['rom'],
                'Carte_graphique' => $validatedData['Carte_graphique'],
                'Poids' => $validatedData['Poids'],
                'Taille_écran' => $validatedData['Taille_écran'],
                'Couleur' => $validatedData['Couleur'],
                'Dimensions' => $validatedData['Dimensions'],
                'Type_de_batterie' => $validatedData['Type_de_batterie'],
                'Système_exploitation' => $validatedData['Système_exploitation'],
                'Prix' => $validatedData['Prix'],
                'Quantité_en_stock' => $validatedData['Quantité_en_stock'],
                'Description' => $validatedData['Description'],
                'Image' => $imagePaths['Image'],
                'Image2' => $imagePaths['Image2'],
                'Image3' => $imagePaths['Image3'],
                'Image4' => $imagePaths['Image4'],
                'Image5' => $imagePaths['Image5'],
            ]);

            return response()->json([
                'message' => 'Product created successfully',
                'data' => $laptop
            ], 201);

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
        $laptop = Laptop::findOrFail($id);

        $validatedData = $request->validate([
            // ... (same validation rules as store)
        ]);

        $imageFields = ['Image', 'Image2', 'Image3', 'Image4', 'Image5'];
        $updateData = $validatedData;

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                // Delete old image if exists
                if ($laptop->$field) {
                    Storage::delete('public/' . $laptop->$field);
                }

                // Store new image
                $image = $request->file($field);
                $filename = time() . '-' . $field . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/images', $filename);

                $updateData[$field] = 'images/' . $filename;
            }
        }

        $laptop->update($updateData);

        return response()->json($laptop);
    }
}

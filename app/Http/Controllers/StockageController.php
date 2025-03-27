<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Stockage;
use Exception;
use Illuminate\Database\QueryException;

class StockageController extends Controller
{
    public function index()
    {
        $stockages = Stockage::all();
        return response()->json($stockages);
    }


    public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'type'=> 'required|string|max:255',
            'Sous-catégories'=>  'required|in:Disque_dur_portable,Disque_dur_interne,Clé_USB,Carte_mémoire',
            'name' => 'required|string|max:255',
            'Marque'=> 'required|string|max:255',
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

        Stockage::create([
            'type'=> $request->input('type'),
            'Sous-catégories'=>  $request->input('Sous-catégories'),
            'name' => $request->input('name'),
            'Marque'=> $request->input('Marque'),
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
        $stockages = Stockage::findOrFail($id);
        return response()->json($stockages);
    }

    public function update(Request $request, string $id)
    {
        $stockages = Stockage::findOrFail($id);

        $validatedData = $request->validate([
            'type'=> 'required|string|max:255',
            'Sous-catégories'=>  'required|in:Disque_dur_portable,Disque_dur_interne,Clé_USB,Carte_mémoire',
            'name' => 'required|string|max:255',
            'Marque'=> 'required|string|max:255',
            'Prix'=> 'required|numeric',
            'Quantité_en_stock'=> 'required|integer|min:1',
            'Description'=> 'required|string|min:25',
            'Image'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
        ]);

        $stockages->update($validatedData);
        return response()->json($stockages);
    }
}

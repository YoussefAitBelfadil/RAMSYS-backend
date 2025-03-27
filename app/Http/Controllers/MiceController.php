<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mouse;
use Exception;
use Illuminate\Database\QueryException;

class MiceController extends Controller
{
    public function index()
    {
        $laptops = Mouse::all();
        return response()->json($laptops);
    }


    public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'type'=> 'required|string|max:255',
            'name'=> 'required|string|max:255',
            'Marque'=> 'required|string|max:100',
            'Liaison'=> 'required|in:Avec_fil,Sans_fil',
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

        Mouse::create(attributes: [
            'type'=> $request->input('type'),
            'name'=> $request->input('name'),
            'Marque'=> $request->input('Marque'),
            'Liaison'=> $request->input('Liaison'),
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
        $Mouse = Mouse::findOrFail($id);
        return response()->json($Mouse);
    }

    public function update(Request $request, string $id)
    {
        $Mouse = Mouse::findOrFail($id);

        $validatedData = $request->validate([
            'type'=> 'required|string|max:255',
            'name'=> 'required|string|max:255',
            'Sous-catégories'=>  'required|in:PC_portable,PC_portable,PC_de_bureau',
            'Marque'=> 'required|string|max:100',
            'Liaison'=> 'required|in:Avec_fil,Sans_fil',
            'Prix'=> 'required|numeric',
            'Quantité_en_stock'=> 'required|integer|min:1',
            'Description'=> 'required|string|min:25',
            'Image'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
        ]);

        if ($request->hasFile('Image')) {
            $imagePath = $request->file('Image')->store('laptops', 'public');
            $validatedData['Image'] = $imagePath;
        }

        $Mouse->update($validatedData);
        return response()->json($Mouse);
    }
}

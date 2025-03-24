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
            'Fonctions'=> '',
            'Cartouches_impression'=> '',
            'Vitesse_impression_noir'=> '',
            'Vitesse_impression_couleur'=> '',
            'Qualité_impression_noire'=> '',
            'Qualité_impression_couleur'=> '',
            'Écran'=> '',
            'Connectivité'=> '',
            'Impression_recto/verso'=> '',
            'Capacité_bac_papier'=> '',
            'Dimensions'=> 'required|string|max:255',
            'Poids'=> 'required|integer|min:1',
            'Photocopieur'=>  'required|in:OUI, NON',
            'Câble_fourni'=>  'required|in:OUI, NON',
            'Prix'=> 'required|numeric',
            'Quantité_en_stock'=> 'required|integer|min:1',
            'Description'=> 'required|string|min:25',
            'Image'=> 'required|image|mimes:jpg,jpeg,png,gif|max:8,192',
        ]);

        Printer::create($validatedData);

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
        $laptop = Printer::findOrFail($id);
        return response()->json($laptop);
    }

    public function update(Request $request, string $id)
    {
        $laptop = Printer::findOrFail($id);

        $request->validate([
            'brand' => 'sometimes|string',
            'model' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'specifications' => 'sometimes|string',
        ]);

        $laptop->update($request->all());
        return response()->json($laptop);
    }
}

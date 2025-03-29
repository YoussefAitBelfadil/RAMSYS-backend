<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use App\Models\Laptop;
use App\Models\Monitor;
use App\Models\Mouse;
use App\Models\Printer;
use Illuminate\Http\Request;
use App\Models\Product; // Assuming you have a Product model or similar
use App\Models\Stockage;
use App\Models\Tablette;

class SearchController extends Controller
{
    public function search(Request $request)
{
    $query = $request->input('query');
    $type = $request->input('type');

    $models = [
        'ORDINATEUR' => Laptop::class,
        'IMPRIMANTE' => Printer::class,
        'TABLETTE GRAPHIQUE' => Tablette::class,
        'CLAVIER' => Keyboard::class,
        'ECRAN' => Monitor::class,
        'SOURIS' => Mouse::class,
        'Stockage' => Stockage::class,
    ];

    $results = collect();

    if ($type && $type !== 'Open this select menu' && isset($models[$type])) {
        // Search in specific model
        $modelResults = $models[$type]::query();
        if ($query) {
            $modelResults->where('name', 'like', '%' . $query . '%');
        }
        $results = $modelResults->get();
    } else if ($query) {
        // Search across all models if no type specified
        foreach ($models as $model) {
            $modelResults = $model::where('name', 'like', '%' . $query . '%')->get();
            $results = $results->merge($modelResults);
        }
    }

    return response()->json($results);
}
}

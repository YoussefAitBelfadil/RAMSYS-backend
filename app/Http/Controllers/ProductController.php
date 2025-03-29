<?php

namespace App\Http\Controllers;

use App\Models\Keyboard;
use App\Models\Laptop;
use App\Models\Monitor;
use App\Models\Mouse;
use App\Models\Printer;
use App\Models\Stockage;
use App\Models\Tablette;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // app/Http/Controllers/ProductController.php
public function showDetails($type, $id)
{
    // Map types to models
    $typeMap = [
        'ORDINATEUR' => Laptop::class,
        'ECRAN' => Monitor::class,
        'TABLETTE' => Tablette::class,
        'CLAVIER' => Keyboard::class,
        'MOUSE' => Mouse::class,
        'IMPRIMANTE' => Printer::class,
        'Stockage' => Stockage::class,
    ];

    if (!array_key_exists($type, $typeMap)) {
        return response()->json(['message' => 'Invalid product type'], 404);
    }

    $product = $typeMap[$type]::find($id);

    if (!$product) {
        return response()->json(['message' => 'Product not found'], 404);
    }

    return response()->json(['data' => $product]);
}
}

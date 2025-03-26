<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function getForm($type)
{
    if ($type == 'clavier') {
        return view('components.forms.clavier');
    } elseif ($type == 'souris') {
        return view('components.forms.souris');
    } elseif ($type == 'stockage') {
        return view('forms.stockage');
    }

    return response()->json(['error' => 'Form not found'], 404);
}


}

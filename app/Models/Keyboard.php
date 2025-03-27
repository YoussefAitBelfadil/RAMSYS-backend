<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keyboard extends Model
{
    protected $fillable = ['name',
            'type',
            'Marque',
            'Norme_du_clavier',
            'Liaison',
            'Poids',
            'Clavier_rétroéclairé',
            'Clavier_numérique',
            'Prix',
            'Quantité_en_stock',
            'Description',
            'Image',
            'Image2',
            'Image3',
            'Image4',
            'Image5',
];
}

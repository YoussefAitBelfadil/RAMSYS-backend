<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    protected $fillable = ['type','name',
                            'Sous-catégories',
                            'Marque',
                            'processor',
                            'ram',
                            'rom',
                            'Carte_graphique',
                            'Poids',
                            'Taille_écran',
                            'Couleur',
                            'Dimensions',
                            'Type_de_batterie',
                            'Système_exploitation',
                            'Prix',
                            'Quantité_en_stock',
                            'Description',
                            'Image',
                            'storage'];

}

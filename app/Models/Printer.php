<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    protected $fillable = ['type',
            'name',
            'Marque',
            'Fonctions',
            'Cartouches_impression',
            'Vitesse_impression_noir',
            'Vitesse_impression_couleur',
            'Qualité_impression_noire',
            'Qualité_impression_couleur',
            'Écran',
            'Connectivité',
            'Impression_recto_verso',
            'Capacité_bac_papier',
            'Dimensions',
            'Poids',
            'Photocopieur',
            'Câble_fourni',
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

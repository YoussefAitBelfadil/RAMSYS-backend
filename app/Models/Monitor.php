<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    protected $fillable = ['type','name',
                            'Taille_écran',
                            'Surface_active',
                            'Luminosité',
                            'Résolution',
                            'Temps_de_réponse',
                            'Connectivité',
                            'Dimensions',
                            'Poids',
                            'Consommation_normale',
                            'Courbure_écran',
                            'Marque',
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

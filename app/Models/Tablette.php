<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tablette extends Model
{
    protected $fillable = [
            "type",
            'name',
            'Marque',
            'Taille_de_la_tablette',
            'Surface_active',
            'Touches/Bouton',
            'Niveaux_de_pression',
            'Connectivité',
            'Poids',
            'Résolution',
            'Stylet',
            'Vitesse_de_lecture',
            'Câble_fourni',
            'Batterie',
            'Durée_de_fonctionnement',
            'Ergonomie',
            'Saisie_multi-touch',
            'Prix',
            'Quantité_en_stock',
            'Description',
            'Image'
        ];

}

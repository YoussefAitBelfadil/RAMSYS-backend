<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stockage extends Model
{
    protected $fillable = ['type',
            'Sous-catégories',
            'name',
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

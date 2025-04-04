<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mouse extends Model
{
    protected $fillable = ['type','name','Sous-catégories','Marque','Liaison',
    'Prix','Quantité_en_stock','Description','Image',
    'Image2',
    'Image3',
    'Image4',
    'Image5',];



}

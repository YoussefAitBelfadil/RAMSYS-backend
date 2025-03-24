<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tablette extends Model
{
    protected $fillable = ['name', 'price', 'processor', 'ram', 'storage'];

}

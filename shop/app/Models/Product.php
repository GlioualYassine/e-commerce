<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey  = 'id' ;
    protected $fillable = [

            'name',
            'slug',
            'description',
            'image_name',
            'price',
            'sale_price',
    ];
}

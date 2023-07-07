<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $table = 'carts';
    protected $fillable =
    [
        'product_id',
        'qty',
        'price',
        'user_id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class,'id','product_id');
    }
}

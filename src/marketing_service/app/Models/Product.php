<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id_product';
    protected $fillable = ['product_name', 'batch', 'description', 'price', 'quantity'];
    protected $casts = [
        'price' => 'float',
        'quantity' => 'float',
    ];
}

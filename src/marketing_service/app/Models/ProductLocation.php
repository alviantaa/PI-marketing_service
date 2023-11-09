<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductLocation extends Model
{
    protected $table = 'product_location';
    protected $primaryKey = 'id_product_location'; // Atur primary key model
    protected $fillable = ['id_product_location', 'id_product', 'id_warehouse'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }
   
public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'id_warehouse', 'id_warehouse');
    }
}
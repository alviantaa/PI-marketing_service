<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    protected $table = 'business_categories';
    protected $primaryKey = 'id_business_category';
    protected $fillable = ['id_business_category', 'id_product', 'category', 'max_capacity', 'description', 'created_at', 'updated_at'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }
}

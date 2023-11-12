<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id_order';
    protected $fillable = [
        'id_order', 'PIC', 'id_customer', 'id_asset', 'id_product_location', 'quantity', 'status'
    ];
    protected $casts = [
	    'created_at' => 'datetime:Y-m-d H:i:s', 
	    'updated_at' => 'datetime:Y-m-d H:i:s',
	];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'PIC', 'id_employee');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id_customer');
    }
    public function asset()
    {
        return $this->belongsTo(Asset::class, 'id_asset', 'id_asset');
    }
    public function productLocation()
    {
        return $this->belongsTo(ProductLocation::class,'id_product_location', 'id_product_location');
    }
}
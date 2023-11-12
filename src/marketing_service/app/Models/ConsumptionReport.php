<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsumptionReport extends Model
{
    protected $table = 'report';
    protected $primaryKey = 'id_report';
    protected $fillable = [
        'id_report','id_order', 'id_customer', 'consumption', 'remaining_product'
    ];
	protected $casts = [
	    'created_at' => 'datetime:Y-m-d H:i:s', 
	    'updated_at' => 'datetime:Y-m-d H:i:s',
	]; 

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order', 'id_order');
    }
    
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id_customer');
    }
}

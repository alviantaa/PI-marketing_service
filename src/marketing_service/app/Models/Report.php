<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'report';
    protected $primaryKey = 'id_report';
    protected $fillable = ['id_order', 'id_customer', 'consumption', 'remaining_product','created_at', 'updated_at'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id_customer');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order', 'id_order');
    }
}
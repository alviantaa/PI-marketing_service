<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table = 'asset';
    protected $primaryKey = 'id_asset'; // Atur primary key model
    protected $fillable = ['id_asset', 'asset_name', 'asset_type', 'spesification', 'PIC','id_warehouse'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'id_warehouse', 'id_warehouse');
    }
 
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'PIC', 'id_employee');
    }
}

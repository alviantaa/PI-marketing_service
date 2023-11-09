<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table = 'asset';
    protected $primaryKey = 'id_asset'; // Atur primary key model
    protected $fillable = ['id_asset', 'asset_name', 'asset_type', 'Spesifications', 'id_employee', 'id_warehouse'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'id_warehouse', 'id_warehouse');
    }
 
public function id_employee()
    {
        return $this->belongsTo(id_employee::class, 'id_id_employee', 'id_id_employee');
    }
}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'warehouse';
    protected $primaryKey = 'id_warehouse';
    protected $fillable = ['id_warehouse', 'id_level', 'PIC', 'name', 'capacity', 'address', 'created_at', 'updated_at'];

    public function level()
    {
        return $this->belongsTo(Level::class, 'id_level', 'id_level');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'PIC', 'id_employee');
    }
}

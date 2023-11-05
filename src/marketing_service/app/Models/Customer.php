namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'id_customer'; // Atur primary key model
    protected $fillable = ['id_customer', 'name', 'email_cust', 'no_telp', 'sex', 'precise_location', 'id_kelurahan', 'created_at', 'updated_at'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'id_kelurahan', 'id_kelurahan');
    }
}

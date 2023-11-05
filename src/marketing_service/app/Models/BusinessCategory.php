namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    protected $primaryKey = 'id_business_category';
    protected $fillable = ['id_business_category', 'category', 'max_capacity', 'id_product', 'description', 'created_at', 'updated_at'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }
}

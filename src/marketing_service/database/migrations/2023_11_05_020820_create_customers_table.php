use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->string('id_customer', 10)->primary();
            $table->string('name', 100);
            $table->string('email_cust', 100)->unique();
            $table->string('no_telp', 13);
            $table->char('sex', 1);
            $table->string('precise_location', 250);
            $table->string('id_kelurahan', 8)->default('KEL00001');
            $table->foreign('id_kelurahan')->references('id_kelurahan')->on('kelurahan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}

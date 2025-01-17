
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class AgregandoFechaEntregadoAEnvio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('envios', function (Blueprint $table) {
            $table->timestamp('envEntregadoEn')->nullable()->default(null);
            $table->string('envEntregadoA')->nullable()->default(null);
                 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('envios', function (Blueprint $table) {
            $table->dropColumn(['envEntregadoEn','envEntregadoA']);
        }); 
    }
}


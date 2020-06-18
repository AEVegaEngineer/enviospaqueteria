
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarCantidadesAListaPaquetes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('listapaquetes', function (Blueprint $table) {
            $table->Integer('listCantidadPaq');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('listapaquetes', function (Blueprint $table) {
            $table->dropColumn(['listCantidadPaq']);
        }); 
    }
}


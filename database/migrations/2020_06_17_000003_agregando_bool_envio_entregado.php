
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregandoBoolEnvioEntregado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('envios', function (Blueprint $table) {   
            $table->Integer('envEntregado')->nullable()->default(null);             
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
            $table->dropColumn(['envEntregado']);            
        }); 
    }
}


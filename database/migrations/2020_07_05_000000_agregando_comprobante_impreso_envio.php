
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregandoComprobanteImpresoEnvio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('envios', function (Blueprint $table) {   
            $table->Integer('envComprobanteImpreso')->default(0);            
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
            $table->dropColumn(['envComprobanteImpreso']);
        }); 
    }
}


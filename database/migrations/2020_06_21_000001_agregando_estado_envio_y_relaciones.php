
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregandoEstadoEnvioYRelaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('envios', function (Blueprint $table) {   
            $table->unsignedBigInteger('envEstadoEnvio');
            //$table->Integer('envEntregado')->nullable()->default(null);             
        }); 
        Schema::table('envios', function (Blueprint $table) {
            $table->foreign('envEstadoEnvio')
                ->references('estId')
                ->on('estadosenvios')
                ->onUpdate('cascade'); 
        });
        Schema::table('estadosenvios', function (Blueprint $table) {
            $table->foreign('estCreatedBy')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estadosenvios', function (Blueprint $table) {
            $table->dropForeign(['estCreatedBy']);
        });
        Schema::table('envios', function (Blueprint $table) {
            $table->dropForeign(['envEstadoEnvio']);
        });
        Schema::table('envios', function (Blueprint $table) { 
            //$table->dropColumn(['envEntregado']);            
            $table->dropColumn(['envEstadoEnvio']);
        }); 
    }
}


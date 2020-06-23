
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class ArreglandoRelacionesEnviosListapaquetes2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listapaquetes', function (Blueprint $table) {
            $table->unsignedBigInteger('listEnvioId');             
        }); 
        Schema::table('listapaquetes', function (Blueprint $table) {
            $table->foreign('listEnvioId')
                ->references('envId')
                ->on('envios')
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
        
        Schema::table('listapaquetes', function (Blueprint $table) {
            $table->dropForeign(['listEnvioId']);
        });
        Schema::table('listapaquetes', function (Blueprint $table) {
            $table->dropColumn(['listEnvioId']);
        });
    }
}


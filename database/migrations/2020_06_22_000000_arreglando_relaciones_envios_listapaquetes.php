
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class ArreglandoRelacionesEnviosListapaquetes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('envios', function (Blueprint $table) {
            $table->dropForeign(['envListaPaqueteId']);
        });
        Schema::table('envios', function (Blueprint $table) {
            $table->dropColumn(['envListaPaqueteId']);
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
            $table->unsignedBigInteger('envListaPaqueteId');             
        }); 
        Schema::table('envios', function (Blueprint $table) {
            $table->foreign('envListaPaqueteId')
                ->references('listId')
                ->on('listapaquetes')
                ->onUpdate('cascade');
        }); 

        
    }
}


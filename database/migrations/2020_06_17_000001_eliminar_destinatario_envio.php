
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EliminarDestinatarioEnvio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('envios', function (Blueprint $table) {   
            $table->dropForeign(['envDestinatarioId']);  
            $table->dropColumn(['envDestinatarioId']);       

        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->unsignedBigInteger('envDestinatarioId')->nullable()->default(null);
        Schema::table('envios', function (Blueprint $table) {
            $table->foreign('envDestinatarioId')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');        
        }); 
    }
}


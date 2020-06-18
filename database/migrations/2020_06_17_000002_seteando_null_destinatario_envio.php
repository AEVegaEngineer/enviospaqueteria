
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeteandoNullDestinatarioEnvio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('envios', function (Blueprint $table) {   
            $table->unsignedBigInteger('envDestinatarioId')->nullable()->default(null);
            $table->foreign('envDestinatarioId')
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
        Schema::table('envios', function (Blueprint $table) {
            $table->dropForeign(['envDestinatarioId']);  
            $table->dropColumn(['envDestinatarioId']);            
        }); 
    }
}


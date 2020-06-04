<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('personas', function (Blueprint $table) {
            $table->id('perId');
            $table->string('perNombres');
            $table->string('perApellidos');
            $table->string('perDni')->unique();
            $table->string('perDireccion');
            $table->unsignedBigInteger('perUsuarioId');

            $table->rememberToken();
            $table->timestamps();
            
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('usuId');
            $table->string('usuEmail')->unique();
            $table->string('usuContrasena');
            $table->string('usuNombres');
            $table->string('usuApellidos');
            $table->string('usuDni')->unique();
            $table->string('usuDireccion');
            $table->boolean('usuActivo'); 
            $table->unsignedBigInteger('usuTipoUsuario');

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
        Schema::dropIfExists('usuarios');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropColumn(['usuApellidos', 'usuDni', 'usuDireccion']);
            $table->dropForeign(['usuTipoUsuario']);
        });
        Schema::drop('tiposusuarios');
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('tiposusuarios', function (Blueprint $table) {
            $table->id('tipUsuId');
            $table->string('tipUsuDescripcion');
            $table->unsignedBigInteger('tipCreatedBy');  
            
            $table->timestamps();
        });
        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign('usuTipoUsuario')
                ->references('tipUsuId')
                ->on('tiposusuarios')
                ->onUpdate('cascade');
        });
    }
}

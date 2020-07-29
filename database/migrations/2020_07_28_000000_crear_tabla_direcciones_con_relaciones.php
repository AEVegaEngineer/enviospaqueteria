<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaDireccionesConRelaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id('dirId');
            $table->unsignedBigInteger('dirUserId');
            $table->String('dirLinea1');
            $table->String('dirLinea2');
            $table->String('dirCiudad');
            $table->String('dirProvincia');
            $table->String('dirDepartamento');
            $table->String('dirZip');
            $table->enum('dirOrigenDestino', ['origen', 'destino']);         
            $table->timestamps(); 
        });
        Schema::table('direcciones', function (Blueprint $table) {
            $table->foreign('dirUserId')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['usuDireccion']);
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('users', function (Blueprint $table) {
            $table->String('usuDireccion');
        });
        Schema::table('direcciones', function (Blueprint $table) {
            $table->dropForeign(['dirUserId']);
        });
        Schema::dropIfExists('direcciones');
    }
}

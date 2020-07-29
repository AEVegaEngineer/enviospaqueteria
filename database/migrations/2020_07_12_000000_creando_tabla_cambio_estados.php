<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreandoTablaCambioEstados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cambio_estados', function (Blueprint $table) {
            $table->id('cambId');
            $table->unsignedBigInteger('cambEnvioId');
            $table->Integer('cambEstado');

            $table->unsignedBigInteger('cambCreatedBy');            
            $table->timestamps();       
        });
        Schema::table('cambio_estados', function (Blueprint $table) {
            $table->foreign('cambEnvioId')
                ->references('envId')
                ->on('envios')
                ->onUpdate('cascade');
        });
        Schema::table('cambio_estados', function (Blueprint $table) {
            $table->foreign('cambCreatedBy')
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
        Schema::table('cambio_estados', function (Blueprint $table) {
            $table->dropForeign(['cambEnvioId']);
            $table->dropForeign(['cambCreatedBy']);
        });
        Schema::dropIfExists('cambio_estados');
    }
}

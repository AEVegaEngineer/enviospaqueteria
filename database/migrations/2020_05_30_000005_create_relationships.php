<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign('usuTipoUsuario')
                ->references('tipUsuId')
                ->on('tiposusuarios')
                ->onUpdate('cascade');
        });
        Schema::table('envios', function (Blueprint $table) {
            $table->foreign('EnvListaPaqueteId')
                ->references('listId')
                ->on('listapaquetes')
                ->onUpdate('cascade'); 
            $table->foreign('envDestinatarioId')
                ->references('usuId')
                ->on('usuarios')
                ->onUpdate('cascade'); 
            $table->foreign('envCreatedBy')
                ->references('usuId')
                ->on('usuarios')
                ->onUpdate('cascade'); 
                 
        });
        Schema::table('tiposusuarios', function (Blueprint $table) {
            $table->foreign('tipCreatedBy')
                ->references('usuId')
                ->on('usuarios')
                ->onUpdate('cascade');   
        });
        Schema::table('listapaquetes', function (Blueprint $table) {
            $table->foreign('listPaqueteId')
                ->references('paqId')
                ->on('paquetes')
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
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign(['usuTipoUsuario']);
        });
        Schema::table('envios', function (Blueprint $table) {
            $table->dropForeign(['EnvListaPaqueteId']);
            $table->dropForeign(['envDestinatarioId']);
            $table->dropForeign(['envCreatedBy']);
        });
        Schema::table('tiposusuarios', function (Blueprint $table) {
            $table->dropForeign(['tipCreatedBy']);
        });
        Schema::table('listapaquetes', function (Blueprint $table) {
            $table->dropForeign(['listPaqueteId']);
        });
    }
}

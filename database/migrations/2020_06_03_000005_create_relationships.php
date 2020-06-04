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
        Schema::table('comercios', function (Blueprint $table) {
            $table->foreign('comUsuarioId')
                ->references('usuId')
                ->on('usuarios')
                ->onUpdate('cascade');
        });
        Schema::table('personas', function (Blueprint $table) {
            $table->foreign('perUsuarioId')
                ->references('usuId')
                ->on('usuarios')
                ->onUpdate('cascade');
        });
        Schema::table('shoppings', function (Blueprint $table) {
            $table->foreign('shopUsuarioId')
                ->references('usuId')
                ->on('usuarios')
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
        Schema::table('comercios', function (Blueprint $table) {
            $table->dropForeign(['comUsuarioId']);
        });
        Schema::table('personas', function (Blueprint $table) {
            $table->dropForeign(['perUsuarioId']);
        });
        Schema::table('shoppings', function (Blueprint $table) {
            $table->dropForeign(['shopUsuarioId']);
        });
    }
}

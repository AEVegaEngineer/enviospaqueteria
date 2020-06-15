<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personas', function (Blueprint $table) {
            $table->foreign('perUsuarioId')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
        });
        Schema::table('shoppings', function (Blueprint $table) {
            $table->foreign('shopUsuarioId')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
        });
        Schema::table('comercios', function (Blueprint $table) {
            $table->foreign('comUsuarioId')
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
        Schema::table('personas', function (Blueprint $table) {
            $table->dropForeign(['perUsuarioId']);
        });
        Schema::table('shoppings', function (Blueprint $table) {
            $table->dropForeign(['shopUsuarioId']);
        });
        Schema::table('comercios', function (Blueprint $table) {
            $table->dropForeign(['comUsuarioId']);
        });
    }
}

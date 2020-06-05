<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::table('usuarios', function (Blueprint $table) {
            $table->string('usuTelefono');
            $table->string('usuDireccion');
        });   
        Schema::table('comercios', function (Blueprint $table) {
            $table->dropColumn(['comDireccion']);
        });    
        Schema::table('personas', function (Blueprint $table) {
            $table->dropColumn(['perDireccion']);
        });    
        Schema::table('shoppings', function (Blueprint $table) {
            $table->dropColumn(['shopDireccion']);
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
            $table->dropColumn(['usuTelefono']);
            $table->dropColumn(['usuDireccion']);
        });
        Schema::table('comercios', function (Blueprint $table) {
            $table->string('comDireccion');
        });    
        Schema::table('personas', function (Blueprint $table) {
            $table->string('perDireccion');
        });    
        Schema::table('shoppings', function (Blueprint $table) {
            $table->string('shopDireccion');
        });
    }
}

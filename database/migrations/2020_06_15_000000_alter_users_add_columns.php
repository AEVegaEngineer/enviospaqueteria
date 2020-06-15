<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['name']);            
            $table->string('usuTelefono');
            $table->string('usuDireccion');            
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
            $table->string('name');
            $table->dropColumn(['usuTelefono']);
            $table->dropColumn(['usuDireccion']);
        });
    }
}

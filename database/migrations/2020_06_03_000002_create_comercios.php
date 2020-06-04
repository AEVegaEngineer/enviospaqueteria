<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createcomercios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('comercios', function (Blueprint $table) {
            $table->id('comId');
            $table->string('comNombre');
            $table->string('comCuit');
            $table->string('comDireccion');
            $table->unsignedBigInteger('comUsuarioId');

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
        Schema::dropIfExists('comercios');
    }
}

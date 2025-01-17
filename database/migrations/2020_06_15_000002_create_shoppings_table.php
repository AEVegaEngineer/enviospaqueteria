<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('shoppings', function (Blueprint $table) {
            $table->id('shopId');
            $table->string('shopNombre');
            $table->string('shopCuit');
            $table->string('shopDireccion');
            $table->unsignedBigInteger('shopUsuarioId');

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
        Schema::dropIfExists('shoppings');
    }
}

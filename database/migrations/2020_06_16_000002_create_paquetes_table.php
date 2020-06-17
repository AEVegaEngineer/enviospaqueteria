<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquetes', function (Blueprint $table) {
            $table->id('paqId');
            $table->string('paqDescripcion');
            $table->decimal('paqDimensionAlto', 6, 2);
            $table->decimal('paqDimensionAncho', 6, 2);
            $table->decimal('paqDimensionLargo', 6, 2);
            $table->string('paqDimensionUnidad');
            $table->decimal('paqPeso', 6, 2);
            $table->string('paqPesoUnidad');

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
        Schema::dropIfExists('paquetes');
    }
}


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class AgregandoAjustesSistema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {              
        Schema::create('cardexcostos', function (Blueprint $table) {
            $table->id('carCostId');
            $table->decimal('carCostoKilogramo',12,3);
            $table->decimal('carCostoVolumen',12,3);
            $table->timestamps();           
        });
        DB::table('cardexcostos')->insert(
            array(
                'carCostoKilogramo' => 123.456,
                'carCostoVolumen' => 134.567,
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cardexcostos');
    }
}


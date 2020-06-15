
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarRelacionesAfiliaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('comercios', function (Blueprint $table) {
            $table->foreign('comShoppingId')
                ->references('shopId')
                ->on('shoppings')
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
            $table->dropForeign(['comShoppingId']);
        });
    }
}


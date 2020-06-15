
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixUsersColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
        Schema::table('personas', function (Blueprint $table) {
            $table->string('perDireccion');
        });
        Schema::table('shoppings', function (Blueprint $table) {
            $table->string('shopDireccion');
        });
        Schema::table('comercios', function (Blueprint $table) {
            $table->string('comDireccion');
        });
    }
}


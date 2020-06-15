
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarAfiliacionesAComercios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('comercios', function (Blueprint $table) {
            $table->unsignedBigInteger('comShoppingId');
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
            $table->dropColumn(['comShoppingId']);
        }); 
    }
}


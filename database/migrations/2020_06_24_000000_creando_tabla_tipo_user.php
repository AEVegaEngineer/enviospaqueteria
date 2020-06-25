
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreandoTablaTipoUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //limpio todo para poder crear las relaciones
        DB::delete('delete from estadosenvios');
        DB::delete('delete from listapaquetes');
        DB::delete('delete from envios');        
        DB::delete('delete from personas');
        DB::delete('delete from comercios');
        DB::delete('delete from shoppings');
        DB::delete('delete from users');

        Schema::create('tipousers', function (Blueprint $table) {
            $table->id('tipUsuId');
            $table->string('tipUsuDescripcion');
            $table->unsignedBigInteger('tipUsuCreatedBy')->nullable()->default(null);
            $table->timestamps();           
        });
        DB::table('tipousers')->insert(
            array(
                'tipUsuDescripcion' => "persona",
            )
        );
        DB::table('tipousers')->insert(
            array(
                'tipUsuDescripcion' => "comercio",
            )
        );
        DB::table('tipousers')->insert(
            array(
                'tipUsuDescripcion' => "shopping",
            )
        );
        DB::table('tipousers')->insert(
            array(
                'tipUsuDescripcion' => "transporte",
            )
        );
        DB::table('tipousers')->insert(
            array(
                'tipUsuDescripcion' => "admin",
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
        Schema::dropIfExists('tipousers');
    }
}


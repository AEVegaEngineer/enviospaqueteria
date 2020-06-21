
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class SeedeandoEstadosEnviosBasicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	DB::table('estadosenvios')->insert(
            array(
                'estDescripcion' => "En Espera",
                'estCreatedBy' => 1,
            )
        );
        DB::table('estadosenvios')->insert(
            array(
                'estDescripcion' => "Entregado a Logística",
                'estCreatedBy' => 1,
            )
        );
        DB::table('estadosenvios')->insert(
            array(
                'estDescripcion' => "En Tránsito a Destino",
                'estCreatedBy' => 1,
            )
        );
        DB::table('estadosenvios')->insert(
            array(
                'estDescripcion' => "Entregado en Destino",
                'estCreatedBy' => 1,
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
        DB::table('estadosenvios')->where('estDescripcion', "Entregado en Destino")->delete();
        DB::table('estadosenvios')->where('estDescripcion', "En Tránsito a Destino")->delete(); 
        DB::table('estadosenvios')->where('estDescripcion', "Entregado a Logística")->delete();
        DB::table('estadosenvios')->where('estDescripcion', "En Espera")->delete();
    }
}


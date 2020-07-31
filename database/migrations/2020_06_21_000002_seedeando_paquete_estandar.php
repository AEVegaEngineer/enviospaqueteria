
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class SeedeandoPaqueteEstandar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	DB::table('paquetes')->insert(
            array(
                'paqId' => 1,
                'paqDescripcion' => "Paquete de envío estándar",
                'paqDimensionAlto' => 50,
                'paqDimensionAncho' => 50,
                'paqDimensionLargo' => 50,
                'paqDimensionUnidad' => "Centímetros",
                'paqPeso' => 5.0,
                'paqPesoUnidad' => "Kilos",
            )
        );
        /*
        Artisan::call( 'db:seed', [
            '--class' => 'PaqueteEstandarSeed',
            '--force' => true ]
        );
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('paquetes')->where('paqId', 1)->delete(); 
    }
}



<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class SeedeandoPaquete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        DB::table('paquetes')
            ->where('paqId',1)
            ->update([
                'paqDescripcion' => "Paquete de envío estándar",
                'paqDimensionAlto' => 1.25,
                'paqDimensionAncho' => 1.25,
                'paqDimensionLargo' => 1.25,
                'paqDimensionUnidad' => "Metros",
                'paqPeso' => 5.00,
                'paqPesoUnidad' => 'Kilogramos'
            ]);    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}


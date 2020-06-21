<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PaqueteEstandarSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paquetes')->insert([
            'paqId' => 1,
            'paqDescripcion' => $request['paqDescripcion'],
            'paqDimensionAlto' => 1.0,
            'paqDimensionAncho' => 1.0,
            'paqDimensionLargo' => 1.0,
            'paqDimensionUnidad' => "Paquete",
            'paqPeso' => 5.0,
            'paqPesoUnidad' => "Kilos",
        ]);
    }
}

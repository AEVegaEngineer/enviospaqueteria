
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class AgregandoDireccionesTablaEnvio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {              
        Schema::table('envios', function (Blueprint $table) {
            $table->dropColumn(['envOrigen']);
            $table->dropColumn(['envDestino']);
        });
        Schema::table('envios', function (Blueprint $table) {
            $table->unsignedBigInteger('envOrigen');
            $table->unsignedBigInteger('envDestino');
        });
        Schema::table('envios', function (Blueprint $table) {
            $table->foreign('envOrigen')
                ->references('dirId')
                ->on('direcciones')
                ->onUpdate('cascade');

            $table->foreign('envDestino')
                ->references('dirId')
                ->on('direcciones')
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
        Schema::table('envios', function (Blueprint $table) {
            $table->dropForeign(['envDestino','envOrigen']);
        });
        Schema::table('envios', function (Blueprint $table) {
            $table->dropColumn(['envOrigen']);
            $table->dropColumn(['envDestino']);
        });
        Schema::table('envios', function (Blueprint $table) {
            $table->string('envOrigen');
            $table->string('envDestino');
        });
    }
}


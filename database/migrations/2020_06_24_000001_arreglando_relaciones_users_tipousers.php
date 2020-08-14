
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class ArreglandoRelacionesUsersTipousers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['privilegio']);     

        }); 
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('privilegio');      

        }); 
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('privilegio')
                ->references('tipUsuId')
                ->on('tipousers')
                ->onUpdate('cascade');
        }); 
        DB::table('users')->insert(
            array(
                'id' => 1,
                'email' => "aevega1991@gmail.com",
                'password' => "\$2y\$10\$by9knUuMI75z0X5b1oOzJurfspT8rE/BeUob4Sv9ZLb5ZlocVoOTi",
                'privilegio' => 5,
                'usuTelefono' => '2645034441',
                'usuDireccion' => 'Dirección'
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
        DB::delete('delete from users');
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['privilegio']);
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['privilegio']);
        });
    }
}


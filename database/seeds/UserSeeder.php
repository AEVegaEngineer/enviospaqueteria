<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Andres Vega",
            'email' => 'aevega1991@gmail.com',
            'password' => Hash::make('19422581'),
        ]);
    }
}

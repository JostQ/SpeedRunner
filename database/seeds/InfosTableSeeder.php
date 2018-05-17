<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('infos')->insert([
           'lastname' => 'Caca',
           'firstname' => 'Bilal',
           'users_id' => 1
        ]);
        DB::table('infos')->insert([
            'lastname' => 'Poux de lard',
            'firstname' => 'Valentino',
            'users_id' => 2
        ]);
        DB::table('infos')->insert([
            'lastname' => 'Dremsis',
            'firstname' => 'Cookie',
            'users_id' => 3
        ]);
        DB::table('infos')->insert([
            'lastname' => 'Traing',
            'firstname' => 'Maxime',
            'users_id' => 4
        ]);
    }
}

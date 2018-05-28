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
           'lastname' => 'Belmehdi',
           'firstname' => 'Bilal',
           'users_id' => 1
        ]);
        DB::table('infos')->insert([
            'lastname' => 'Poulard',
            'firstname' => 'Valentin',
            'users_id' => 2
        ]);
        DB::table('infos')->insert([
            'lastname' => 'Jost',
            'firstname' => 'Quentin',
            'users_id' => 3
        ]);
        DB::table('infos')->insert([
            'lastname' => 'Simoncelli',
            'firstname' => 'Maxime',
            'users_id' => 4
        ]);
    }
}

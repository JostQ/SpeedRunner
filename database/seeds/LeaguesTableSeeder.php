<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeaguesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 21; $i++){
            DB::table('leagues')->insert([
                'name' => 'Ligue '.(string) $i,
            ]);
        }
    }
}

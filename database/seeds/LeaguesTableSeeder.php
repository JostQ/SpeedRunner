<?php

use Illuminate\Database\Seeder;

class LeaguesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 20; $i > 0; $i--){
            DB::table('formulaires')->insert([
                'name' => (string) $i,
            ]);
        }
    }
}

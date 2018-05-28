<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuccessesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('success')->insert([
            'name' => '5 courses',
            'description' => 'Vous avez effectué 5 courses. Continuez comme ça !'
        ]);
        DB::table('success')->insert([
            'name' => '50 km',
            'description' => 'Vous avez effectué 50 Km. Vous êtes une inspiration pour vos amis !'
        ]);
        DB::table('success')->insert([
            'name' => '50 courses',
            'description' => 'La motivation vous a emporté. '
        ]);
        DB::table('success')->insert([
            'name' => '15km/h',
            'description' => 'Rien ne vous arrête. Vous avez pensé à faire le marathon ?'
        ]);
    }
}

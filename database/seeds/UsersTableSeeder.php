<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'name' => 'bilal',
            'email' => 'b@b.b',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'valentin',
            'email' => 'v@v.v',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'quentin',
            'email' => 'q@q.q',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'maxime',
            'email' => 'm@m.m',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);
    }
}

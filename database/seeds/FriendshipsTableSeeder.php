<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FriendshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('friendships')->insert([
            'friend_id' => 2,
            'users_id' => 1
        ]);
        DB::table('friendships')->insert([
            'friend_id' => 3,
            'users_id' => 1
        ]);
        DB::table('friendships')->insert([
            'friend_id' => 4,
            'users_id' => 1
        ]);
        DB::table('friendships')->insert([
            'friend_id' => 1,
            'users_id' => 2
        ]);
        DB::table('friendships')->insert([
            'friend_id' => 3,
            'users_id' => 2
        ]);
        DB::table('friendships')->insert([
            'friend_id' => 4,
            'users_id' => 2
        ]);
        DB::table('friendships')->insert([
            'friend_id' => 1,
            'users_id' => 3
        ]);
        DB::table('friendships')->insert([
            'friend_id' => 2,
            'users_id' => 3
        ]);
        DB::table('friendships')->insert([
            'friend_id' => 4,
            'users_id' => 3
        ]);
        DB::table('friendships')->insert([
            'friend_id' => 1,
            'users_id' => 4
        ]);
        DB::table('friendships')->insert([
            'friend_id' => 2,
            'users_id' => 4
        ]);
        DB::table('friendships')->insert([
            'friend_id' => 3,
            'users_id' => 4
        ]);
    }
}

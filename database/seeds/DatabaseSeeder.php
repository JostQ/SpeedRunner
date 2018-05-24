<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(LeaguesTableSeeder::class);
        $this->call(FriendshipsTableSeeder::class);
        $this->call(InfosTableSeeder::class);
        $this->call(SuccessesTableSeeder::class);

    }


}

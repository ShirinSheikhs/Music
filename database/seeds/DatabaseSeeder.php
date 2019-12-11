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
         //$this->call(UsersTableSeeder::class);
        $this->call(Fake_AlbumeTableSeeder::class);
        $this->call(Fake_ArtistsTableSeeder::class);
        $this->call(Fake_SongTableSeeder::class);
    }
}

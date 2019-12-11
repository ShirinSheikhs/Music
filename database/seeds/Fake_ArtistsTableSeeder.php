<?php

use Illuminate\Database\Seeder;

class Fake_ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $artist =new \App\Models\Music\Artist();
        $artist
            ->setTranslation('name', 'en', 'farshid')
            ->setTranslation('name', 'fa', 'فرشید');
        $artist->biography='بهترین خواننده';
        $artist->save();



    }
}

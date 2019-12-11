<?php

use Illuminate\Database\Seeder;

class Fake_SongTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $song =new \App\Models\Music\Song();
        $song
            ->setTranslation('name', 'en', 'hello')
            ->setTranslation('name', 'fa', 'سلام');
        $song->save();
    }
}

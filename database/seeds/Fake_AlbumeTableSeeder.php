<?php

use Illuminate\Database\Seeder;

class Fake_AlbumeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $album =new \App\Models\Music\Album();
        $album
            ->setTranslation('name', 'en', 'salam')
            ->setTranslation('name', 'fa', 'سلام');
        $album->save();
    }
}

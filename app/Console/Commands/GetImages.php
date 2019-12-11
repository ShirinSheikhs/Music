<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    const BASE_IMAGE_PATH_IN_STORAGE = "app/public/images/%s";
    const BASE_MP3_PATH_IN_STORAGE   = "app/public/songs/%s";
    protected $signature = 'images:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get images from RadioJavan.com';
    private $images = [
        'http://delbaraneh.com/wp-content/uploads/2019/04/%D8%B9%DA%A9%D8%B3-%D8%AF%D8%AE%D8%AA%D8%B1-%D8%B2%DB%8C%D8%A8%D8%A7-%D8%A8%D8%B1%D8%A7%DB%8C-%D9%BE%D8%B1%D9%88%D9%81%D8%A7%DB%8C%D9%84-1.jpg',
        'https://d1eqqkloubk286.cloudfront.net/static/mp3/farzad-farzin-mankan/f958161d6d2f925.jpg',
        'https://d1eqqkloubk286.cloudfront.net/static/mp3/farzad-farzin-ey-kash/5e6509cc4b3a3a6.jpg',
        'https://d1eqqkloubk286.cloudfront.net/static/mp3/farzad-farzin-ayandeh/a9e77e34990205f.jpg',
    ];
    private $mp3s   = [
        'http://delbaraneh.com/wp-content/uploads/2019/04/%D8%B9%DA%A9%D8%B3-%D8%AF%D8%AE%D8%AA%D8%B1-%D8%B2%DB%8C%D8%A8%D8%A7-%D8%A8%D8%B1%D8%A7%DB%8C-%D9%BE%D8%B1%D9%88%D9%81%D8%A7%DB%8C%D9%84-1.jpg',
    ];


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $kind = $this->choice('Do you want mp3 or images', [
            'mp3',
            'images'
        ], 'images');
        \Storage::makeDirectory('public/images');
        \Storage::makeDirectory('public/songs');
        switch ($kind){
            case 'mp3':
                $this->getMp3s();
                break;
            case 'images':
                $this->getImages();
                break;
        }
    }
    private function getImages()
    {
        $progress = $this->output->createProgressBar(count($this->images));
        foreach ($this->images as $image) {
            $pathExploded = explode('/', $image);
            $imageName    = end($pathExploded);
            $storagePath = storage_path(sprintf(self::BASE_IMAGE_PATH_IN_STORAGE, $imageName));
            file_put_contents($storagePath, file_get_contents($image));
            $progress->advance();
        }
        $progress->finish();
        $this->info("\nAll images downloaded.");
    }
    private function getMp3s()
    {
        $progress = $this->output->createProgressBar(count($this->mp3s));
        foreach ($this->mp3s as $mp3) {
            $pathExploded = explode('/', $mp3);
            $mp3Name      = end($pathExploded);
            $storagePath = storage_path(sprintf(self::BASE_MP3_PATH_IN_STORAGE, $mp3Name));
            file_put_contents($storagePath, file_get_contents($mp3));
            $progress->advance();
        }
        $progress->finish();
        $this->info("\nAll songs downloaded.");
    }
}

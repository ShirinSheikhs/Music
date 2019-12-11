<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('name');
            $table->string('duration')->nullable();
            $table->text('lyrics')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('song_genre', function (Blueprint $table) {
         $table->bigInteger('song_id')->unsigned();
         $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade');



        });
        Schema::create('artist_song', function (Blueprint $table) {
           $table->bigInteger('artist_id')->unsigned();
           $table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');
          $table->bigInteger('song_id')->unsigned();
          $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade');



        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}

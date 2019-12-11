<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});
Route::group(['namespace' => 'Panel', 'prefix' => 'panel'], function () {
    Route::group(['namespace' => 'Music', 'prefix' => 'music'], function () {


        Route::get('/artist/list', 'ArtistController@list');
        Route::post('/artist/{id}/restore', 'ArtistController@restore');
        Route::apiResource('/artist', 'ArtistController');


        Route::get('/song/list', 'SongController@list');
        Route::post('/song/{id}/restore', 'SongController@restore');
        Route::apiResource('/song', 'SongController');

        Route::get('/album/list', 'AlbumController@list');
        Route::post('/album/{id}/restore', 'AlbumController@restore');
        Route::apiResource('/album','AlbumController');
    });

});
Route::group(['namespace'=>'frontend'], function (){
    Route::resource('/song', 'SongController');
});




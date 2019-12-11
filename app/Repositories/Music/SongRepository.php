<?php


namespace App\Repositories\Music;
class SongRepository extends AbstractSongRepository
{
    protected function getSongCacheKey($id){
        $cacheKey="Song-{$id}";
    }
   public function getSong($id){
    $cacheKey="Song-{$id}";
    if( $song=cache()->get($cacheKey))
    return $song;
    $song=Song::with('artists')->findOrFail($id);
    cache()->put($cacheKey ,$song);
    return $song;}

}

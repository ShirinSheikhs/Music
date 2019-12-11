<?php

namespace App\Models\Music;

use App\Models\User\Comment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

/**
 * Class Song
* @property int    $id
* @property  string $duration
 * @property string   $lyrics
 * @property  string     $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read Artist[] $artists
 */
class Song extends Model
{
    //

    use HasTranslations;
    use SoftDeletes;
    public $translatable = ['name'];
    protected $fillable=['duration','lyrics'];

    public function genres(){
      return $this->belongsToMany(Song::class);
    }
    public function artists(){
        return $this->belongsToMany(Artist::class,'artist_song');
    }
    public  function  categories(){
        return $this->hasMany(Song::class);
    }
    public function comment(){
    return $this->belongsToMany(Comment::class,'song_comment');
    }
    public function album(){
        return $this->belongsTo(Album::class);
    }
}

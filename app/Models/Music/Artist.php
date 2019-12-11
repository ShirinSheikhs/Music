<?php

namespace App\Models\Music;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

/**
 * Class Artist
 *
 * @package App\Models\Music
 * @property int $id
 * @property object $name

 * @property string $biography
 * @property string $birthday
 * @property Carbon $created_at
 */
class Artist extends Model
{     use HasTranslations;
     use SoftDeletes;
    public $translatable = ['name'];
    protected $fillable=['biography','birthday'];
    //
    public function songs(){
        return $this->belongsToMany(Song::class);
    }
    public function subscribes(){
        return $this->belongsTo(Artist::class);
    }
}

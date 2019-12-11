<?php

namespace App\Models\Music;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

/**
 * Class Album
 *
 * @package App\Models\Album
 * @property int $id
 * @property object $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $released_at
 *
 */
class Album extends Model

{
    use HasTranslations;
    use SoftDeletes;
    public $translatable = ['name'];
    protected $fillable=['name','released_at'];

    public function song(){
     return $this->belongsTo(Album::class);
    }
    //
}

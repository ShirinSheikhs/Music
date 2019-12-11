<?php

namespace App\Models\Music;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 *
 * @package App\Models\Music
 *  @property
 */

class Category extends Model
{
    //
    public function songs(){
        return $this->belongsTo(Category::class);
    }
}

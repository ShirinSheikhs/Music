<?php

namespace App\Models\Music;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //
    public function songs()
    {
        return $this->belongsToMany(Genre::class);
    }
}

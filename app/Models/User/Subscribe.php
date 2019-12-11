<?php

namespace App\Models\Like;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    //
    public function artists(){
        return $this->hasMany(Subscribe::class);
    }
}

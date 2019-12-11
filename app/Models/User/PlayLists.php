<?php

namespace App\Models\Like;

use Illuminate\Database\Eloquent\Model;

class PlayLists extends Model
{
    //
    public function songs(){
        return $this->belongsToMany(PlayLists::class);
    }
    public function user(){
        return $this->belongsTo(PlayLists::class);
    }
}

<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * Class profile
 * @package App\Models\User
 * @property  string $first_name
 * @property  string $national_id
 * @property  string  $birthday
 * @property  int  $user_id
 */
class profile extends Model
{
    //
    public function  user(){
        return $this->belongsTo(User::class);
    }
}

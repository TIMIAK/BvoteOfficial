<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Polls extends Model
{
    //
    public function User(){
        return $this->belongsTo(User::class);
    }
}

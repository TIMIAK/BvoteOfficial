<?php

namespace App;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;

class Polls extends Model
{
    protected $guarded = [];
    //
    public function User(){
        return $this->belongsTo(User::class);
    }
}

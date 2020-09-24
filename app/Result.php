<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $guarded = [];


    public function Poll(){
        $this->belongsTo(Polls::class);
    }
}

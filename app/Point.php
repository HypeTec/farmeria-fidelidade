<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    public function card()
    {
        return $this->belongsTo('App\Card');
    }
}

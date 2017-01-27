<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Point extends Model
{
    public function card()
    {
        return $this->belongsTo('App\Card');
    }



}

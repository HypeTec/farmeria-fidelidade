<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{

  protected $fillables = ['user_id', 'full'];

    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }

    public function points()
    {
      return $this->hasMany('App\Point');
    }
}

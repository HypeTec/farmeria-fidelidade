<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Operador extends Model
{
    protected $table = 'operadors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'status'
    ];
    //'loja_id'
    public function getFillables()
    {
        return $this->fillable;
    }

    // public function loja()
    // {
    //     return $this->belongsTo('App\Loja');
    // }



}

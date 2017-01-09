<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Loja extends Model
{
    protected $table = 'lojas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'username', 'password'
    ];

    public function getFillables()
    {
        return $this->fillable;
    }

    protected $hidden = [
        'password',
    ];


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Usuario extends Model
{
    protected $table = 'usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'pin', 'sexo', 'data_nascimento', 'cpf', 'email', 'celular', 'fixo'
    ];

    public function getFillables()
    {
        return $this->fillable;
    }


}

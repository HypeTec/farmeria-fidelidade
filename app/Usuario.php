<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function card()
    {
      return $this->hasMany('App\Card')->where('full', '=', 0)->first();
    }

    public function setDataNascimentoAttribute($value)
    {
      $this->attributes['data_nascimento'] = Carbon::parse($value);
    }

}

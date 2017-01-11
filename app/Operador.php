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
        'name', 'username', 'password', 'status_id'
    ];
    //'loja_id'
    public function getFillables()
    {
        return $this->fillable;
    }

    public function getStatusTextsAttribute()
    {
      if($this->status_id == 0)
      {
        $text['text'] = 'Inativo';
        $text['class'] = 'danger';
        return $text;
      }
      else if ($this->status_id == 1)
      {
        $text['text'] = 'Ativo';
        $text['class'] = 'info';
        $text['confirmation_message']='Tem certeza que deseja tornar o operador inativo?';
        return $text;
      }
    }

    


}

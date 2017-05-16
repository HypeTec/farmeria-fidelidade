<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observacao extends Model
{
    /**
     * @var string
     */
    protected $table = 'observacoes';

    /**
     * @var array
     */
    protected $fillable = [
        'descricao',
    ];

    public function usuario()
    {
        return $this->belongsTo('usuario_id');
    }
}

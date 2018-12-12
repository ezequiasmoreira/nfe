<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable=[
        'id',
        'nome',
        'contribuinte_icms',
        'inscricao_estadual',
        'suframa',
        'inscricao_municipal',
        'email',
        'cnpj',
        'cpf',
        'idEstrangeiro',
        //fk
        'endereco_id',
        'empresa_id',
        'usuario_id'
    ];
    protected $table = 'cliente';
}

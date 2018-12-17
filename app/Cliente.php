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
        //endereço
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'fone',
        'cep',
        'tipo_pessoa',//1 fisica - 2 juridica
        'origem',//1 NACIONAL -  2 ESTRANGEIRO
        //fk
        'cidade_id',
        'empresa_id',
        'usuario_id'
    ];
    protected $table = 'cliente';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $fillable=[
        'id',
        'nome_ex',
        'nome',
        'sigla',
        'codigo'
    ];
    protected $table = 'pais';
}

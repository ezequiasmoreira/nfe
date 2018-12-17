<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable=[
        'id',
        'nome',
        'sigla',
        'codigo',
        'pais_id',
        'ddd'
    ];
    protected $table = 'estado';
}

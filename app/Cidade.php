<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
     protected $fillable=[
        'id',
        'nome',
        'estado_id',
        'codigo'
    ];
    protected $table = 'cidade';
}

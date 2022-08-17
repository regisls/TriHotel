<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemGrupo extends Model
{
    protected $fillable = [
        'Descricao',
        'IsServico',
        'IsAcomodacao',
        'Ativo'
    ];

    protected $table = 'ItemGrupo';
    protected $primaryKey = 'Id';
}
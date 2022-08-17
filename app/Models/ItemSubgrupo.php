<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemSubgrupo extends Model
{
    protected $fillable = [
        'Descricao',
        'ItemGrupoId',
        'Ativo'
    ];

    protected $table = 'ItemSubgrupo';
    protected $primaryKey = 'Id';
}
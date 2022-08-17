<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnidadeMedida extends Model
{
    protected $fillable = [
        'Sigla',
        'Descricao',
        'Ativo'
    ];

    protected $table = 'UnidadeMedida';
    protected $primaryKey = 'Id';
}
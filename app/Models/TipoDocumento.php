<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $fillable = [
        'Descricao',
        'Ativo',
        'ParaExtrangeiros',
    ];

    protected $table = 'TipoDocumento';
    protected $primaryKey = 'Id';
}
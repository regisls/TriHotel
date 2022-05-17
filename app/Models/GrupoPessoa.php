<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoPessoa extends Model
{
    protected $fillable = [
        'Descricao',
        'Ativo',
        'IsColaborador',
        'IsHospede'
    ];

    protected $table = 'GrupoPessoa';
    protected $primaryKey = 'Id';
}
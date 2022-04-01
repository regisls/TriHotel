<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    protected $fillable = [
        'Descricao', 'Ativo', 'CodigoIntegracao'
    ];

    protected $table = 'Transporte';
    protected $primaryKey = 'Id';
}
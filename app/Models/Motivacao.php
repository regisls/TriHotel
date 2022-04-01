<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motivacao extends Model
{
    protected $fillable = [
        'Descricao', 'Ativo', 'CodigoIntegracao'
    ];

    protected $table = 'Motivacao';
    protected $primaryKey = 'Id';
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    protected $fillable = [
        'Descricao', 'Ativo', 'Complemento'
    ];

    protected $table = 'Caracteristica';
    protected $primaryKey = 'Id';
}
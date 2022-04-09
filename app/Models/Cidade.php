<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $fillable = [
        'Nome', 'UFId', 'CodigoIBGE', 'PaisId'
    ];

    protected $table = 'Cidade';
    protected $primaryKey = 'Id';
}
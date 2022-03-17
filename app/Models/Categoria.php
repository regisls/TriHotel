<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {

    protected $fillable = [
        'Descricao', 'Ativo', 'created_at', 'updated_at'
    ];

    protected $table = 'Categoria';
    protected $primaryKey = 'Id';
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $fillable = [
        'Nome', 'Sigla', 'DDI', 'CodigoBacen'
    ];

    protected $table = 'Pais';
    protected $primaryKey = 'Id';

    public function UFs()
    {
        return $this->hasMany('App\Models\UF', 'PaisId');
    }
}
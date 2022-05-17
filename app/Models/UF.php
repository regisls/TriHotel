<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UF extends Model
{
    protected $fillable = [
        'Sigla',
        'Nome',
        'CodigoIBGE',
        'PaisId'
    ];

    protected $table = 'UF';
    protected $primaryKey = 'Id';

    public function pais()
    {
        return $this->belongsTo('App\Models\Pais', 'PaisId');
    }

    public function cidades()
    {
        return $this->hasMany('App\Models\Cidade', 'UFId');
    }    
}
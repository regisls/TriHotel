<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'Codigo',
        'CodigoReduzido',
        'Descricao',
        'ItemGrupoId', 
        'ItemSubgrupoId', 
        'IsServico', 
        'IsAcomodacao', 
        'Ativo', 
        'MovimentaEstoque',
        'GTIN',
        'UnidadeMedidaId'
    ];

    protected $table = 'Item';
    protected $primaryKey = 'Id';

    public function ItemGrupo()
    {
        return $this->belongsTo('App\Models\ItemGrupo', 'ItemGrupoId');
    }

    public function ItemSubgrupo()
    {
        return $this->belongsTo('App\Models\ItemSubgrupo', 'ItemSubgrupoId');
    }

    public function UnidadeMedida()
    {
        return $this->belongsTo('App\Models\UnidadeMedida', 'UnidadeMedidaId');
    }
}
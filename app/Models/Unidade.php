<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    protected $fillable = [
        'CNPJ',
        'RazaoSocial', 
        'NomeFantasia', 
        'CEP', 
        'Endereco', 
        'Numero', 
        'Complemento', 
        'Bairro', 
        'CidadeId', 
        'Telefone', 
        'Email', 
        'InscricaoEstadual',
        'InscricaoMunicipal',
        'Ativo'
    ];

    protected $table = 'Unidade';
    protected $primaryKey = 'Id';
}
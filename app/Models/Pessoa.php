<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = [
        'NomeCompleto',
        'Nacionalidade',
        'IsExtrangeiro',
        'TipoDocumentoId',
        'NumeroDocumento',
        'OrgaoExpedidor',
        'Email',
        'CpfCnpj',
        'Profissao',
        'DataNascimento',
        'Sexo',
        'GrupoPessoaId',
        'TipoPessoa',
        'DDIFixo',
        'DDDFixo',
        'TelefoneFixo',
        'DDICelular',
        'DDDCelular',
        'TelefoneCelular',
        'PermiteEmail',
        'PermiteSms',
        'PermiteWhatsapp',
        'CEP',
        'Endereco',
        'Numero',
        'Complemento',
        'Bairro',
        'CidadeId',
        'UFId',
        'PaisId',
        'CidadeNome',
        'UFNome',
        'PaisNome'
    ];

    protected $table = 'Pessoa';
    protected $primaryKey = 'Id';

    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'TipoDocumentoId');
    }

    public function grupoPessoa()
    {
        return $this->belongsTo(GrupoPessoa::class, 'GrupoPessoaId');
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'CidadeId');
    }

    public function uf()
    {
        return $this->belongsTo(UF::class, 'UFId');
    }

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'PaisId');
    }
}
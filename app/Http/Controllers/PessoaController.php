<?php

namespace App\Http\Controllers;

use App\Models\AppResponse;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getAll()
    {
        $pessoas = Pessoa::all();
        if (!empty($pessoas))
        {
            return AppResponse::success($pessoas);
        }
    }
    
    public function show($id)
    {
        $pessoa = Pessoa::find($id);
        
        return AppResponse::success($pessoa);
    }
    
    public function insert(Request $request)
    {
        $existe = Pessoa::where('CpfCnpj', $request->input('CpfCnpj'))
            ->first();
        
        if (empty($existe))
        {
            $existe = Pessoa::where('TipoDocumentoId', $request->input('TipoDocumentoId'))
                ->where('NumeroDocumento', $request->input('NumeroDocumento'))
                ->first();
            
            if (empty($existe))
            {
                if ($request->input('CpfCnpj') != null)
                {
                    if (!self::ValidarDocumento($request->input('CpfCnpj')))
                    {
                        return AppResponse::error('Documento inválido');
                    }
                }
                
                $pessoa = new Pessoa();
                $pessoa->fill($request->all());

                $pessoa->save();

                return AppResponse::emptySuccess();
            }
            else
            {
                return AppResponse::error('Pessoa já cadastrada');
            }
            
        }
        else
        {
            return AppResponse::error('Pessoa já cadastrada');
        }
    }
    
    public function update(Request $request, $id)
    {
        $atualizado = Pessoa::where('Id', $id)
            ->update([
                'NomeCompleto' => $request->input('NomeCompleto'),
                'Nacionalidade' => $request->input('Nacionalidade'),
                'IsExtrangeiro' => $request->input('IsExtrangeiro'),
                'TipoDocumentoId' => $request->input('TipoDocumentoId'),
                'NumeroDocumento' => $request->input('NumeroDocumento'),
                'OrgaoExpedidor' => $request->input('OrgaoExpedidor'),
                'Email' => $request->input('Email'),
                'CnpjCpf' => $request->input('CnpjCpf'),
                'Profissao' => $request->input('Profissao'),
                'DataNascimento' => $request->input('DataNascimento'),
                'Sexo' => $request->input('Sexo'),
                'GrupoPessoaId' => $request->input('GrupoPessoaId'),
                'TipoPessoa' => $request->input('TipoPessoa'),
                'DDIFixo' => $request->input('DDIFixo'),
                'DDDFixo' => $request->input('DDDFixo'),
                'TelefoneFixo' => $request->input('TelefoneFixo'),
                'DDICelular' => $request->input('DDICelular'),
                'DDDCelular' => $request->input('DDDCelular'),
                'TelefoneCelular' => $request->input('TelefoneCelular'),
                'PermiteEmail' => $request->input('PermiteEmail'),
                'PermiteSms' => $request->input('PermiteSms'),
                'PermiteWhatsapp' => $request->input('PermiteWhatsapp'),
                'CEP' => $request->input('CEP'),
                'Endereco' => $request->input('Endereco'),
                'Numero' => $request->input('Numero'),
                'Complemento' => $request->input('Complemento'),
                'Bairro' => $request->input('Bairro'),
                'CidadeId' => $request->input('CidadeId'),
                'UFId' => $request->input('UFId'),
                'PaisId' => $request->input('PaisId'),
                'CidadeNome' => $request->input('CidadeNome'),
                'UFNome' => $request->input('UFNome'),
                'PaisNome' => $request->input('PaisNome')
            ]);

        if ($atualizado)
        {
            return AppResponse::emptySuccess();
        }
        else
        {
            return AppResponse::error('Erro ao atualizar');
        }
    }

    public function delete($id)
    {
        $deletado = Pessoa::where('Id', $id)
            ->delete();

        if ($deletado)
        {
            return AppResponse::emptySuccess();
        }
        else
        {
            return AppResponse::error('Erro ao deletar');
        }
    }

    private function ValidarDocumento($cnpjCpf)
    {
        $cnpjCpf = preg_replace('/[^0-9]/', '', (string) $cnpjCpf);

        if (strlen($cnpjCpf) == 11)
        {
            if (!self::ValidaCpf($cnpjCpf))
            {
                return false;
            }
        }
        else if (strlen($cnpjCpf) == 14)
        {
            if (!self::ValidaCnpj($cnpjCpf))
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    private function ValidaCnpj($cnpjCpf)
    {
        $cnpjCpf = preg_replace('/[^0-9]/', '', (string) $cnpjCpf);
        // Valida tamanho
        if (strlen($cnpjCpf) != 14)
        {
            return false;
        }
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
        {
            $soma += $cnpjCpf[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpjCpf[12] != ($resto < 2 ? 0 : 11 - $resto))
        {
            return false;
        }
        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
        {
            $soma += $cnpjCpf[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        return $cnpjCpf[13] == ($resto < 2 ? 0 : 11 - $resto);
    }
    
    private function ValidaCpf($cnpjCpf)
    {
        $cnpjCpf = preg_replace('/[^0-9]/', '', (string) $cnpjCpf);
        // Valida tamanho
        if (strlen($cnpjCpf) != 11)
        {
            return false;
        }
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--)
        {
            $soma += $cnpjCpf[$i] * $j;
        }
        $resto = $soma % 11;
        if ($cnpjCpf[9] != ($resto < 2 ? 0 : 11 - $resto))
        {
            return false;
        }
        // Valida segundo dígito verificador
        for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--)
        {
            $soma += $cnpjCpf[$i] * $j;
        }
        $resto = $soma % 11;
        return $cnpjCpf[10] == ($resto < 2 ? 0 : 11 - $resto);
    }

    private function ValidarEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return false;
        }
        return true;
    }
}
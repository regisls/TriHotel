<?php

namespace App\Http\Controllers;

use App\Models\AppResponse;
use App\Models\Unidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getAll()
    {
        $unidades = Unidade::all();
        if (!empty($unidades))
        {
            return AppResponse::success($unidades);
        }
    }
    
    public function show($id)
    {
        $unidade = Unidade::find($id);
        
        return AppResponse::success($unidade);
    }
    
    public function insert(Request $request)
    {
        $existe = Unidade::where('CNPJ', $request->input('Nome'))
            ->first();
        
        if (empty($existe))
        {
            $unidade = new Unidade();
            $unidade->fill($request->all());
            
            $unidade->save();
            
            return AppResponse::emptySuccess();
        }
        else
        {
            return AppResponse::error('Já existe uma unidade cadastrada com este CNPJ');
        }
    }
    
    public function update(Request $request, $id)
    {
        $atualizado = Unidade::where('Id', $id)
            ->update([
                'CNPJ' => $request->input('CNPJ'),
                'RazaoSocial' => $request->input('RazaoSocial'),
                'NomeFantasia' => $request->input('NomeFantasia'),
                'CEP' => $request->input('CEP'),
                'Endereco' => $request->input('Endereco'),
                'Numero' => $request->input('Numero'),
                'Complemento' => $request->input('Complemento'),
                'Bairro' => $request->input('Bairro'),
                'CidadeId' => $request->input('CidadeId'),
                'Telefone' => $request->input('Telefone'),
                'Email' => $request->input('Email'),
                'InscricaoEstadual' => $request->input('InscricaoEstadual'),
                'InscricaoMunicipal' => $request->input('InscricaoMunicipal'),
                'Ativo' => $request->input('Ativo')
            ]);
        
        return AppResponse::emptySuccess();
    }

    public function delete($id)
    {
        $deletado = Unidade::where('Id', $id)->delete();
        
        return AppResponse::emptySuccess();
    }
}
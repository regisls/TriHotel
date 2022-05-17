<?php

namespace App\Http\Controllers;

use App\Models\AppResponse;
use App\Models\GrupoPessoa;
use Illuminate\Http\Request;

class GrupoPessoaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getAll()
    {
        $grupos = GrupoPessoa::all();
        if (!empty($grupos))
        {
            return AppResponse::success($grupos);
        }
    }
    
    public function show($id)
    {
        $grupo = GrupoPessoa::find($id);
        
        return AppResponse::success($grupo);
    }
    
    public function insert(Request $request)
    {
        $existe = GrupoPessoa::where('Descricao', $request->input('Descricao'))->first();
        
        if (empty($existe))
        {
            $grupo = new GrupoPessoa();
            $grupo->fill($request->all());
            
            $grupo->save();
            
            return AppResponse::emptySuccess();
        }
        else
        {
            return AppResponse::error('Já existe um grupo cadastrado com esta descrição');
        }
    }
    
    public function update(Request $request, $id)
    {
        $atualizado = GrupoPessoa::where('Id', $id)
            ->update([
                'Descricao' => $request->input('Descricao'),
                'Ativo' => $request->input('Ativo'),
                'IsColaborador' => $request->input('IsColaborador'),
                'IsHospede' => $request->input('IsHospede')
            ]);
        
        return AppResponse::emptySuccess();
    }

    public function delete($id)
    {
        $deletado = GrupoPessoa::where('Id', $id)->delete();
        
        return AppResponse::emptySuccess();
    }
}
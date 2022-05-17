<?php

namespace App\Http\Controllers;

use App\Models\AppResponse;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class TipoDocumentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getAll()
    {
        $tiposDocumento = TipoDocumento::all();
        if (!empty($tiposDocumento))
        {
            return AppResponse::success($tiposDocumento);
        }
    }
    
    public function show($id)
    {
        $tipoDocumento = TipoDocumento::find($id);
        
        return AppResponse::success($tipoDocumento);
    }
    
    public function insert(Request $request)
    {
        $existe = TipoDocumento::where('Descricao', $request->input('Descricao'))
            ->first();
        
        if (empty($existe))
        {
            $tipoDocumento = new TipoDocumento();
            $tipoDocumento->fill($request->all());
            
            $tipoDocumento->save();
            
            return AppResponse::emptySuccess();
        }
        else
        {
            return AppResponse::error('Tipo de documento já cadastrado');
        }
    }
    
    public function update(Request $request, $id)
    {
        $atualizado = TipoDocumento::where('Id', $id)
            ->update([
                'Descricao' => $request->input('Descricao'),
                'Ativo' => $request->input('Ativo'),
                'ParaExtrangeiros' => $request->input('ParaExtrangeiros')
            ]);
        
        return AppResponse::emptySuccess();
    }

    public function delete($id)
    {
        $tipoDocumento = TipoDocumento::find($id);
        
        if (!empty($tipoDocumento))
        {
            $tipoDocumento->delete();
            
            return AppResponse::emptySuccess();
        }
        else
        {
            return AppResponse::error('Tipo de documento não encontrado');
        }
    }

    public function getAllAtivos()
    {
        $tiposDocumento = TipoDocumento::where('Ativo', true)
            ->get();
        
        return AppResponse::success($tiposDocumento);
    }

    public function getAllParaExtrangeiros()
    {
        $tiposDocumento = TipoDocumento::where('ParaExtrangeiros', true)
            ->get();
        
        return AppResponse::success($tiposDocumento);
    }

    public function getAllParaLocais()
    {
        $tiposDocumento = TipoDocumento::where('ParaExtrangeiros', false)
            ->get();
        
        return AppResponse::success($tiposDocumento);
    }
}
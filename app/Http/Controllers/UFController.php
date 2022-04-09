<?php

namespace App\Http\Controllers;

use App\Models\AppResponse;
use App\Models\UF;
use Illuminate\Http\Request;

class UFController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getAll()
    {
        $ufs = UF::all();
        if (!empty($ufs))
        {
            return AppResponse::success($ufs);
        }
    }
    
    public function show($id)
    {
        $uf = UF::find($id);
        
        return AppResponse::success($uf);
    }
    
    public function insert(Request $request)
    {
        $existe = UF::where('Sigla', $request->input('Sigla'))->first();
        
        if (empty($existe))
        {
            $uf = new UF();
            $uf->fill($request->all());
            
            $uf->save();
            
            return AppResponse::emptySuccess();
        }
        else
        {
            return AppResponse::error('Já existe uma UF cadastrada com esta sigla');
        }
    }
    
    public function update(Request $request, $id)
    {
        $atualizado = UF::where('Id', $id)
            ->update([
                'Sigla' => $request->input('Sigla'),
                'Nome' => $request->input('Nome'),
                'CodigoIBGE' => $request->input('CodigoIBGE'),
                'PaisId' => $request->input('PaisId')
            ]);
        
        return AppResponse::success($atualizado);
    }

    public function delete($id)
    {
        $deletado = UF::where('Id', $id)->delete();
        
        return AppResponse::success($deletado);
    }

    public function getCidades($ufId)
    {
        $cidades = UF::find($ufId)->cidades;
        
        return AppResponse::success($cidades);
    }

    public function getPais($ufId)
    {
        $pais = UF::find($ufId)->pais;
        
        return AppResponse::success($pais);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\AppResponse;
use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getAll()
    {
        $cidades = Cidade::all();
        if (!empty($cidades))
        {
            return AppResponse::success($cidades);
        }
    }

    public function show($id)
    {
        $cidade = Cidade::find($id);

        return AppResponse::success($cidade);
    }

    public function insert(Request $request)
    {
        $existe = Cidade::where('Nome', $request->input('Nome'))
            ->where('UFId', $request->input('UFId'))
            ->first();
        
        if (empty($existe))
        {
            $cidade = new Cidade();
            $cidade->fill($request->all());

            $cidade->save();

            return AppResponse::emptySuccess();
        }
        else
        {
            return AppResponse::error('Cidade já cadastrada');
        }
    }

    public function update(Request $request, $id)
    {
        $atualizado = Cidade::where('Id', $id)
            ->update([
                'Nome' => $request->input('Nome'),
                'CodigoIBGE' => $request->input('CodigoIBGE'),
                'UFId' => $request->input('UFId'),
                'PaisId' => $request->input('PaisId')
            ]);

        return AppResponse::emptySuccess();
    }

    public function delete($id)
    {
        $cidade = Cidade::find($id);

        $cidade->delete();

        return AppResponse::emptySuccess();
    }
}
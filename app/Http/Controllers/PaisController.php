<?php

namespace App\Http\Controllers;

use App\Models\AppResponse;
use App\Models\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getAll()
    {
        $paises = Pais::all();
        if (!empty($paises))
        {
            return AppResponse::success($paises);
        }
    }

    public function show($id)
    {
        $pais = Pais::find($id);

        return AppResponse::success($pais);
    }

    public function insert(Request $request)
    {
        $existe = Pais::where('Nome', $request->input('Nome'))->first();
        
        if (empty($existe))
        {
            $pais = new Pais();
            $pais->fill($request->all());

            $pais->save();

            return AppResponse::emptySuccess();
        }
        else
        {
            return AppResponse::error('Já existe um país cadastrado com este nome');
        }
    }

    public function update(Request $request, $id)
    {
        $atualizado = Pais::where('Id', $id)
            ->update([
                'Nome' => $request->input('Nome'),
                'Sigla' => $request->input('Sigla'),
                'DDI' => $request->input('DDI'),
                'CodigoBacen' => $request->input('CodigoBacen')
            ]);

        return AppResponse::emptySuccess();
    }

    public function delete($id)
    {
        $pais = Pais::find($id);

        if (!empty($pais))
        {
            $pais->delete();

            return AppResponse::emptySuccess();
        }
        else
        {
            return AppResponse::error('Pais não encontrado');
        }
    }

    public function getAllUFs($paisId)
    {
        $pais = Pais::find($paisId);

        if (!empty($pais))
        {
            return AppResponse::success($pais->UFs);
        }
        else
        {
            return AppResponse::error('Pais não encontrado');
        }
    }
}
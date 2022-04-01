<?php

namespace App\Http\Controllers;

use App\Models\AppResponse;
use App\Models\Transporte;
use Illuminate\Http\Request;

class TransporteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAll()
    {
        $transportes = Transporte::all();
        if (!empty($transportes))
        {
            return AppResponse::success($transportes);
        }
    }

    public function show($id)
    {
        $transporte = Transporte::find($id);

        return AppResponse::success($transporte);
    }

    public function insert(Request $request)
    {
        $existe = Transporte::where('Descricao', $request->input('Descricao'))->first();
        
        if (empty($existe))
        {
            $transporte = new Transporte;
            $transporte->fill($request->all());

            $transporte->save();

            return AppResponse::emptySuccess();
        }
        else
        {
            return AppResponse::error('Já existe um meio de transporte cadastrado com esta descrição');
        }
    }

    public function update(Request $request, $id)
    {
        $atualizado = Transporte::where('Id', $id)
            ->update([
                'Descricao' => $request->input('Descricao'),
                'Ativo' => $request->boolean('Ativo'),
                'CodigoIntegracao' => $request->input('CodigoIntegracao')
            ]);

        return AppResponse::success($atualizado);
    }

    public function delete(Request $request, $id)
    {
        $excluido = Transporte::where('Id', $id)->delete();

        return AppResponse::emptySuccess(204);
    }
}

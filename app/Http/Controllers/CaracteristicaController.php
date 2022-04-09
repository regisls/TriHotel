<?php

namespace App\Http\Controllers;

use App\Models\AppResponse;
use App\Models\Caracteristica;
use Illuminate\Http\Request;

class CaracteristicaController extends Controller
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
        $caracteristicas = Caracteristica::all();
        if (!empty($caracteristicas))
        {
            return AppResponse::success($caracteristicas);
        }
    }

    public function show($id)
    {
        $caracteristica = Caracteristica::find($id);

        return AppResponse::success($caracteristica);
    }

    public function insert(Request $request)
    {
        $existe = Caracteristica::where('Descricao', $request->input('Descricao'))->first();
        
        if (empty($existe))
        {
            $caracteristica = new Caracteristica();
            $caracteristica->fill($request->all());

            $caracteristica->save();

            return AppResponse::emptySuccess();
        }
        else
        {
            return AppResponse::error('Já existe uma caracteristica cadastrada com esta descrição');
        }
    }

    public function update(Request $request, $id)
    {
        $atualizado = Caracteristica::where('Id', $id)
            ->update([
                'Descricao' => $request->input('Descricao'),
                'Ativo' => $request->boolean('Ativo'),
                'Complemento' => $request->input('Complemento')
            ]);

        return AppResponse::success($atualizado);
    }

    public function delete(Request $request, $id)
    {
        $excluido = Caracteristica::where('Id', $id)->delete();

        return AppResponse::emptySuccess(204);
    }
}

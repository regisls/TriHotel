<?php

namespace App\Http\Controllers;

use App\Models\AppResponse;
use App\Models\Motivacao;
use Illuminate\Http\Request;

class MotivacaoController extends Controller
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
        $motivacoes = Motivacao::all();
        if (!empty($motivacoes))
        {
            return AppResponse::success($motivacoes);
        }
    }

    public function show($id)
    {
        $Motivacao = Motivacao::find($id);

        return AppResponse::success($Motivacao);
    }

    public function insert(Request $request)
    {
        $existe = Motivacao::where('Descricao', $request->input('Descricao'))->first();
        
        if (empty($existe))
        {
            $motivacao = new Motivacao;
            $motivacao->fill($request->all());

            $motivacao->save();

            return AppResponse::emptySuccess();
        }
        else
        {
            return AppResponse::error('Já existe uma motivação cadastrada com esta descrição');
        }
    }

    public function update(Request $request, $id)
    {
        $atualizado = Motivacao::where('Id', $id)
            ->update([
                'Descricao' => $request->input('Descricao'),
                'Ativo' => $request->boolean('Ativo'),
                'CodigoIntegracao' => $request->input('CodigoIntegracao')
            ]);

        return AppResponse::success($atualizado);
    }

    public function delete(Request $request, $id)
    {
        $excluido = Motivacao::where('Id', $id)->delete();

        return AppResponse::emptySuccess(204);
    }
}

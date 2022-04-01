<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\AppResponse;
use Illuminate\Http\Request;
use Auth;

class CategoriaController extends Controller
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
        $categorias = Categoria::all();
        if (!empty($categorias))
        {
            return AppResponse::success($categorias);
        }
    }

    public function show($id)
    {
        $categoria = Categoria::find($id);

        return AppResponse::success($categoria);
    }

    public function insert(Request $request)
    {
        $existe = Categoria::where('Descricao', $request->input('Descricao'))->first();

        if (empty($existe))
        {
            $categoria = new Categoria;
            $categoria->fill($request->all());

            $categoria->save();

            return AppResponse::emptySuccess();
        }
        else
        {
            return AppResponse::error('Já existe uma categoria cadastrada com esta descrição');
        }
    }

    public function update(Request $request, $id)
    {
        $atualizado = Categoria::where('Id', $id)
            ->update([
                'Descricao' => $request->input('Descricao'),
                'Ativo' => $request->boolean('Ativo')
            ]);

        return AppResponse::success($atualizado);
    }

    public function delete(Request $request, $id)
    {
        $excluido = Categoria::where('Id', $id)->delete();

        return AppResponse::emptySuccess(204);
    }
}

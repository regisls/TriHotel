<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getAll() 
    {
        $categorias = Categoria::all();
        if (!empty($categorias))
        {
            return response()->json($categorias);
        }
    }

    public function show($id)
    {
        $categoria = Categoria::find($id);

        return response()->json($categoria);
    }

    public function insert(Request $request)
    {
        $categoria = new Categoria;
        $categoria->fill($request->all());

        $categoria->save();
        
        return response('', 201);
    }

    public function update(Request $request, $id)
    {
        $atualizado = Categoria::where('Id', $id)
            ->update([
                'Descricao' => $request->input('Descricao'),
                'Ativo' => $request->boolean('Ativo')
            ]);

        return response('', 200);
    }

    public function delete(Request $request, $id)
    {
        $excluido = Categoria::where('Id', $id)->delete();

        return response('', 204);
    }
}

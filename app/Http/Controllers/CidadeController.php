<?php

namespace App\Http\Controllers;

use App\Models\AppResponse;
use App\Models\Cidade;
use App\Models\UF;
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

    public function findByCEP($cep)
    {
        $cidade = Cidade::where('CEP', $cep)->first();

        if (!empty($cidade))
        {
            return AppResponse::success($cidade);
        }
        else
        {
            // get city info on viacep api and insert in database
            $cidade = $this->getCityInfo($cep);

            $url = 'https://viacep.com.br/ws/' . $cep . '/json/';
            $curl = curl_init();
            
        }

        return AppResponse::success($cidade);
    }

    private function getCityInfo($cep)
    {
        $url = 'https://viacep.com.br/ws/' . $cep . '/json/';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result, true);

        $cidade = new Cidade();
        $cidade->Nome = $result['localidade'];
        $cidade->UFId = UF::where('Sigla', $result['uf'])->first()->Id;
        $cidade->CEP = $result['cep'];
        $cidade->save();
    }
}
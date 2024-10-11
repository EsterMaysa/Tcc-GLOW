<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FarmaciaUBSModel;

class FarmaciaUBSController extends Controller
{
    public function index()
    {
        $farmacias = FarmaciaUBSModel::all();
        return response()->json($farmacias);
    }

    public function store(Request $request)
    {
        $farmacia = new FarmaciaUBSModel();
        $farmacia->nomeFarmacia = $request->nome;
        $farmacia->idUBS = $request->idUBS;
        $farmacia->situacaoFarmacia = $request->situacao;
        $farmacia->dataCadastroFarmacia = now();

        $farmacia->save();
        return response()->json(['message' => 'Farmácia UBS criada com sucesso!'], 201);
    }

    public function updateapi(Request $request, $id)
    {
        FarmaciaUBSModel::where('idFarmaciaUBS', $id)->update([
            'nomeFarmacia' => $request->nome,
            'idUBS' => $request->idUBS,
            'situacaoFarmacia' => $request->situacao,
        ]);

        return response()->json(['message' => 'Sucesso', 'code' => 200]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ModelPrescricao;
use Illuminate\Http\Request;

class PrescricaoController extends Controller
{
    public function index()
    {
        $prescricoes = ModelPrescricao::all();
        return response()->json($prescricoes);
    }

    public function store(Request $request)
    {
        $prescricao = new ModelPrescricao();
        $prescricao->dataPrescricao = $request->dataPrescricao;
        $prescricao->quantPrescricao = $request->quantPrescricao;
        $prescricao->dosagemPrescricao = $request->dosagemPrescricao;
        $prescricao->duracaoRemedio = $request->duracaoRemedio;
        $prescricao->idMedicamento = $request->idMedicamento;
        $prescricao->situacaoPrescricao = $request->situacaoPrescricao;
        $prescricao->dataCadastroPrescricao = now();
        $prescricao->save();

        return response()->json(['message' => 'Prescrição cadastrada com sucesso!'], 201);
    }

    public function show($id)
    {
        $prescricao = ModelPrescricao::find($id);
        if (!$prescricao) {
            return response()->json(['message' => 'Prescrição não encontrada'], 404);
        }
        return response()->json($prescricao);
    }

    public function update(Request $request, $id)
    {
        $prescricao = ModelPrescricao::find($id);
        if (!$prescricao) {
            return response()->json(['message' => 'Prescrição não encontrada'], 404);
        }

        $prescricao->update($request->all());
        return response()->json($prescricao);
    }

    public function destroy($id)
    {
        $prescricao = ModelPrescricao::find($id);
        if (!$prescricao) {
            return response()->json(['message' => 'Prescrição não encontrada'], 404);
        }

        $prescricao->delete();
        return response()->json(['message' => 'Prescrição deletada com sucesso']);
    }
}

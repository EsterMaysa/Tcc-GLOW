<?php

namespace App\Http\Controllers;

use App\Models\ModelPrescricao;
use App\Models\ModelMedicamentoFarmaciaUBS;

use Illuminate\Http\Request;

class PrescricaoController extends Controller
{
    public function index()
    {
        $prescricoes = ModelPrescricao::with('medicamento')->get();
        $medicamento = ModelMedicamentoFarmaciaUBS::all();
        return view('farmacia.Medicamento.cadPrescrição', compact('medicamento','prescricoes'));
    }

    public function store(Request $request)
    {
        $prescricao = new ModelPrescricao();
        $prescricao->dataPrescricao = $request->dataPrescricao;
        $prescricao->quantPrescricao = $request->quantPrescricao;
        $prescricao->dosagemPrescricao = $request->dosagemPrescricao;
        $prescricao->duracaoRemedio = $request->duracaoRemedio;
        $prescricao->idMedicamento = $request->idMedicamento;
        $prescricao->situacaoPrescricao = "A";
        $prescricao->dataCadastroPrescricao = now();
        $prescricao->save();

        return redirect('/prescricao');
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

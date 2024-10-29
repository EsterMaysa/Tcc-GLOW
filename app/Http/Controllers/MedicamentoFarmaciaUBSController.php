<?php

namespace App\Http\Controllers;

use App\Models\ModelMedicamentoFarmaciaUBS;
use Illuminate\Http\Request;

class MedicamentoFarmaciaUBSController extends Controller
{
    public function index()
    {
        $medicamentos = ModelMedicamentoFarmaciaUBS::all();
        return response()->json($medicamentos);
    }

    public function store(Request $request)
    {
        $medicamento = new ModelMedicamentoFarmaciaUBS();
        $medicamento->nomeMedicamento = $request->nomeMedicamento;
        $medicamento->nomeGenericoMedicamento = $request->nomeGenericoMedicamento;
        $medicamento->codigoDeBarrasMedicamento = $request->codigoDeBarrasMedicamento;
        $medicamento->validadeMedicamento = $request->validadeMedicamento;
        $medicamento->loteMedicamento = $request->loteMedicamento;
        $medicamento->dosagemMedicamento = $request->dosagemMedicamento;
        $medicamento->formaFarmaceuticaMedicamento = $request->formaFarmaceuticaMedicamento;
        $medicamento->composicaoMedicamento = $request->composicaoMedicamento;
        $medicamento->situacaoMedicamento = $request->situacaoMedicamento;
        $medicamento->dataCadastroMedicamento = now();
        $medicamento->save();

        return response()->json(['message' => 'Medicamento cadastrado com sucesso!'], 201);
    }

    public function show($id)
    {
        $medicamento = ModelMedicamentoFarmaciaUBS::find($id);
        if (!$medicamento) {
            return response()->json(['message' => 'Medicamento não encontrado'], 404);
        }
        return response()->json($medicamento);
    }

    public function update(Request $request, $id)
    {
        $medicamento = ModelMedicamentoFarmaciaUBS::find($id);
        if (!$medicamento) {
            return response()->json(['message' => 'Medicamento não encontrado'], 404);
        }

        $medicamento->update($request->all());
        return response()->json($medicamento);
    }

    public function destroy($id)
    {
        $medicamento = ModelMedicamentoFarmaciaUBS::find($id);
        if (!$medicamento) {
            return response()->json(['message' => 'Medicamento não encontrado'], 404);
        }

        $medicamento->delete();
        return response()->json(['message' => 'Medicamento deletado com sucesso']);
    }
}

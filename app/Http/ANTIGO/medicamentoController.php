<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\medicamentoFarmaciaModel; // Corrigido para começar com letra maiúscula
use Illuminate\Routing\Controller;

class MedicamentoController extends Controller // Corrigido para começar com letra maiúscula
{
    public function updateapi(Request $request, $id)
    {
        $medicamento = medicamentoFarmaciaModel::findOrFail($id); // Obter o medicamento pelo ID

        $medicamento->update([
            'idTipoMedicamento' => $request->idTipoMedicamento,
            'nomeMedicamento' => $request->nomeMedicamento,
            'nomeGenericoMedicamento' => $request->nomeGenericoMedicamento,
            'codigoDeBarrasMedicamento' => $request->codigoDeBarrasMedicamento,
            'validadeMedicamento' => $request->validadeMedicamento,
            'loteMedicamento' => $request->loteMedicamento,
            'fabricacaoMedicamento' => $request->fabricacaoMedicamento,
            'dosagemMedicamento' => $request->dosagemMedicamento,
            'formaFarmaceuticaMedicamento' => $request->formaFarmaceuticaMedicamento,
            'fabricanteMedicamento' => $request->fabricanteMedicamento,
            'quantMedicamento' => $request->quantMedicamento,
            'composicaoMedicamento' => $request->composicaoMedicamento,
            'idTipoMedicamento' => $request->idTipoMedicamento,
            'idFabricante' => $request->idFabricante,
        ]);

        return response()->json(['message' => 'Sucesso', 'code' => 200]);
    }

    public function storeapi(Request $request)
    {
        $request->validate([
            'idTipoMedicamento' => 'required|string|max:255',
            'nomeMedicamento' => 'required|string|max:255',
            'nomeGenericoMedicamento' => 'nullable|string|max:255',
            'codigoDeBarrasMedicamento' => 'nullable|string|max:255',
            'validadeMedicamento' => 'required|date',
            'loteMedicamento' => 'nullable|string|max:255',
            'fabricacaoMedicamento' => 'required|date',
            'dosagemMedicamento' => 'nullable|string|max:255',
            'formaFarmaceuticaMedicamento' => 'nullable|string|max:255',
            'fabricanteMedicamento' => 'nullable|string|max:255',
            'quantMedicamento' => 'required|integer|min:1',
            'composicaoMedicamento' => 'nullable|string|max:255',
        ]);

        $medicamento = MedicamentoFarmaciaModel::create($request->all());

        return response()->json(['message' => 'Medicamento criado com sucesso!'], 200);
    }

    // Exibe o formulário
    public function create()
    {
        return view('farmacia.MedicamentoEstoque'); // A view que contém o formulário
    }

    // Processa o formulário
    public function store(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'idTipoMedicamento' => 'required|max:30',
            'nomeMedicamento' => 'required|max:30',
            'nomeGenericoMedicamento' => 'nullable|max:30',
            'codigoDeBarrasMedicamento' => 'nullable|max:15',
            'validadeMedicamento' => 'required|date',
            'loteMedicamento' => 'required|max:30',
            'fabricacaoMedicamento' => 'required|date',
            'dosagemMedicamento' => 'required|max:30',
            'formaFarmaceuticaMedicamento' => 'nullable|max:30',
            'fabricanteMedicamento' => 'nullable|max:30',
            'quantMedicamento' => 'required|numeric|min:1',
            'composicaoMedicamento' => 'nullable|max:255',
        ]);
    
        try {
            // Tentar salvar os dados no banco de dados
            MedicamentoFarmaciaModel::create($validatedData);
    
            // Se der certo, exibe uma mensagem de sucesso
            return redirect()->back()->with('success', 'Medicamento cadastrado com sucesso!');
        } catch (\Exception $e) {
            // Se houver um erro, exibe uma mensagem de erro
            return redirect()->back()->with('error', 'Falha ao cadastrar o medicamento.');
        }
    }
    
}

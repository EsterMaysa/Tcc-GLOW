<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelSaidaMedicamento;
use App\Models\ModelFuncionarioFarmaciaUBS;
use App\Models\ModelMedicamentoFarmaciaUBS; // Ajuste para o model correto de medicamentos

class SaidaMedicamentoController extends Controller
{
    public function index(Request $request)
{
    $query = ModelSaidaMedicamento::join('tbFuncionarioFarmaciaUBS', 'tbSaidaMedicamento.idFuncionario', '=', 'tbFuncionarioFarmaciaUBS.idFuncionario')
        ->join('tbMedicamentoFarmaciaUBS', 'tbSaidaMedicamento.idMedicamento', '=', 'tbMedicamentoFarmaciaUBS.idMedicamento')
        ->select(
            'tbSaidaMedicamento.idSaidaMedicamento',
            'tbFuncionarioFarmaciaUBS.nomeFuncionario',
            'tbMedicamentoFarmaciaUBS.nomeMedicamento',
            'tbSaidaMedicamento.dataSaida',
            'tbSaidaMedicamento.quantidade',
            'tbSaidaMedicamento.motivoSaida'
        );

    if ($request->filled('dataSaida')) {
        $query->where('tbSaidaMedicamento.dataSaida', $request->dataSaida);
    }

    if ($request->filled('motivoSaida')) {
        $query->where('tbSaidaMedicamento.motivoSaida', 'like', '%' . $request->motivoSaida . '%');
    }

    $saidas = $query->get();

    return view('saidaMedMotivoLista', compact('saidas'));
}


    public function create()
    {
        $saida = ModelSaidaMedicamento::findOrFail($id);

        $funcionarios = ModelFuncionarioFarmaciaUBS::all();
        $medicamentos = ModelMedicamentoFarmaciaUBS::all();

        return view('saidaMedMotivoCadastro', compact('funcionarios', 'medicamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dataSaida' => 'required|date',
            'quantidade' => 'required|integer|min:1',
            'motivoSaida' => 'nullable|string|max:255',
            'idFuncionario' => 'required|integer|exists:tbFuncionarioFarmaciaUBS,idFuncionario', // Regra de validação com a tabela correta
            'idMedicamento' => 'required|integer|exists:tbMedicamentoFarmaciaUBS,idMedicamento',
        ]);

        ModelSaidaMedicamento::create([
            'dataSaida' => $request->dataSaida,
            'quantidade' => $request->quantidade,
            'motivoSaida' => $request->motivoSaida,
            'idFuncionario' => $request->idFuncionario,
            'idMedicamento' => $request->idMedicamento,
            'situacao' => 1,
        ]);

        return redirect()->route('saidaMedMotivo.index')->with('success', 'Saída de medicamento e motivo cadastrados com sucesso!');
    }

    public function edit($id)
    {
        $saida = ModelSaidaMedicamento::findOrFail($id);
        $funcionarios = ModelFuncionarioFarmaciaUBS::all();
        $medicamentos = ModelMedicamentoFarmaciaUBS::all();

        return view('saidaMedMotivoEdit', compact('saida', 'funcionarios', 'medicamentos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dataSaida' => 'required|date',
            'quantidade' => 'required|integer|min:1',
            'motivoSaida' => 'nullable|string|max:255',
            'idFuncionario' => 'required|integer|exists:tbFuncionarioFarmaciaUBS,idFuncionario',
            'idMedicamento' => 'required|integer|exists:tbMedicamentoFarmaciaUBS,idMedicamento',
        ]);

        $saida = ModelSaidaMedicamento::findOrFail($id);
        $saida->update($request->only(['dataSaida', 'quantidade', 'motivoSaida', 'idFuncionario', 'idMedicamento']));

        return redirect()->route('saidaMedMotivo.index')->with('success', 'Saída de medicamento atualizada com sucesso!');
    }

    public function excluir(Request $request, $id)
    {
        $saida = ModelSaidaMedicamento::find($id);

        if (!$saida) {
            return redirect()->back()->with('error', 'Saída de medicamento não encontrada.');
        }

        $saida->situacao = 0;  // Marca como excluído (não usa soft delete)
        $saida->save();

        return redirect()->route('saidaMedMotivo.index')->with('success', 'Saída de medicamento excluída com sucesso!');
    }
}

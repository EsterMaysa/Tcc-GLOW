<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelSaidaMedicamento;
use App\Models\Medicamento; // Certifique-se de ter o model de Medicamento

class SaidaMedicamentoController extends Controller
{
    public function index(Request $request)
    {
        // Obtém as saídas de medicamento ativas
        $query = ModelSaidaMedicamento::where('situacao', 1); // Apenas as ativas

        // Filtra por data
        if ($request->filled('dataSaida')) {
            $query->where('dataSaida', $request->dataSaida);
        }

        // Filtra por motivo
        if ($request->filled('motivoSaida')) {
            $query->where('motivoSaida', 'like', '%' . $request->motivoSaida . '%');
        }

        $saidas = $query->get(); // Executa a consulta

        return view('saidaMedMotivoLista', compact('saidas'));
    }

    public function create()
    {
        // Busca os medicamentos cadastrados
        $medicamentos = ModelSaidaMedicamento::all(); // Ajuste conforme o nome do seu model

        // Exibe o formulário de cadastro
        return view('saidaMedMotivoCadastro', compact('medicamentos')); // Passa os medicamentos para a view
    }

    public function store(Request $request)
    {
        $request->validate([
            'dataSaida' => 'required|date',
            'quantidade' => 'required|integer|min:1',
            'motivoSaida' => 'nullable|string|max:255', // Novo campo para o motivo
            'idMedicamento' => 'required|exists:tbmedicamentofarmaciaubs,id', // Validação para idMedicamento
        ]);

        // Criação da saída de medicamento com o motivo diretamente
        ModelSaidaMedicamento::create([
            'dataSaida' => $request->dataSaida,
            'quantidade' => $request->quantidade,
            'motivoSaida' => $request->motivoSaida,
            'situacao' => 1, // Define como ativo
            'idMedicamento' => $request->idMedicamento, // Armazena o idMedicamento
        ]);

        return redirect()->back()->with('success', 'Saída de medicamento e motivo cadastrados com sucesso!');
    }

    public function edit($id)
    {
        // Obtém a saída de medicamento pelo ID
        $saida = ModelSaidaMedicamento::findOrFail($id);
        $medicamentos = Medicamento::all(); // Busca os medicamentos cadastrados

        // Retorna a view de edição com os dados da saída e os medicamentos
        return view('saidaMedMotivoEdit', compact('saida', 'medicamentos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dataSaida' => 'required|date',
            'quantidade' => 'required|integer|min:1',
            'motivoSaida' => 'nullable|string|max:255',
            'idMedicamento' => 'required|exists:tbmedicamentofarmaciaubs,id', // Validação para idMedicamento
        ]);

        // Atualiza a saída de medicamento
        $saida = ModelSaidaMedicamento::findOrFail($id);
        $saida->update($request->all());

        return redirect()->route('saidaMedMotivo.index')->with('success', 'Saída de medicamento atualizada com sucesso!');
    }

    public function excluir(Request $request, $id)
    {
        // Encontra a saída de medicamento pelo ID
        $saida = ModelSaidaMedicamento::find($id);
        
        if (!$saida) {
            return redirect()->back()->with('error', 'Saída de medicamento não encontrada.');
        }

        // Altera a situação da saída de medicamento para 0 (inativa)
        $saida->situacao = 0; // Define como inativa
        $saida->save();

        // Mensagem de sucesso
        return redirect()->route('saidaMedMotivo.index')->with('success', 'Saída de medicamento excluída com sucesso!');
    }
}

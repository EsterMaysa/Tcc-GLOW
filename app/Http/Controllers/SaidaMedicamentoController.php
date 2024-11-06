<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelSaidaMedicamento;

class SaidaMedicamentoController extends Controller
{
    public function index(Request $request)
    {
        // Filtra saídas apenas ativas
        $query = ModelSaidaMedicamento::where('situacao', 1);

        if ($request->filled('dataSaida')) {
            $query->where('dataSaida', $request->dataSaida);
        }

        if ($request->filled('motivoSaida')) {
            $query->where('motivoSaida', 'like', '%' . $request->motivoSaida . '%');
        }

        $saidas = $query->get();

        return view('farmacia.Medicamento.saidaMedMotivoLista', compact('saidas'));
    }

    public function create()
    {
        return view('farmacia.Medicamento.saidaMedMotivoCadastro');
    }

    public function store(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'dataSaida' => 'required|date',
            'quantidade' => 'required|integer|min:1',
            'motivoSaida' => 'nullable|string|max:255',
        ]);

        // Cria um novo registro de saída de medicamento
        ModelSaidaMedicamento::create([
            'dataSaida' => $request->dataSaida,
            'quantidade' => $request->quantidade,
            'motivoSaida' => $request->motivoSaida,
            'situacao' => 1,
        ]);

        return redirect()->back()->with('success', 'Saída de medicamento e motivo cadastrados com sucesso!');
    }

    public function edit($id)
    {
        $saida = ModelSaidaMedicamento::findOrFail($id);
        return view('farmacia.Medicamento.saidaMedMotivoEdit', compact('saida'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dataSaida' => 'required|date',
            'quantidade' => 'required|integer|min:1',
            'motivoSaida' => 'nullable|string|max:255',
        ]);

        $saida = ModelSaidaMedicamento::findOrFail($id);
        $saida->update($request->only(['dataSaida', 'quantidade', 'motivoSaida']));

        return redirect()->route('saidaMedMotivo.index')->with('success', 'Saída de medicamento atualizada com sucesso!');
    }

    public function excluir(Request $request, $id)
    {
        $saida = ModelSaidaMedicamento::find($id);

        if (!$saida) {
            return redirect()->back()->with('error', 'Saída de medicamento não encontrada.');
        }

        $saida->situacao = 0;
        $saida->save();

        return redirect()->route('saidaMedMotivo.index')->with('success', 'Saída de medicamento excluída com sucesso!');
    }
}




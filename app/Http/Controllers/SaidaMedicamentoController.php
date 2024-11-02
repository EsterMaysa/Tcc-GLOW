<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelSaidaMedicamento;
use App\Models\ModelMotivoSaida;

class SaidaMedicamentoController extends Controller
{
    public function create()
    {
        // Carregue os motivos de saída
        $motivos = ModelMotivoSaida::all();

        // Verifique se os motivos foram carregados corretamente
        if ($motivos->isEmpty()) {
            return redirect()->back()->with('error', 'Nenhum motivo de saída encontrado.');
        }

        return view('saidaMed', compact('motivos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dataSaida' => 'required|date',
            'quantidade' => 'required|integer|min:1',
            'idMotivoSaida' => 'required|exists:tbmotivosaida,id' // Confirme se 'id' é a coluna correta
        ]);

        ModelSaidaMedicamento::create([
            'dataSaida' => $request->dataSaida,
            'quantidade' => $request->quantidade,
            'idMotivoSaida' => $request->idMotivoSaida
        ]);

        return redirect()->back()->with('success', 'Saída de medicamento cadastrada com sucesso!');
    }
}

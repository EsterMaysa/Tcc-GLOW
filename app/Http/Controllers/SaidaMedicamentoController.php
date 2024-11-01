<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaidaMedicamento; // Certifique-se de que os modelos necessários foram importados
use App\Models\MotivoSaida;


class SaidaMedicamentoController extends Controller
{
    // Exibe o formulário de criação
    public function create()
    {
        $motivos = MotivoSaida::all(); // Carrega os motivos de saída para o formulário
        return view('saidaMedicamento', compact('motivos')); // Carrega a view 'saidaMed' com a lista de motivos
    }

    // Salva os dados no banco de dados
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'dataSaida' => 'required|date',
            'quantidade' => 'required|integer',
            'idMotivoSaida' => 'required|exists:tbmotivoSaida,idMotivoSaida',
        ]);

        SaidaMedicamento::create($validatedData);

        return redirect()->route('saidaMedicamento.create')->with('success', 'Saída de medicamento cadastrada com sucesso!');
    }
}

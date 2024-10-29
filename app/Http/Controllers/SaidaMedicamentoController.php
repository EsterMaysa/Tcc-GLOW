<?php

namespace App\Http\Controllers;

use App\Models\ModelSaidaMedicamento;
use Illuminate\Http\Request;

class SaidaMedicamentoController extends Controller
{
    public function index()
    {
        $saidas = ModelSaidaMedicamento::all();
        return response()->json($saidas);
    }

    public function store(Request $request)
    {
        $saida = new ModelSaidaMedicamento();
        $saida->dataSaida = $request->dataSaida;
        $saida->quantidade = $request->quantidade;
        $saida->idMotivoSaida = $request->idMotivoSaida;
        $saida->save();

        return response()->json(['message' => 'Saída de medicamento cadastrada com sucesso!'], 201);
    }

    public function show($id)
    {
        $saida = ModelSaidaMedicamento::find($id);
        if (!$saida) {
            return response()->json(['message' => 'Saída não encontrada'], 404);
        }
        return response()->json($saida);
    }

    public function update(Request $request, $id)
    {
        $saida = ModelSaidaMedicamento::find($id);
        if (!$saida) {
            return response()->json(['message' => 'Saída não encontrada'], 404);
        }

        $saida->update($request->all());
        return response()->json($saida);
    }

    public function destroy($id)
    {
        $saida = ModelSaidaMedicamento::find($id);
        if (!$saida) {
            return response()->json(['message' => 'Saída não encontrada'], 404);
        }

        $saida->delete();
        return response()->json(['message' => 'Saída deletada com sucesso']);
    }
}

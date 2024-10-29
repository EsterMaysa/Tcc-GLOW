<?php

namespace App\Http\Controllers;

use App\Models\ModelEntradaMedicamento;
use Illuminate\Http\Request;

class EntradaMedicamentoController extends Controller
{
    public function index()
    {
        $entradas = ModelEntradaMedicamento::all();
        return response()->json($entradas);
    }

    public function store(Request $request)
    {
        $entrada = new ModelEntradaMedicamento();
        $entrada->dataEntrada = $request->dataEntrada;
        $entrada->quantidade = $request->quantidade;
        $entrada->lote = $request->lote;
        $entrada->validade = $request->validade;
        $entrada->idFuncionario = $request->idFuncionario;
        $entrada->idMedicamento = $request->idMedicamento;
        $entrada->idMotivoEntrada = $request->idMotivoEntrada;
        $entrada->save();

        return response()->json(['message' => 'Entrada de medicamento cadastrada com sucesso!'], 201);
    }

    public function show($id)
    {
        $entrada = ModelEntradaMedicamento::find($id);
        if (!$entrada) {
            return response()->json(['message' => 'Entrada não encontrada'], 404);
        }
        return response()->json($entrada);
    }

    public function update(Request $request, $id)
    {
        $entrada = ModelEntradaMedicamento::find($id);
        if (!$entrada) {
            return response()->json(['message' => 'Entrada não encontrada'], 404);
        }

        $entrada->update($request->all());
        return response()->json($entrada);
    }

    public function destroy($id)
    {
        $entrada = ModelEntradaMedicamento::find($id);
        if (!$entrada) {
            return response()->json(['message' => 'Entrada não encontrada'], 404);
        }

        $entrada->delete();
        return response()->json(['message' => 'Entrada deletada com sucesso']);
    }
}

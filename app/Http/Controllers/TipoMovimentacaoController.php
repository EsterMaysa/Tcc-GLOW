<?php

namespace App\Http\Controllers;

use App\Models\ModelTipoMovimentacao;
use Illuminate\Http\Request;

class TipoMovimentacaoController extends Controller
{
    public function index()
    {
        $movimentacoes = ModelTipoMovimentacao::all();
        return response()->json($movimentacoes);
    }

    public function store(Request $request)
    {
        $movimentacao = new ModelTipoMovimentacao();
        $movimentacao->movimentacao = $request->movimentacao;
        $movimentacao->situacaoTipoMovimentacao = $request->situacaoTipoMovimentacao;
        $movimentacao->dataCadastroTipoMovimentacao = now();
        $movimentacao->save();

        return response()->json(['message' => 'Tipo de movimentação cadastrado com sucesso!'], 201);
    }

    public function show($id)
    {
        $movimentacao = ModelTipoMovimentacao::find($id);
        if (!$movimentacao) {
            return response()->json(['message' => 'Movimentação não encontrada'], 404);
        }
        return response()->json($movimentacao);
    }

    public function update(Request $request, $id)
    {
        $movimentacao = ModelTipoMovimentacao::find($id);
        if (!$movimentacao) {
            return response()->json(['message' => 'Movimentação não encontrada'], 404);
        }

        $movimentacao->update($request->all());
        return response()->json($movimentacao);
    }

    public function destroy($id)
    {
        $movimentacao = ModelTipoMovimentacao::find($id);
        if (!$movimentacao) {
            return response()->json(['message' => 'Movimentação não encontrada'], 404);
        }

        $movimentacao->delete();
        return response()->json(['message' => 'Movimentação deletada com sucesso']);
    }
}

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
        // Validação dos dados
       

        // Cria uma nova entrada na tabela
        $tipo = new TipoMovimentacao();
        $tipo->movimentacao = $request->movimentacao;
        $tipo->situacaoTipoMovimentacao = '1'; // Definido como 1
        $tipo->dataCadastroTipoMovimentacao = now(); // Usando now()
        $tipo->idPrescricao = $request->idPrescricao; // Caso o ID da prescrição seja fornecido
        $tipo->save(); // Salvar o registro

        
        
        // Redireciona com uma mensagem de sucesso
        return redirect()->route('farmacia.TipoMovimentacao.tipoMovimentacao')->with('success', 'Tipo de movimentação cadastrado com sucesso!');
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

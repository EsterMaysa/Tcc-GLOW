<?php

namespace App\Http\Controllers;

use App\Models\ModelEstoqueFarmaciaUBS;
use App\Models\ModelMedicamentoFarmaciaUBS;
use App\Models\ModelFuncionario;
use App\Models\ModelTipoMovimentacao;

use Illuminate\Http\Request;

class EstoqueFarmaciaUBSController extends Controller
{
    public function index()
    {
        $estoque = ModelEstoqueFarmaciaUBS::with(['funcionario', 'medicamento','tipoMovimentacao'])
        ->orderBy('dataCadastroEstoque', 'desc')
        ->take(5)
        ->get();


        $medicamento = ModelMedicamentoFarmaciaUBS::take(5)->orderBy('dataCadastroMedicamento', 'desc')->get();
        $funcionario = ModelFuncionario::all();
        $tipoMovimentacao = ModelTipoMovimentacao::all();

        return view('farmacia.Estoque.estoque', compact('estoque','medicamento','funcionario','tipoMovimentacao'));
    }
    public function store(Request $estoqueRequest)
    {
        // Busca ou cria o registro de estoque pelo ID do medicamento
        $estoque = ModelEstoqueFarmaciaUBS::firstOrNew([
            'idMedicamento' => $estoqueRequest->idMedicamento
        ]);
    
        // Ajusta a quantidade com base no tipo de movimentação
        if ($estoqueRequest->idTipoMovimentacao == 1) { // 1 para Entrada
            $estoque->quantEstoque = ($estoque->quantEstoque ?? 0) + $estoqueRequest->quantEstoque;
        } else {
            $estoque->quantEstoque = ($estoque->quantEstoque ?? 0) - $estoqueRequest->quantEstoque;
        }
    
        // Dados adicionais para movimentação
        $estoque->dataMovimentacao = $estoqueRequest->dataMovimentacao;
        $estoque->idFuncionario = $estoqueRequest->idFuncionario;
        $estoque->idTipoMovimentacao = $estoqueRequest->idTipoMovimentacao;
        $estoque->situacaoEstoque = "A";
        $estoque->dataCadastroEstoque = $estoque->dataCadastroEstoque ?? now();
    
        // Salva o estoque com a nova quantidade
        $estoque->save();
    
        // return redirect('/estoqueHome')->with('success', 'Estoque registrado com sucesso!');
    }

    // public function store(Request $estoqueRequest)
    // {
    //     $estoque = new ModelEstoqueFarmaciaUBS();

    //     $estoque->quantEstoque = $estoqueRequest->quantEstoque;
    //     $estoque->dataMovimentacao = $estoqueRequest->dataMovimentacao;
    //     $estoque->idFuncionario = $estoqueRequest->idFuncionario;
    //     $estoque->idMedicamento = $estoqueRequest->idMedicamento;
    //     $estoque->idTipoMovimentacao = $estoqueRequest->idTipoMovimentacao;
    //     $estoque->situacaoEstoque = "A";
    //     $estoque->dataCadastroEstoque = now();
    //     $estoque->save();

    // }

    public function show($id)
    {
        $estoque = ModelEstoqueFarmaciaUBS::find($id);
        if (!$estoque) {
            return response()->json(['message' => 'Estoque não encontrado'], 404);
        }
        return response()->json($estoque);
    }

    public function update(Request $request, $id)
    {
        $estoque = ModelEstoqueFarmaciaUBS::findOrFail($id);

        $estoque->quantEstoque = $request->quantEstoque;
        $estoque->dataMovimentacao = $request->dataMovimentacao;
        $estoque->idFuncionario = $request->idFuncionario;
        $estoque->idMedicamento = $request->idMedicamento;
        $estoque->idTipoMovimentacao = $request->idTipoMovimentacao;

        $estoque->save();

        return redirect('/estoqueHome')->with('success', 'Estoque atualizado com sucesso!');
    
    }

    public function destroy($id)
    {
        $estoque = ModelEstoqueFarmaciaUBS::findOrFail($id);

        $estoque->situacaoEstoque = "D"; 

        $estoque->save();

        return redirect('/estoqueHome')->with('success', 'Estoque Desativado com sucesso!');
    
    }
    public function ativar($id)
    {
        $estoque = ModelEstoqueFarmaciaUBS::findOrFail($id);

        $estoque->situacaoEstoque = "A"; 

        $estoque->save();

        return redirect('/estoqueHome')->with('success', 'Estoque ativado com sucesso!');
    
    }
}

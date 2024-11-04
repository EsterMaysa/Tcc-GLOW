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
        ->get();
;

        $medicamento = ModelMedicamentoFarmaciaUBS::all();
        $funcionario = ModelFuncionario::all();
        $tipoMovimentacao = ModelTipoMovimentacao::all();

        return view('farmacia.Estoque.estoque', compact('estoque','medicamento','funcionario','tipoMovimentacao'));
    }

    public function store(Request $request)
    {
        $estoque = new ModelEstoqueFarmaciaUBS();

        $estoque->quantEstoque = $request->quantEstoque;
        $estoque->dataMovimentacao = $request->dataMovimentacao;
        $estoque->idFuncionario = $request->idFuncionario;
        $estoque->idMedicamento = $request->idMedicamento;
        $estoque->idTipoMovimentacao = $request->idTipoMovimentacao;
        $estoque->situacaoEstoque = "A";
        $estoque->dataCadastroEstoque = now();
        $estoque->save();

        return redirect('/estoqueHome')->with('success', 'Estoque registrado com sucesso!');
    }

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

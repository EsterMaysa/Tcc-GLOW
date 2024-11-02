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
        $estoque = ModelEstoqueFarmaciaUBS::all();

        return view('farmacia.Estoque.estoque', compact('estoque'));
    }

    public function store(Request $request)
    {
        $estoque = new ModelEstoqueFarmaciaUBS();
        $estoque->quantEstoque = $request->quantEstoque;
        $estoque->dataMovimentacao = $request->dataMovimentacao;
        $estoque->idFuncionario = $request->idFuncionario;
        $estoque->idMedicamento = $request->idMedicamento;
        $estoque->idTipoMovimentacao = $request->idTipoMovimentacao;
        $estoque->situacaoEstoque = $request->situacaoEstoque;
        $estoque->dataCadastroEstoque = now();
        $estoque->save();

        return response()->json(['message' => 'Estoque cadastrado com sucesso!'], 201);
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
        $estoque = ModelEstoqueFarmaciaUBS::find($id);
        if (!$estoque) {
            return response()->json(['message' => 'Estoque não encontrado'], 404);
        }

        $estoque->update($request->all());
        return response()->json($estoque);
    }

    public function destroy($id)
    {
        $estoque = ModelEstoqueFarmaciaUBS::find($id);
        if (!$estoque) {
            return response()->json(['message' => 'Estoque não encontrado'], 404);
        }

        $estoque->delete();
        return response()->json(['message' => 'Estoque deletado com sucesso']);
    }
}

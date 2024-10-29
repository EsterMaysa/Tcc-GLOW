<?php

namespace App\Http\Controllers;

use App\Models\ModelFuncionario;
use Illuminate\Http\Request;

class FuncionarioFarmaciaUBSController extends Controller
{
    public function index()
    {
        $funcionarios = ModelFuncionario::all();
        return response()->json($funcionarios);
    }

    public function store(Request $request)
    {
        $funcionario = new ModelFuncionario();
        $funcionario->nomeFuncionario = $request->nomeFuncionario;
        $funcionario->cpfFuncionario = $request->cpfFuncionario;
        $funcionario->cargoFuncionario = $request->cargoFuncionario;
        $funcionario->situacaoFuncionario = $request->situacaoFuncionario;
        $funcionario->dataCadastroFuncionario = now();
        $funcionario->save();

        return response()->json(['message' => 'Funcionário cadastrado com sucesso!'], 201);
    }

    public function show($id)
    {
        $funcionario = ModelFuncionario::find($id);
        if (!$funcionario) {
            return response()->json(['message' => 'Funcionário não encontrado'], 404);
        }
        return response()->json($funcionario);
    }

    public function update(Request $request, $id)
    {
        $funcionario = ModelFuncionario::find($id);
        if (!$funcionario) {
            return response()->json(['message' => 'Funcionário não encontrado'], 404);
        }

        $funcionario->update($request->all());
        return response()->json($funcionario);
    }

    public function destroy($id)
    {
        $funcionario = ModelFuncionario::find($id);
        if (!$funcionario) {
            return response()->json(['message' => 'Funcionário não encontrado'], 404);
        }

        $funcionario->delete();
        return response()->json(['message' => 'Funcionário deletado com sucesso']);
    }
}

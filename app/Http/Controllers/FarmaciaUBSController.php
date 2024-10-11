<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FarmaciaUBSModel; // Corrija para o nome correto do model

class FarmaciaUBSController extends Controller
{
    // Exibir o formulário de criação
    public function create()
    {
        return view('Adm.Ubs.insertFarmaciaUbs');

    }

    // Armazenar os dados da Farmácia UBS
    public function store(Request $request) 
    {
        // Validação dos dados recebidos
        $request->validate([
            'nomeFamaciaUBS' => 'required|string|max:100',
            'emailFamaciaUBS' => 'required|email|max:100',
            'senhaFamaciaUBS' => 'required|string|min:8|max:200|unique:tbFamaciaUBS,senhaFamaciaUBS',
            'tipoFamaciaUBS' => 'nullable|string|max:100',
            // 'situacaoFamaciaUBS' => 'required|string|in:A,I', // A = Ativo, I = Inativo
        ]);

        // Criação de uma nova instância de FarmaciaUBSModel
        $farmacia = new FarmaciaUBSModel();

        // Preenchimento dos campos com os dados do request
        $farmacia->nomeFamaciaUBS = $request->nomeFamaciaUBS;
        $farmacia->emailFamaciaUBS = $request->emailFamaciaUBS;
        $farmacia->senhaFamaciaUBS = Hash::make($request->senhaFamaciaUBS); // Hash da senha
        $farmacia->tipoFamaciaUBS = $request->tipoFamaciaUBS; // Pode ser opcional
        $farmacia->situacaoFamaciaUBS = 'A' ;// A (Ativa) ou I (Inativa)
        $farmacia->dataCadastroFamaciaUBS = now(); // Define a data de cadastro para o momento atual

        // Salvar os dados no banco de dados
        $farmacia->save();

        // Redirecionar após o cadastro com uma mensagem de sucesso
        return redirect('/farmaciaInsert');
    }

    // Atualizar dados via API
    public function updateapi(Request $request, $id)
    {
        FarmaciaUBSModel::where('idFamaciaUBS', $id)->update([
            'nomeFamaciaUBS' => $request->nome,
            'idUBS' => $request->idUBS,
            'situacaoFamaciaUBS' => $request->situacao,
        ]);

        return response()->json(['message' => 'Sucesso', 'code' => 200]);
    }
}

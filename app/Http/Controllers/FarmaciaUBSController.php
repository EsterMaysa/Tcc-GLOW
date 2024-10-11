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
        // Validação dos dados
        $validatedData = $request->validate([
            'nomeFamaciaUBS' => 'required|string|max:100',
            'emailFamaciaUBS' => 'required|email|max:100',
            'senhaFamaciaUBS' => 'required|string|min:8|max:200',
            'tipoFamaciaUBS' => 'nullable|string|max:100',
            'situacaoFamaciaUBS' => 'required|string|in:A,I', // A para Ativa, I para Inativa
            'dataCadastroFamaciaUBS' => 'required|date',
        ]);

        // Criar uma nova instância de FarmaciaUBSModel
        $farmaciaUBS = new FarmaciaUBSModel();
        $farmaciaUBS->nomeFamaciaUBS = $validatedData['nomeFamaciaUBS'];
        $farmaciaUBS->emailFamaciaUBS = $validatedData['emailFamaciaUBS'];
        $farmaciaUBS->senhaFamaciaUBS = bcrypt($validatedData['senhaFamaciaUBS']); // Criptografa a senha
        $farmaciaUBS->tipoFamaciaUBS = $validatedData['tipoFamaciaUBS'];
        $farmaciaUBS->situacaoFamaciaUBS = $validatedData['situacaoFamaciaUBS'];
        $farmaciaUBS->dataCadastroFamaciaUBS = $validatedData['dataCadastroFamaciaUBS'];

        // Salvar no banco de dados
        $farmaciaUBS->save();

        // Redirecionar após o cadastro com mensagem de sucesso
        return redirect()->route('Adm.Ubs.insertFarmaciaUbs')->with('success', 'Farmácia UBS cadastrada com sucesso!');
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

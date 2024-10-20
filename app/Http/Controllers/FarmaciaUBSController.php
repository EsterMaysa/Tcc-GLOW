<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\FarmaciaUBSModel; // Corrija para o nome correto do model

class FarmaciaUBSController extends Controller
{

    
    // Exibir o formulário de criação
    public function showForm()
    {
        // Obtém todas as farmácias cadastradas
        $farmacias = FarmaciaUBSModel::all();

        // Passa a variável $farmacias para a view
        return view('adm.Ubs.insertFarmaciaUbs', compact('farmacias'));
    }

    // Armazenar os dados da Farmácia UBS
    public function store(Request $request) 
    {
        // Validação dos dados recebidos
        // $request->validate([
        //     'nomeFamaciaUBS' => 'required|string|max:100',
        //     'emailFamaciaUBS' => 'required|email|max:100|unique:tbFamaciaUBS,emailFarmaciaUBS',
        //     'senhaFamaciaUBS' => 'required|string|min:8|max:200',
        //     'tipoFamaciaUBS' => 'nullable|string|max:100',
        // ]);

        // Criação de uma nova instância de FarmaciaUBSModel
        $farmacia = new FarmaciaUBSModel();
        $farmacia->nomeFarmaciaUBS = $request->nomeFamaciaUBS;
        $farmacia->emailFarmaciaUBS = $request->emailFamaciaUBS;
        $farmacia->senhaFarmaciaUBS = Hash::make($request->senhaFamaciaUBS); // Hash da senha
        $farmacia->tipoFarmaciaUBS = $request->tipoFamaciaUBS; // Campo opcional
        $farmacia->situacaoFarmaciaUBS = 'A'; // Define como 'Ativa'
        $farmacia->dataCadastroFarmaciaUBS = now(); // Data de cadastro

        // Salva os dados no banco
        $farmacia->save();

        // Mensagem de sucesso
        session()->flash('success', 'Farmácia UBS cadastrada com sucesso!');

        // Redireciona para exibir o formulário e as farmácias cadastradas
        return redirect()->route('farmacia.showForm');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\FarmaciaUBSModel; // Corrija para o nome correto do model

class FarmaciaUBSController extends Controller
{

    
    // Exibir o formulário de criação
    public function create()
    {
        return view('adm.Ubs.insertFarmaciaUbs');
    }

    // Mostrar o formulário de criação com as farmácias
   // Mostrar o formulário de criação com as farmácias
    public function showForm()
    {
    $farmacias = FarmaciaUBSModel::all(); // Obtendo todas as farmácias
    dd($farmacias); // Adicione isso para depuração
    return view('adm.Ubs.insertFarmaciaUbs', compact('farmacias'));
    }


    // Armazenar os dados da Farmácia UBS
    public function store(Request $request) 
    {
        // Validação dos dados recebidos
        $request->validate([
            'nomeFamaciaUBS' => 'required|string|max:100',
            'emailFamaciaUBS' => 'required|email|max:100|unique:tbFamaciaUBS,emailFarmaciaUBS',
            'senhaFamaciaUBS' => 'required|string|min:8|max:200',
            'tipoFamaciaUBS' => 'nullable|string|max:100',
        ]);

        // Criação de uma nova instância de FarmaciaUBSModel
        $farmacia = new FarmaciaUBSModel();

        // Preenchimento dos campos com os dados do request
        $farmacia->nomeFarmaciaUBS = $request->nomeFamaciaUBS;
        $farmacia->emailFarmaciaUBS = $request->emailFamaciaUBS;
        $farmacia->senhaFarmaciaUBS = Hash::make($request->senhaFamaciaUBS); // Hash da senha
        $farmacia->tipoFarmaciaUBS = $request->tipoFamaciaUBS; // Pode ser opcional
        $farmacia->situacaoFarmaciaUBS = 'A'; // A (Ativa) ou I (Inativa)
        $farmacia->dataCadastroFarmaciaUBS = now(); // Define a data de cadastro para o momento atual

        // Salvar os dados no banco de dados
        $farmacia->save();

        // Redirecionar após o cadastro com uma mensagem de sucesso
        session()->flash('success', 'Farmácia UBS cadastrada com sucesso!');

        // Redirecionar após o cadastro com uma mensagem de sucesso
        return redirect()->route('farmacia.showForm'); // Redireciona para o método showForm
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

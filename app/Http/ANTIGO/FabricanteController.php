<?php

namespace App\Http\Controllers;

use App\Models\FabricanteFarmaciaModel;
use App\Models\TelefoneFabricanteFarmaciaModel; // Certifique-se de que você tenha o modelo para telefone
use Illuminate\Http\Request;

class FabricanteController extends Controller
{
    // Método para listar todos os fabricantes (opcional)
    public function index()
    {
        // Implementar a lógica para listar os fabricantes se necessário
    }

    // Método para salvar o fabricante no banco de dados
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        // $request->validate([
        //     'nomeFabricante' => 'required|max:100',
        //     'cnpjFabricante' => 'required|unique:tbFabricanteFarmacia,cnpjFabricante|max:18',
        //     'emailFabricante' => 'nullable|email|max:100',
        //     'logradouroFabricante' => 'required|max:50',
        //     'bairroFabricante' => 'required|max:50',
        //     'estadoFabricante' => 'required|max:2',
        //     'cidadeFabricante' => 'required|max:25',
        //     'numeroFabricante' => 'required|max:6',
        //     'ufFabricante' => 'required|max:2',
        //     'cepFabricante' => 'required|max:10',
        //     'complementoFabricante' => 'nullable|max:10',
        //     'numeroTelefoneFabricante' => 'required|max:11', // Campo para número de telefone
        // ]);

        // Primeiro, armazene o telefone
        $telefone = new TelefoneFabricanteFarmaciaModel();
        $telefone->numeroTelefoneFabricante = $request->numeroTelefoneFabricante;
        $telefone->situacaoTelefoneFabricante = 'AT'; // ou o valor desejado
        $telefone->dataCadastroTelefoneFabricante = now();
        $telefone->save();

        // Agora, armazene o fabricante, usando o ID do telefone que foi criado
        $fabricante = new FabricanteFarmaciaModel();
        $fabricante->nomeFabricante = $request->nomeFabricante;
        $fabricante->cnpjFabricante = $request->cnpjFabricante;
        $fabricante->emailFabricante = $request->emailFabricante;
        $fabricante->logradouroFabricante = $request->logradouroFabricante;
        $fabricante->bairroFabricante = $request->bairroFabricante;
        $fabricante->estadoFabricante = $request->estadoFabricante;
        $fabricante->cidadeFabricante = $request->cidadeFabricante;
        $fabricante->numeroFabricante = $request->numeroFabricante;
        $fabricante->ufFabricante = $request->ufFabricante;
        $fabricante->cepFabricante = $request->cepFabricante;
        $fabricante->complementoFabricante = $request->complementoFabricante;
        $fabricante->idTelefoneFabricante = $telefone->idTelefoneFabricante; // Atribui o ID do telefone
        $fabricante->situacaoFabricante = 'AT'; // Define a situação
        $fabricante->dataCadastroFabricante = now(); // Data de cadastro

        // Salva o fabricante no banco de dados
        $fabricante->save();

        // Redireciona com uma mensagem de sucesso
        return redirect()->route('medicamentos.index')->with('success', 'Fabricante cadastrado com sucesso!');
    }
}

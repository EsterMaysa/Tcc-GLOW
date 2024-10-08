<?php

namespace App\Http\Controllers;

use App\Models\FabricanteFarmaciaModel;
use Illuminate\Http\Request;

class FabricanteController extends Controller
{
    // Método para listar todos os medicamentos
    public function index()
    {
        
    }

    // Método para armazenar um novo medicamento
      // Método para salvar o fabricante no banco de dados
      public function store(Request $request)
    {
        // Cria uma nova instância do modelo FabricanteModel
        $fabricante = new FabricanteFarmaciaModel();

        // Mapeia os campos recebidos no request para as propriedades do modelo
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

        $situacao = 'AT'; 
        $telefone = 1; 

        $fabricante->situacaoFabricante = $request->situacaoFabricante ?? $situacao;
        $fabricante->idTelefoneFabricante = $request->idTelefoneFabricante ?? $telefone;
        
        // Define a data de cadastro como a data atual
        $fabricante->dataCadastroFabricante = now();

        // Salva o fabricante no banco de dados
        $fabricante->save();

        // Retorna um JSON de sucesso
        return redirect()->route('medicamentos.index')->with('success', 'Fabricante cadastrado com sucesso!');

        // return response()->json(['message' => 'Fabricante criado com sucesso!'], 201);
    }

    // Adicione métodos adicionais conforme necessário (exibir, editar, atualizar, excluir)
}

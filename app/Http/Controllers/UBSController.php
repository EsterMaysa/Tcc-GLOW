<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\UBSModel;

class UBSController extends Controller
{
    public function index()
    {
        $ubs = UBSModel::all();
        return response()->json($ubs);
    }




    
    public function store(Request $request)
{
    $ubs = new UBSModel();

       
        $ubs->nomeUBS = $request->ubs;
        $ubs->fotoUBS = $request->foto;
        $ubs->cnpjUBS = $request->cnpj;
        $ubs->latitudeUBS = $request->latitude;
        $ubs->longitudeUBS = $request->longitude;
        $ubs->cepUBS = $request->cep;
        $ubs->logradouroUBS = $request->logradouro;
        $ubs->bairroUBS = $request->bairro;
        $ubs->estadoUBS = $request->estado;
        $ubs->cidadeUBS = $request->cidade;
        $ubs->numeroUBS = $request->numero;
        $ubs->ufUBS = $request->uf;
        $ubs->complementoUBS = $request->complemento;
        $ubs->senhaUBS = $request->senha; // Senha criptografada
        $ubs->situacaoUBS = $request->situacao;
        $ubs->dataCadastroUBS = now(); // Data atual
        $ubs->idTelefoneUBS = $request->idTelefone; // ID do telefone
        $ubs->idRegiaoUBS = $request->idRegiao; // ID da região


        $ubs->save();
        return response()->json(['message' => 'Telefone UBS criado com sucesso!'], 201);
}

    

    public function updateapi(Request $request, $id)
    {
        UBSModel::where('idUBS', $id)->update([
            'nomeUBS' => $request->nome,
            'cnpjUBS' => $request->cnpj,
            'logradouroUBS' => $request->logradouro,
            'bairroUBS' => $request->bairro,
            'cidadeUBS' => $request->cidade,
            'numeroUBS' => $request->numero,
            'ufUBS' => $request->uf,
            'cepUBS' => $request->cep,
            'complementoUBS' => $request->complemento,
            'situacaoUBS' => $request->situacao,
        ]);

        return response()->json(['message' => 'Sucesso', 'code' => 200]);
    }
}

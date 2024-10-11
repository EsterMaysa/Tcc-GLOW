<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetentorModel;

class DetentorController extends Controller
{
    public function index()
    {
        $detentores = DetentorModel::all();
        return response()->json($detentores);
    }

    public function store(Request $request)
    {
        $detentor = new DetentorModel();
        $detentor->nomeDetentor = $request->nome;
        $detentor->cnpjDetentor = $request->cnpj;
        $detentor->emailDetentor = $request->email;
        $detentor->logradouroDetentor = $request->logradouro;
        $detentor->bairroDetentor = $request->bairro;
        $detentor->estadoDetentor = $request->estado;
        $detentor->cidadeDetentor = $request->cidade;
        $detentor->numeroDetentor = $request->numero;
        $detentor->ufDetentor = $request->uf;
        $detentor->cepDetentor = $request->cep;
        $detentor->complementoDetentor = $request->complemento;
        $detentor->situacaoDetentor = $request->situacao;
        $detentor->dataCadastroDetentor = now();

        $detentor->save();
        return response()->json(['message' => 'Detentor criado com sucesso!'], 201);
    }

    public function updateapi(Request $request, $id)
    {
        DetentorModel::where('idFDetentor', $id)->update([
            'nomeDetentor' => $request->nome,
            'cnpjDetentor' => $request->cnpj,
            'emailDetentor' => $request->email,
            'logradouroDetentor' => $request->logradouro,
            'bairroDetentor' => $request->bairro,
            'estadoDetentor' => $request->estado,
            'cidadeDetentor' => $request->cidade,
            'numeroDetentor' => $request->numero,
            'ufDetentor' => $request->uf,
            'cepDetentor' => $request->cep,
            'complementoDetentor' => $request->complemento,
            'situacaoDetentor' => $request->situacao,
        ]);

        return response()->json(['message' => 'Sucesso', 'code' => 200]);
    }
}

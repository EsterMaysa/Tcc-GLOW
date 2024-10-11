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
    // Validação dos dados
    $request->validate([
        'nome' => 'required|string|max:255',
        'cnpj' => 'required|string|max:18', // Validação do CNPJ (ajuste conforme necessário)
        'logradouro' => 'required|string|max:255',
        'bairro' => 'required|string|max:255',
        'cidade' => 'required|string|max:255',
        'numero' => 'required|string|max:10',
        'uf' => 'required|string|max:2',
        'cep' => 'required|string|max:10',
        'complemento' => 'nullable|string|max:255', // Complemento é opcional
        'situacao' => 'required|string|in:ativo,inativo', // Validação da situação
        'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validação de imagem
    ]);

    // Se existir uma imagem, salva no diretório correto
    $imagePath = null;
    if ($request->hasFile('imagem')) {
        $imagePath = $request->file('imagem')->store('public/images');
    }

    // Cria uma nova UBS
    $ubs = new UbsModel();
    $ubs->nome = $request->input('nome');
    $ubs->cnpj = $request->input('cnpj');
    $ubs->logradouro = $request->input('logradouro');
    $ubs->bairro = $request->input('bairro');
    $ubs->cidade = $request->input('cidade');
    $ubs->numero = $request->input('numero');
    $ubs->uf = $request->input('uf');
    $ubs->cep = $request->input('cep');
    $ubs->complemento = $request->input('complemento'); // Complemento é opcional
    $ubs->situacao = $request->input('situacao');
    $ubs->imagem = $imagePath; // Salva o caminho da imagem

    // Salva a UBS no banco de dados
    $ubs->save();

    // Redireciona para uma página ou retorna uma resposta
    return redirect()->route('ubs.index')->with('success', 'UBS criada com sucesso!');
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

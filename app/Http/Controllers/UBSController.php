<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TelefoneUBSModel;
use App\Models\UBSModel;

use App\Models\RegiaoUBSModel;

use Illuminate\Support\Facades\Validator;

class UBSController extends Controller
{
    public function index()
{
    $ubs = UBSModel::all(); // Busca todos os dados da UBS
    return view('adm.Ubs.UBS', ['ubs' => $ubs]); // Passa os dados para a view
}

public function apresentarRegiao()
{
    $regioes = RegiaoUBSModel::all();
    return view('adm.Ubs.formUBS', compact('regioes')); // Passa os dados para a view
}




    
public function store(Request $request)
{
    // Validação dos dados de entrada
    $validator = Validator::make($request->all(), [
        'ubs' => 'required|string|max:255',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'cnpj' => 'required|string|max:14',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'cep' => 'required|string|max:10',
        'logradouro' => 'required|string|max:255',
        'bairro' => 'required|string|max:255',
        'estado' => 'required|string|max:255',
        'cidade' => 'required|string|max:255',
        'numero' => 'required|string|max:10',
        'uf' => 'required|string|max:2',
        'complemento' => 'nullable|string|max:255',
        
        'idRegiao' => 'required|integer',
        'telefone' => 'required|string|max:15',
        'situacaoTelefone' => 'nullable|string|max:255',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // Cadastrar o telefone primeiro
    $telefone = new TelefoneUBSModel();
    $telefone->numeroTelefoneUBS = $request->telefone;
    $telefone->situacaoTelefoneUBS = $request->situacaoTelefone;
    $telefone->dataCadastroTelefoneUBS = now();

    // Salvar telefone e verificar se foi salvo corretamente
    if (!$telefone->save()) {
        return response()->json(['message' => 'Erro ao salvar telefone'], 500);
    }

    // Obter o ID do telefone recém-cadastrado
    $telefoneId = $telefone->idTelefoneUBS;
//vini
    // Cadastrar a UBS
    $ubs = new UBSModel();
    $ubs->nomeUBS = $request->ubs;
    $ubs->fotoUBS = $request->foto; // Lidar com a foto se necessário
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
    $ubs->senhaUBS = bcrypt($request->senha); // Criptografando a senha
    $ubs->situacaoUBS = $request->situacao;
    $ubs->dataCadastroUBS = now();
    $ubs->idTelefoneUBS = $telefoneId; // ID do telefone
    $ubs->idRegiaoUBS = $request->idRegiao; // ID da região

    // Salvar UBS e verificar se foi salvo corretamente
    if ($ubs->save()) {
        return response()->json(['message' => 'UBS criada com sucesso!'], 201);
    } else {
        return response()->json(['message' => 'Erro ao salvar UBS'], 500);
    }
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TelefoneUBSModel;
use App\Models\UBSModel;
use App\Models\RegiaoUBSModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class UBSController extends Controller
{

    private function formatarCnpj($cnpj)
{
    return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "$1.$2.$3/$4-$5", $cnpj);
}

    public function index()
    {
        // $ubs = UBSModel::all(); // Busca todos os dados da UBS
        // return view('adm.Ubs.UBS', ['ubs' => $ubs]); // Passa os dados para a view

        $ubs = UBSModel::with(['regiao', 'telefone'])->get(); // Certifique-se de que os relacionamentos estão definidos
        return view('adm.Ubs.UBS', compact('ubs'));
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
            'cep' => 'required|string|max:10',
            'numero' => 'required|string|max:10',
            'complemento' => 'nullable|string|max:255',
            'idRegiao' => 'required|integer',
     
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Busca o endereço usando ViaCEP
        $cep = $request->cep;
        $viacepResponse = Http::get("https://viacep.com.br/ws/{$cep}/json/");

        if ($viacepResponse->failed()) {
            return response()->json(['message' => 'CEP inválido ou ViaCEP indisponível.'], 400);
        }

        $endereco = $viacepResponse->json();

        // Se o CEP foi encontrado, obtem o logradouro, bairro, cidade e uf
        $logradouro = $endereco['logradouro'] ?? '';
        $bairro = $endereco['bairro'] ?? '';
        $cidade = $endereco['localidade'] ?? '';
        $uf = $endereco['uf'] ?? '';

        // Obtém as coordenadas geográficas usando Nominatim
        $query = urlencode("{$logradouro}, {$bairro}, {$cidade}, {$uf}");
        $nominatimResponse = Http::get("https://nominatim.openstreetmap.org/search?q={$query}&format=json");

        $latitude = null;
        $longitude = null;

        if ($nominatimResponse->successful() && count($nominatimResponse->json()) > 0) {
            $location = $nominatimResponse->json()[0];
            $latitude = $location['lat'];
            $longitude = $location['lon'];
        }

        // Cadastrar o telefone primeiro
        $telefone = new TelefoneUBSModel();
        $telefone->numeroTelefoneUBS = $request->telefone;
        $telefone->numeroTelefoneUBS2 = $request->telefone2;
        $telefone->situacaoTelefoneUBS = $request->situacaoTelefone ?? '1'; // Define 1 se não for passado
        $telefone->dataCadastroTelefoneUBS = now();
        $telefone->save();

        $telefoneId = $telefone->idTelefoneUBS;

        // Lidar com a foto se foi enviada
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('ubs_fotos', 'public');
        }


        if ($request->filled('telefone2')) {
            $telefone->numeroTelefoneUBS2 = $request->telefone2;
            $telefone->save();
        }

        // Formatar o CNPJ
    $cnpjFormatado = $this->formatarCnpj($request->cnpj);

        // Cadastrar a UBS
        $ubs = new UBSModel();
        $ubs->nomeUBS = $request->ubs;
        $ubs->emailUBS = $request->email;
        $ubs->fotoUBS = $request->foto; // Caminho da foto salvo no banco
        $ubs->cnpjUBS = $request->cnpj;
        $ubs->latitudeUBS = $request->latitude;
        $ubs->longitudeUBS = $request->longitude;
        $ubs->cepUBS = $request->cep;
        $ubs->logradouroUBS = $logradouro;
        $ubs->bairroUBS = $bairro;
        $ubs->estadoUBS = $uf;
        $ubs->cidadeUBS = $cidade;
        $ubs->numeroUBS = $request->numero;
        $ubs->ufUBS = $uf;
        $ubs->complementoUBS = $request->complemento;
        $ubs->senhaUBS = bcrypt($request->senha); // Criptografando a senha
        $ubs->situacaoUBS = '1'; // Definindo a situação automaticamente como 1
        $ubs->dataCadastroUBS = now();
        $ubs->idTelefoneUBS = $telefoneId; // ID do telefone
        $ubs->idRegiaoUBS = $request->idRegiao; // ID da região

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

    public function edit($idUBS)
        {
            // Busca a UBS pelo ID
            $ubs = UBSModel::findOrFail($idUBS);

            

             // Busca o telefone relacionado à UBS
             $telefone = TelefoneUBSModel::findOrFail($ubs->idTelefoneUBS);
             
             
             // Retorna a view de edição com os dados da UBS
            return view('adm.Ubs.editUBS', compact('ubs', 'telefone'));
        }

        
        public function update(Request $request, $id)
{
    // Validação dos dados
    $validator = Validator::make($request->all(), [
        'nomeUBS' => 'required|string|max:255',
        'cnpjUBS' => 'required|string|max:14',
        'logradouroUBS' => 'required|string|max:255',
        'bairroUBS' => 'required|string|max:255',
        'cidadeUBS' => 'required|string|max:255',
        'numeroUBS' => 'required|string|max:10',
        'ufUBS' => 'required|string|max:2',
        'cepUBS' => 'required|string|max:10',
        'complementoUBS' => 'nullable|string|max:255',
        'telefone' => 'required|string|max:15',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Atualiza a UBS
    $ubs = UBSModel::findOrFail($id);
    $ubs->update([
        'nomeUBS' => $request->nomeUBS,
        'cnpjUBS' => $request->cnpjUBS,
        'logradouroUBS' => $request->logradouroUBS,
        'bairroUBS' => $request->bairroUBS,
        'cidadeUBS' => $request->cidadeUBS,
        'numeroUBS' => $request->numeroUBS,
        'ufUBS' => $request->ufUBS,
        'cepUBS' => $request->cepUBS,
        'complementoUBS' => $request->complementoUBS,
        'situacaoUBS' => $request->situacaoUBS ?? '1', // Define '1' se o campo não for enviado
    ]);

    // Atualiza o telefone
    $telefone = TelefoneUBSModel::findOrFail($ubs->idTelefoneUBS);
    $telefone->update([
        'numeroTelefoneUBS' => $request->telefone,
        'situacaoTelefoneUBS' => $request->situacaoTelefone ?? '1', // Define '1' se o campo não for enviado
    ]);

    return redirect('/selectUBS')->with('message', 'UBS e telefone atualizados com sucesso!');
}

public function changeStatus($idUBS)
{
    // Encontre a unidade básica de saúde pelo ID
    $ub = UBSModel::findOrFail($idUBS); // Corrigido para usar UBSModel
    
    // Troca o estado: se for 1, muda para 0; se for 0, muda para 1
    $ub->situacaoUBS = $ub->situacaoUBS == 1 ? 0 : 1; // Aqui deve ser 'situacaoUBS', não 'estado'
    $ub->save();

    // Retorna uma resposta
    return redirect()->back()->with('success', 'Estado alterado com sucesso!');
}
}

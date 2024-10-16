<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetentorModel;

class DetentorController extends Controller
{
    public function index()
    {
        $detentores = DetentorModel::all();

        return view('adm.Medicamento.detentor', compact('detentores'));
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
        $detentor->situacaoDetentor = "A";
        $detentor->dataCadastroDetentor = now();

        $detentor->save();
        
        return redirect('/detentor');
    }


    public function edit($idDetentor)
    {
        // Busca o detentor pelo ID
        $detentor = DetentorModel::findOrFail($idDetentor);
    
        // Retorna a view de edição com os dados do detentor
        return view('adm.Medicamento.editDetentor', compact('detentor'));
    }
    
    public function update(Request $request, $id)
    {
    
        // Encontra o detentor que será atualizado
        $detentor = DetentorModel::findOrFail($id);
    
        // Atualiza os dados do detentor
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

        // Salva as alterações
        $detentor->save();
    
        // Redireciona o usuário com uma mensagem de sucesso
        return redirect('/detentor')->with('success', 'Detentor atualizado com sucesso!');
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

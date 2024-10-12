<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContatoModel;

class ContatoController extends Controller
{
    public function index()
    {
        $contatos = ContatoModel::all();
        return view('adm.contato', compact('contatos'));
    }

    public function store(Request $request)
    {
        $contato = new ContatoModel();
        $contato->idUsuario = $request->idUsuario;
        $contato->idDetentor = $request->idDetentor;
        $contato->idMedicamento = $request->idMedicamento;
        $contato->situacaoContato = $request->situacao;
        $contato->dataCadastroContato = now();

        $contato->save();
        return response()->json(['message' => 'Contato criado com sucesso!'], 201);
    }

    public function updateapi(Request $request, $id)
    {
        ContatoModel::where('idContato', $id)->update([
            'idUsuario' => $request->idUsuario,
            'idDetentor' => $request->idDetentor,
            'idMedicamento' => $request->idMedicamento,
            'situacaoContato' => $request->situacao,
        ]);

        return response()->json(['message' => 'Sucesso', 'code' => 200]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContatoModel;
use Illuminate\Support\Facades\DB;

class ContatoController extends Controller
{
    public function index()
    {
            // Carregar os contatos com seus respectivos usuários
            $contatos = ContatoModel::with('usuario')->where('situacaoContato', 1)->get(); // Certifique-se de filtrar contatos ativos
            return view('adm.contato', compact('contatos'));
        }
    public function store(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'idUsuario' => 'required|integer',
            'emailUsuario' => 'required|email',
            'mensagemContato' => 'required|string',
        ]);

        // Verificação de duplicação robusta
        DB::beginTransaction();

        try {
            $existingContato = ContatoModel::where('idUsuario', $request->idUsuario)
                ->where('emailUsuario', $request->emailUsuario)
                ->where('mensagemContato', $request->mensagemContato)
                ->first();

            if ($existingContato) {
                DB::rollBack(); 
                return response()->json(['message' => 'Esse contato já foi enviado anteriormente.'], 409);
            }

            $contato = new ContatoModel();
            $contato->idUsuario = $request->idUsuario;
            $contato->idDetentor = $request->idDetentor;
            $contato->idMedicamento = $request->idMedicamento;
            $contato->situacaoContato = 1; // Mantendo como ativo
            $contato->emailUsuario = $request->emailUsuario;
            $contato->mensagemContato = $request->mensagemContato;
            $contato->dataCadastroContato = now();

            $contato->save();

            DB::commit(); 

            return response()->json(['message' => 'Contato criado com sucesso!'], 201);
        } catch (\Exception $e) {
            DB::rollBack(); 
            return response()->json(['message' => 'Erro ao criar o contato: ' . $e->getMessage()], 500);
        }
    }

    public function excluir(Request $request, $id)
    {
        // Encontra o contato pelo ID
        $contato = ContatoModel::find($id);
        if (!$contato) {
            return redirect()->back()->with('success', 'Contato não encontrado.');
        }

        // Altera a situação do contato para 0 (inativo)
        $contato->situacaoContato = 0; // Define como inativo
        $contato->save();

        // Mensagem de sucesso
        return redirect()->route('contato.index')->with('success', 'Contato excluído com sucesso!');
    }
}

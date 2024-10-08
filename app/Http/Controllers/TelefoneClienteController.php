<?php

namespace App\Http\Controllers;

use App\Models\TelefoneClienteFarmaciaModel; // Importe o modelo de telefone
use Illuminate\Http\Request;

class TelefoneClienteController extends Controller
{
    // Método para exibir o formulário de criação de telefone
    public function create()
    {
        return view('clienteFarmacia.telefone_create'); // Altere para o caminho da sua view
    }

    // Método para armazenar um novo telefone
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'numeroTelefoneCliente' => 'required|string|max:11',
            'situacaoTelefoneCliente' => 'nullable|string|max:2',
            'dataCadastroTelefoneCliente' => 'required|date',
        ]);

        // Criação do novo telefone
        $telefone = new TelefoneClienteFarmaciaModel();
        $telefone->numeroTelefoneCliente = $request->numeroTelefoneCliente;
        $telefone->situacaoTelefoneCliente = $request->situacaoTelefoneCliente;
        $telefone->dataCadastroTelefoneCliente = $request->dataCadastroTelefoneCliente;
        $telefone->save();

        return redirect()->back()->with('success', 'Telefone criado com sucesso!');
    }

    // Método para listar todos os telefones
    public function index()
    {
        $telefones = TelefoneClienteFarmaciaModel::all(); // Obtém todos os telefones
        return view('clienteFarmacia.telefone_index', compact('telefones')); // Altere para a view apropriada
    }

    // Método para editar um telefone
    public function edit($id)
    {
        $telefone = TelefoneClienteFarmaciaModel::findOrFail($id); // Encontre o telefone pelo ID
        return view('clienteFarmacia.telefone_edit', compact('telefone')); // Altere para a view apropriada
    }

    // Método para atualizar um telefone
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'numeroTelefoneCliente' => 'required|string|max:11',
            'situacaoTelefoneCliente' => 'nullable|string|max:2',
        ]);

        // Atualiza o telefone
        $telefone = TelefoneClienteFarmaciaModel::findOrFail($id);
        $telefone->numeroTelefoneCliente = $request->numeroTelefoneCliente;
        $telefone->situacaoTelefoneCliente = $request->situacaoTelefoneCliente;
        $telefone->save();

        return redirect()->back()->with('success', 'Telefone atualizado com sucesso!');
    }

    // Método para excluir um telefone
    public function destroy($id)
    {
        $telefone = TelefoneClienteFarmaciaModel::findOrFail($id);
        $telefone->delete();

        return redirect()->back()->with('success', 'Telefone excluído com sucesso!');
    }
}

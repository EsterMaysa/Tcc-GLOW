<?php

namespace App\Http\Controllers;

use App\Models\AdministradorModel;
use Illuminate\Http\Request;
use App\Models\AdministradorModel; // Corrigi o nome do model ClienteAdm
use Illuminate\Support\Facades\Hash;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    // Seleciona o primeiro administrador cadastrado
    $admin = AdministradorModel::first(); // Seleciona apenas o primeiro administrador

    // Retorna a view com os dados do administrador
    return view('perfil', compact('admin'));
}

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mostra o formulário para criação de um novo administrador
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'nome' => 'required|string|max:100',
            'email' => 'required|email|max:350|unique:tbAdministrador,emailAdministrador',
            'senha' => 'required|string|min:8', // Adicionando validação mínima
        ]);
        
        // Criar o novo administrador
        $administrador = new AdministradorModel();
        $administrador->nomeAdministrador = $validatedData['nome'];
        $administrador->emailAdministrador = $validatedData['email'];
        $administrador->senhaAdministrador = Hash::make($validatedData['senha']);  // Criptografar a senha
        $administrador->situacaoAdministrador = 'A'; // Por exemplo, 'A' para ativo
        $administrador->dataCadastroAdministrador = now(); // Data atual
        
        $administrador->save();
        
        // Redirecionar ou retornar uma resposta
        return redirect('/')->with('success', 'Administrador cadastrado com sucesso!');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Exibe um administrador específico
        $administrador = AdministradorModel::findOrFail($id);
        return view('admin.show', compact('administrador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Mostra o formulário de edição de um administrador
        $administrador = AdministradorModel::findOrFail($id);
        return view('admin.edit', compact('administrador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Valida os dados do formulário de edição
        $validatedData = $request->validate([
            'fotoAministrador' => 'required|max:400',
            'nomeAdministrador' => 'required|max:100',
            'emailAdministrador' => 'required|email|max:350',
            'senhaAdministrador' => 'required|max:50',
            'situacaoAdministrador' => 'required|max:2',
            'dataCadastroAdministrador' => 'required|date',
        ]);

        // Atualiza o administrador existente
        AdministradorModel::where('idAdministrador', $id)->update($validatedData);

        // Redireciona de volta com uma mensagem de sucesso
        return redirect()->route('admin.index')->with('success', 'Administrador atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Deleta o administrador
        AdministradorModel::destroy($id);

        // Redireciona de volta com uma mensagem de sucesso
        return redirect()->route('admin.index')->with('success', 'Administrador removido com sucesso!');
    }
}

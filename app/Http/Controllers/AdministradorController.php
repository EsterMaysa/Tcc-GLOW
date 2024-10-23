<?php

namespace App\Http\Controllers;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

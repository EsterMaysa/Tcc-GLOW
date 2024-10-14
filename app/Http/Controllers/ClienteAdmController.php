<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClienteAdmModel; // Corrigi o nome do model ClienteAdm
use App\Models\TelefoneClienteAdmModel; // Model do telefone

class ClienteAdmController extends Controller // Corrigi o nome do controller
{
    public function index()
    {
        $cliente = ClienteAdmModel::where('situacaoCliente', 0)->get(); // Exibe apenas os clientes ativos
        return view('Adm.Cliente.clienteConsulta', ['clientes' => $cliente]); // Passando os dados de forma explícita
    }
    
    public function indexLogin()
    {
        $clientes = ClienteAdmModel::all(); // Usar o model correto
        return response()->json($clientes); // Retorna dados como JSON
    }

    // Exibir o formulário de criação (view chamada 'cadastros')
    public function create()
    {
        return view('Adm.Cliente.clienteInsert'); // Renderiza a view onde está o formulário
    }

    // Armazenar cliente e telefone
    public function store(Request $request)
{
    // Validação dos dados do cliente
    // $request->validate([
    //     'nomeCliente' => 'required|string|max:255',
    //     'cpfCliente' => 'required|string|max:14', // CPF geralmente tem até 14 caracteres com máscara
    //     'dataNascCliente' => 'required|date',
    //     'userCliente' => 'required|string|max:255',
    //     'cepCliente' => 'required|string|max:8', // CEP com 8 dígitos
    //     'logradouroCliente' => 'required|string|max:255',
    //     'bairroCliente' => 'required|string|max:255',
    //     'numeroCliente' => 'required|string|max:10',
    //     'ufCliente' => 'required|string|max:2', // UF com 2 caracteres
    //     'cidadeCliente' => 'required|string|max:255',
    //     'situacaoCliente' => 'nullable|string|max:2',
    //     'complementoCliente' => 'nullable|string|max:255',
    //     'telefoneCliente' => 'required|string|max:11', // Validação do telefone
    // ]);

    // Criação do telefone
    $telefone = new TelefoneClienteAdmModel();
    $telefone->numeroTelefoneCliente = $request->telefoneCliente;
    $telefone->situacaoTelefoneCliente = '0'; // Valor padrão se não fornecido
    $telefone->dataCadastroTelefoneCliente = now();
    $telefone->save();

    // Criação do cliente
    $cliente = new ClienteAdmModel();
    $cliente->nomeCliente = $request->nomeCliente;
    $cliente->cpfCliente = $request->cpfCliente;
    $cliente->cnsCliente = $request->cnsCliente;
    $cliente->dataNascCliente = $request->dataNascCliente;
    $cliente->userCliente = $request->userCliente;
    $cliente->cepCliente = $request->cepCliente;
    $cliente->logradouroCliente = $request->logradouroCliente;
    $cliente->bairroCliente = $request->bairroCliente;
    $cliente->numeroCliente = $request->numeroCliente;
    $cliente->estadoCliente = $request->estadoCliente;
    $cliente->cidadeCliente = $request->cidadeCliente;
    $cliente->ufCliente = $request->ufCliente;
    $cliente->complementoCliente = $request->complementoCliente;
    $cliente->idTelefoneCliente = $telefone->idTelefoneCliente; // Relacionando o cliente ao telefone
    $cliente->situacaoCliente = '0'; // Valor padrão se não fornecido
    $cliente->dataCadastroCliente = now();
    $cliente->save();

    return redirect()->back()->with('success', 'Cliente criado com sucesso!');
}


    // Métodos de API e outros
    public function storeapi(Request $request)
    {
       $cliente = new ClienteAdmModel(); // Corrigi o nome do model 
        $cliente->cnsCliente = $request->cns;
        $cliente->emailCliente = $request->email;
        $cliente->senhaCliente = bcrypt($request->senha); // Criptografar a senha
        $cliente->userCliente = $request->user;
        $cliente->save();

        return response()->json(['message' => 'Cliente criado com sucesso!'], 201);
    }

    public function show($id)
    {
        // Lógica para mostrar um cliente específico
    }

    public function edit($id)
    {
        // Lógica para editar um cliente específico
    }

    public function updateapi(Request $request, $id)
    {
        ClienteAdmModel::where('idCliente', $id)->update([ // Corrigi o nome do model
            'nomeCliente' => $request->nomeCliente,
            'cpfCliente' => $request->cpfCliente,
            'cnsCliente' => $request->cnsCliente,
            'emailCliente' => $request->emailCliente,
            'senhaCliente' => bcrypt($request->senhaCliente), // Encrypta a senha
        ]);

        return response()->json([
            'message' => 'Sucesso',
            'code' => 200
        ]);
    }

    public function destroy($id)
    {
        // Tenta encontrar o cliente pelo ID
        $cliente = ClienteAdmModel::find($id);
        
        // Verifica se o cliente existe
        if ($cliente) {
            // Atualiza a situação do cliente para '1' (inativo ou invisível)
            $cliente->situacaoCliente = 1;
            $cliente->save(); // Salva a mudança no banco de dados
    
            return redirect()->back()->with('success', 'Cliente desativado.');
        } else {
            return redirect()->back()->with('error', 'Cliente não encontrado.');
        }
    }
    
}

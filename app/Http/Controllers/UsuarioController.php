<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioModel;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = UsuarioModel::all();
        return response()->json($usuarios);
    }

    public function store(Request $request)
    {
        $usuario = new UsuarioModel();
        $usuario->nomeUsuario = $request->nome;
        $usuario->fotoUsuario = $request->foto;
        $usuario->cnsUsuario = $request->cns;
        $usuario->situacaoUsuario = $request->situacao;
        $usuario->senhaUsuario = $request->senha;
        $usuario->dataCadastroUsuario = now();

        $usuario->save();
        return response()->json(['message' => 'Usuario criado com sucesso!'], 201);
    }

    public function updateapi(Request $request, $id)
    {
        UsuarioModel::where('idUsuario', $id)->update([
            'nomeUsuario' => $request->nome,
            'fotoUsuario' => $request->foto,
            'cnsUsuario' => $request->cns,
            'situacaoUsuario' => $request->situacao,
            'senhaUsuario' => $request->senha,
            'dataCadastroUsuario' => $request->dataCadastro,
        ]);

        return response()->json(['message' => 'Sucesso', 'code' => 200]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use App\Models\comentariosModel;




class ComentariosController extends Controller
{
    public function updateapi(Request $request, $id)
    {
        comentariosModel::where('idComentarios', $id)->update([
            'comentario' => $request->comentario,	
            'idCliente' => $request->idCliente,	
        ]);

        return response()-> json([
            'mensage' => 'Sucesso',
            'code' =>200]
         );
    }

    public function store(Request $request)
    {
        $comentarios = new comentariosModel();

      
       // $comentarios->idComentarios = $request->id;
       // $comentarios->comentario = $request->email;
        //$comentarios->idCliente = $request->senha;

        $comentarios->comentario = $request->comentario;
        $comentarios->idCliente = $request->idCliente;
       

       
        $comentarios->save();  
        return response()->json(['message' => 'comentario criado com sucesso!'], 201);
    }

    public function storeapi(Request $request)
    {
        $comentarios = new comentariosModel();

        //$comentarios->idcomentarios = $request->idComentarios;
        $comentarios->comentario = $request->comentario;
        $comentarios->idCliente = $request->cliente;

        $comentarios->save();  
        return response()->json(['message' => 'Comentário criado com sucesso!'], 201);


    }

}



<?php

namespace App\Http\Controllers;

use App\Models\ModelMotivoSaida;
use Illuminate\Http\Request;

class MotivoSaidaController extends Controller
{
    public function index()
    {
        $motivos = ModelMotivoSaida::all();
        return response()->json($motivos);
    }

    public function store(Request $request)
    {
        $motivo = new ModelMotivoSaida();
        $motivo->motivoSaida = $request->motivoSaida;
        $motivo->save();

        return response()->json(['message' => 'Motivo de saída cadastrado com sucesso!'], 201);
    }

    public function show($id)
    {
        $motivo = ModelMotivoSaida::find($id);
        if (!$motivo) {
            return response()->json(['message' => 'Motivo não encontrado'], 404);
        }
        return response()->json($motivo);
    }

    public function update(Request $request, $id)
    {
        $motivo = ModelMotivoSaida::find($id);
        if (!$motivo) {
            return response()->json(['message' => 'Motivo não encontrado'], 404);
        }

        $motivo->update($request->all());
        return response()->json($motivo);
    }

    public function destroy($id)
    {
        $motivo = ModelMotivoSaida::find($id);
        if (!$motivo) {
            return response()->json(['message' => 'Motivo não encontrado'], 404);
        }

        $motivo->delete();
        return response()->json(['message' => 'Motivo deletado com sucesso']);
    }
}

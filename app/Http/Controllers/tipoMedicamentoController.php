<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoMedicamentoModel;

class TipoMedicamentoController extends Controller
{
    public function index()
    {
        $tipos = TipoMedicamentoModel::all();
        return response()->json($tipos);
    }

    public function store(Request $request)
    {
        $tipo = new TipoMedicamentoModel();
        $tipo->tipoMedicamento = $request->tipo;
        $tipo->formaMedicamento = $request->forma;
        $tipo->situacaoTipoMedicamento = $request->situacao;
        $tipo->dataCadastroTipoMedicamento = now();

        $tipo->save();
        return response()->json(['message' => 'Tipo de Medicamento criado com sucesso!'], 201);
    }

    public function updateapi(Request $request, $id)
    {
        TipoMedicamentoModel::where('idTipoMedicamento', $id)->update([
            'tipoMedicamento' => $request->tipo,
            'formaMedicamento' => $request->forma,
            'situacaoTipoMedicamento' => $request->situacao,
        ]);

        return response()->json(['message' => 'Sucesso', 'code' => 200]);
    }
}

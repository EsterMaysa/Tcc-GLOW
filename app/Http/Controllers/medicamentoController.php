<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicamentoModel;

class MedicamentoController extends Controller
{
    public function index()
    {
        $medicamentos = MedicamentoModel::all();
        return response()->json($medicamentos);
    }

    public function store(Request $request)
    {
        $medicamento = new MedicamentoModel();
        $medicamento->nomeMedicamento = $request->nome;
        $medicamento->nomeGenericoMedicamento = $request->nomeGenerico;
        $medicamento->codigoDeBarrasMedicamento = $request->codigoDeBarras;
        $medicamento->registroAnvisaMedicamento = $request->registroAnvisa;
        $medicamento->concentracaoMedicamento = $request->concentracao;
        $medicamento->formaFarmaceuticaMedicamento = $request->formaFarmaceutica;
        $medicamento->composicaoMedicamento = $request->composicao;
        $medicamento->fotoMedicamentoOriginal = $request->fotoOriginal;
        $medicamento->fotoMedicamentoGenero = $request->fotoGenero;
        $medicamento->idDetentor = $request->idDetentor;
        $medicamento->idTipoMedicamento = $request->idTipo;
        $medicamento->situacaoMedicamento = $request->situacao;
        $medicamento->dataCadastroMedicamento = now();

        $medicamento->save();
        return response()->json(['message' => 'Medicamento criado com sucesso!'], 201);
    }

    public function updateapi(Request $request, $id)
    {
        MedicamentoModel::where('idMedicamento', $id)->update([
            'nomeMedicamento' => $request->nome,
            'nomeGenericoMedicamento' => $request->nomeGenerico,
            'codigoDeBarrasMedicamento' => $request->codigoDeBarras,
            'registroAnvisaMedicamento' => $request->registroAnvisa,
            'concentracaoMedicamento' => $request->concentracao,
            'formaFarmaceuticaMedicamento' => $request->formaFarmaceutica,
            'composicaoMedicamento' => $request->composicao,
            'fotoMedicamentoOriginal' => $request->fotoOriginal,
            'fotoMedicamentoGenero' => $request->fotoGenero,
            'idDetentor' => $request->idDetentor,
            'idTipoMedicamento' => $request->idTipo,
            'situacaoMedicamento' => $request->situacao,
        ]);

        return response()->json(['message' => 'Sucesso', 'code' => 200]);
    }
}

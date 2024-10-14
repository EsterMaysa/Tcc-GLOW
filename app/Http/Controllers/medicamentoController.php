<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicamentoModel;
use App\Models\DetentorModel; //model detentor
use App\Models\TipoMedicamentoModel; //model tipo medicamento


class MedicamentoController extends Controller
{
    public function index()
    {
        $detentor = DetentorModel::all(); 
        $tiposMedicamento = TipoMedicamentoModel::all(); 
    
        return view('adm.Medicamento.cadastroMed', compact('detentor', 'tiposMedicamento'));
    }

    public function medicamentos()
    {
        $medicamento = MedicamentoModel::with(['detentor','tipoMedicamento'])
        ->orderBy('dataCadastroMedicamento', 'desc')
        ->get();
    
        return view('adm.Medicamento.Medicamento', compact('medicamento'));

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

        if ($request->hasFile('fotoOriginal')) {
            $fileOriginal = $request->file('fotoOriginal');
            $pathOriginal = $fileOriginal->store('fotos_medicamentos', 'public');
            $medicamento->fotoMedicamentoOriginal = $pathOriginal;
        }       
        
        if ($request->hasFile('fotoGenero')) {
            $fileGenero = $request->file('fotoGenero');
            $pathGenero = $fileGenero->store('fotos_medicamentos', 'public');
            $medicamento->fotoMedicamentoGenero = $pathGenero;
        }
    

        $medicamento->idDetentor = $request->idDetentor;
        $medicamento->idTipoMedicamento = $request->idTipo;


        $medicamento->situacaoMedicamento = "A";
        $medicamento->dataCadastroMedicamento = now();

        $medicamento->save();

        return redirect('/medicamento');
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

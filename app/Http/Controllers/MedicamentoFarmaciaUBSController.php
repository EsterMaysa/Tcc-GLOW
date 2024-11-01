<?php

namespace App\Http\Controllers;

use App\Models\ModelMedicamentoFarmaciaUBS;
use Illuminate\Http\Request;

class MedicamentoFarmaciaUBSController extends Controller
{
    public function index()
    {
        $medicamento = ModelMedicamentoFarmaciaUBS::all();
        return view('farmacia.Medicamento.medicamentoFarmacia', compact('medicamento'));
    }

    public function store(Request $request)
    {
        $medicamento = new ModelMedicamentoFarmaciaUBS();

        $medicamento->nomeMedicamento = $request->nomeMedicamento;
        $medicamento->nomeGenericoMedicamento = $request->nomeGenericoMedicamento;
        $medicamento->codigoDeBarrasMedicamento = $request->codigoDeBarrasMedicamento;
        $medicamento->validadeMedicamento = $request->validadeMedicamento;
        $medicamento->loteMedicamento = $request->loteMedicamento;
        $medicamento->dosagemMedicamento = $request->dosagemMedicamento;
        $medicamento->formaFarmaceuticaMedicamento = $request->formaFarmaceuticaMedicamento;
        $medicamento->composicaoMedicamento = $request->composicaoMedicamento;
        $medicamento->situacaoMedicamento = "A";
        $medicamento->dataCadastroMedicamento = now();
        $medicamento->save();

        return redirect('/MedicamentoHome');
    }


    public function edit($id)
    {
        $medicamento = ModelMedicamentoFarmaciaUBS::findOrFail($id);
        return view('farmacia.Medicamento.atualizarMedicamento', compact('medicamento'));
    }

    public function update(Request $request, $id)
    {
        $medicamento = ModelMedicamentoFarmaciaUBS::findOrFail($id);

        $medicamento->nomeMedicamento = $request->nomeMedicamento;
        $medicamento->nomeGenericoMedicamento = $request->nomeGenericoMedicamento;
        $medicamento->codigoDeBarrasMedicamento = $request->codigoDeBarrasMedicamento;
        $medicamento->validadeMedicamento = $request->validadeMedicamento;
        $medicamento->loteMedicamento = $request->loteMedicamento;
        $medicamento->dosagemMedicamento = $request->dosagemMedicamento;
        $medicamento->formaFarmaceuticaMedicamento = $request->formaFarmaceuticaMedicamento;
        $medicamento->composicaoMedicamento = $request->composicaoMedicamento;
        $medicamento->situacaoMedicamento = $request->situacaoMedicamento;

        $medicamento->save();

        return redirect('/MedicamentoHome')->with('success', 'Medicamento atualizado com sucesso!');
    }


    public function destroy($id)
    {
        $medicamento = ModelMedicamentoFarmaciaUBS::findOrFail($id);
        $medicamento->situacaoMedicamento = 'D'; 
        $medicamento->save();
    
        return redirect('/MedicamentoHome')->with('success', 'Medicamento Desativado com sucesso!');
    
    }
}

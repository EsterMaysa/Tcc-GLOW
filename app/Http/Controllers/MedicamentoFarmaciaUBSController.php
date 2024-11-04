<?php

namespace App\Http\Controllers;

use App\Models\ModelMedicamentoFarmaciaUBS;
use Illuminate\Http\Request;

class MedicamentoFarmaciaUBSController extends Controller
{
    public function index()
    {
        $medicamentos = ModelMedicamentoFarmaciaUBS::orderBy('dataCadastroMedicamento', 'desc')->get();


        return view('farmacia.Medicamento.medicamentoFarmacia', compact('medicamentos'));
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
        $medicamento->formaFarmaceuticaMedicamento = $request->forma;
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
    public function ativar($id)
    {
        $medicamento = ModelMedicamentoFarmaciaUBS::findOrFail($id);
        $medicamento->situacaoMedicamento = 'A'; 
        $medicamento->save();
    
        return redirect('/MedicamentoHome')->with('success', 'Medicamento ativado com sucesso!');
    
    }

    public function filtrar(Request $request)
    {
        // Obter todos os medicamentos
        $medicamentos = ModelMedicamentoFarmaciaUBS::query();
    
        // Filtrando por forma farmacêutica
        if ($request->filled('formaFarmaceutica')) {
            $medicamentos->whereIn('formaFarmaceuticaMedicamento', $request->formaFarmaceutica);
        }
    
        // Filtrando por validade
        if ($request->filled('filtroValidadeInicio')) {
            $medicamentos->where('validadeMedicamento', '>=', $request->filtroValidadeInicio);
        }
        if ($request->filled('filtroValidadeFim')) {
            $medicamentos->where('validadeMedicamento', '<=', $request->filtroValidadeFim);
        }
    
        // Filtrando por data de cadastro
        if ($request->filled('filtroDataCadastroInicio')) {
            $medicamentos->where('dataCadastroMedicamento', '>=', $request->filtroDataCadastroInicio);
        }
        if ($request->filled('filtroDataCadastroFim')) {
            $medicamentos->where('dataCadastroMedicamento', '<=', $request->filtroDataCadastroFim);
        }
    
        // Filtrando por situação
        if ($request->filled('filtroSituacao')) {
            $medicamentos->where('situacaoMedicamento', $request->filtroSituacao);
        }
    
        // Obtendo os resultados filtrados
        $medicamentos = $medicamentos->get();
    
        // Retornar a view com os medicamentos filtrados
        return view('farmacia.Medicamento.medicamentoFarmacia', compact('medicamentos'));
    }
    
}

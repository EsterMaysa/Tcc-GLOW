<?php

namespace App\Http\Controllers;

use App\Models\MedicamentoFarmaciaModel;

use App\Models\TipoMedicamentoModelFarmacia; //model tipo medicamento

use App\Models\FabricanteFarmaciaModel; //model fabricante


use Illuminate\Http\Request;

class MedicamentoFarmaciaController extends Controller
{
    // Método para listar todos os medicamentos, tipo e fabricante
    public function index()
    {
        $medicamentos = MedicamentoFarmaciaModel::all(); 

        //tipo de medicamento
        $tipoMedicamento = TipoMedicamentoModelFarmacia::all();

        //fabricante
        $fabricantes = FabricanteFarmaciaModel::all();

        return view('farmacia.MedicamentoFarmacia', compact('medicamentos','tipoMedicamento','fabricantes')); // Passa os dados para a view
    }

    // Método para armazenar um novo medicamento
    public function store(Request $request)
    {

            // Validação dos dados fabricante
            $request->validate([
                'idFabricante' => 'nullable|exists:tbFabricanteFarmacia,idFabricante',
                'fabricante' => 'nullable|string|max:100',
            ]);

            // Se um fabricante existente foi selecionado
            if ($request->filled('idFabricante')) {
                $fabricanteId = $request->idFabricante;
            } elseif ($request->filled('fabricante')) { // Se um novo fabricante foi inserido
                // Crie um novo fabricante
                $fabricante = new Fabricante();
                $fabricante->nomeFabricante = $request->fabricante;
                // Preencha outros campos necessários...
                $fabricante->save();

                $fabricanteId = $fabricante->idFabricante;
            }


        $medicamento = new MedicamentoFarmaciaModel();

        $medicamento->nomeMedicamento = $request->nomeMedicamento;
        $medicamento->nomeGenericoMedicamento = $request->nomeGenericoMedicamento;
        $medicamento->codigoDeBarrasMedicamento = $request->codigoDeBarrasMedicamento;
        $medicamento->validadeMedicamento = $request->validadeMedicamento; // Ex: '2024-12-31'
        $medicamento->loteMedicamento = $request->loteMedicamento;
        $medicamento->fabricacaoMedicamento = $request->fabricacaoMedicamento; // Ex: '2023-10-07'
        $medicamento->dosagemMedicamento = $request->dosagemMedicamento; // Ex: '500mg'
        $medicamento->formaFarmaceuticaMedicamento = $request->formaFarmaceuticaMedicamento; // Ex: 'Comprimido'
        $medicamento->quantMedicamento = $request->quantMedicamento; // Ex: 100
        $medicamento->composicaoMedicamento = $request->composicaoMedicamento;
        $medicamento->idFabricante = $fabricanteId;
        $medicamento->idTipoMedicamento = $request->idTipoMedicamento; // Chave estrangeira para o tipo de medicamento
        $medicamento->situacaoMedicamento =  '0'; // Situação, ex: 'A' para ativo
        $medicamento->dataCadastroMedicamento = now(); // Data atual
        
        $medicamento->save(); // Salva o registro no banco de dados
        
        session()->flash('success_messages', ['Medicamento criado com sucesso!']);

        // Redireciona para a rota de medicamentos
        return redirect()->route('medicamentos.index');    }

    // Adicione métodos adicionais conforme necessário (exibir, editar, atualizar, excluir)
}

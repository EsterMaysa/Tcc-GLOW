<?php

namespace App\Http\Controllers;

use App\Models\MedicamentoFarmaciaModel;
use App\Models\TipoMedicamentoModelFarmacia; // Model tipo medicamento
use App\Models\FabricanteFarmaciaModel; // Model fabricante
use Illuminate\Http\Request;

class MedicamentoFarmaciaController extends Controller
{
    // Método para listar todos os medicamentos, tipos e fabricantes
    public function index()
    {
        $medicamentos = MedicamentoFarmaciaModel::all(); 

        // Tipo de medicamento
        $tipoMedicamento = TipoMedicamentoModelFarmacia::all();

        // Fabricantes
        $fabricantes = FabricanteFarmaciaModel::all();

        return view('farmacia.MedicamentoFarmacia', compact('medicamentos', 'tipoMedicamento', 'fabricantes')); // Passa os dados para a view
    }

    // Método para armazenar um novo medicamento
    public function store(Request $request)
    {
       
        
            // Verifica os dados recebidos
            dd($request->all());
        
            // Validação dos dados do fabricante
            $request->validate([
                'idFabricante' => 'nullable|exists:tbFabricanteFarmacia,idFabricante',
                'nomeFabricante' => 'nullable|string|max:100', 
            ]);
        
            // Resto do código permanece o mesmo
        

        // Criação de um novo medicamento
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
        $medicamento->idFabricante = $fabricanteId ?? null; // Verifica se o fabricanteId está definido
        $medicamento->idTipoMedicamento = $request->idTipoMedicamento; // Chave estrangeira para o tipo de medicamento
        $medicamento->situacaoMedicamento = '0'; // Situação padrão (0 para não ativo)
        $medicamento->dataCadastroMedicamento = now(); // Data atual
        
        // Salva o registro no banco de dados
        $medicamento->save();
        
        // Mensagem de sucesso
        session()->flash('success_messages', ['Medicamento criado com sucesso!']);

        // Redireciona para a lista de medicamentos (ajuste a rota conforme necessário)
        return redirect()->route('medicamentos.index');
    }

    // Adicione métodos adicionais conforme necessário (exibir, editar, atualizar, excluir)
}

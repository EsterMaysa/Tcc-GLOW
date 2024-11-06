<?php

namespace App\Http\Controllers;

use App\Models\ModelEntradaMedicamento;
use App\Models\ModelFuncionarioFarmaciaUBS;
use App\Models\ModelMedicamentoFarmaciaUBS;
use App\Models\ModelMotivoEntrada;
use App\Models\ModelTipoMovimentacao;
use App\Models\ModelEstoqueFarmaciaUBS;


use Illuminate\Http\Request;

class EntradaMedicamentoController extends Controller
{
    public function index()
    {
        $medicamentos = ModelEntradaMedicamento::join('tbMedicamentoFarmaciaUBS', 'tbEntradaMedicamento.idMedicamento', '=', 'tbMedicamentoFarmaciaUBS.idMedicamento')
            ->join('tbMotivoEntrada', 'tbEntradaMedicamento.idMotivoEntrada', '=', 'tbMotivoEntrada.idMotivoEntrada')
            ->join('tbFuncionarioFarmaciaUBS', 'tbEntradaMedicamento.idFuncionario', '=', 'tbFuncionarioFarmaciaUBS.idFuncionario')
            ->select(
                'tbEntradaMedicamento.idEntradaMedicamento',
                'tbMedicamentoFarmaciaUBS.nomeMedicamento',
                'tbEntradaMedicamento.dataEntrada',
                'tbEntradaMedicamento.quantidade',
                'tbEntradaMedicamento.lote',
                'tbEntradaMedicamento.validade',
                'tbMotivoEntrada.motivoEntrada',
                'tbFuncionarioFarmaciaUBS.nomeFuncionario'
            )
            ->get();
        
        return view('farmacia.medicamento.MedicamentoEntrada', compact('medicamentos'));
    }
    
    public function create()
    {
        $medicamentos = ModelMedicamentoFarmaciaUBS::all(); // Altere conforme seu modelo
        $motivosEntrada = ModelMotivoEntrada::all(); // Altere conforme seu modelo
        $funcionarios = ModelFuncionarioFarmaciaUBS::all(); // Altere conforme seu modelo
    
        return view('farmacia.Medicamento.EntradaMedInsert', compact('medicamentos', 'motivosEntrada', 'funcionarios'));
    }
    // public function store(Request $request)
    // {
    //     // Busca o medicamento usando o ID selecionado
    //     $medicamento = ModelMedicamentoFarmaciaUBS::find($request->idMedicamento);
        
    //     // Verifica se o medicamento foi encontrado
    //     if (!$medicamento) {
    //         return redirect()->back()->with('error', 'O medicamento não está cadastrado.');
    //     }
    
    //     // Cria ou busca o motivo de entrada
    //     $motivo = ModelMotivoEntrada::firstOrCreate(
    //         ['motivoEntrada' => $request->motivoEntrada]
    //     );
    
    //     // Busca o funcionário pelo ID
    //     $funcionario = ModelFuncionarioFarmaciaUBS::find($request->idFuncionario);
    
    //     if (!$funcionario) {
    //         return redirect()->back()->with('error', 'Funcionário não encontrado.');
    //     }
    
    //     // Criação da entrada de medicamento
    //     $entrada = new ModelEntradaMedicamento();
    //     $entrada->dataEntrada = $request->dataEntrada;
    //     $entrada->quantidade = $request->quantidade;
    //     $entrada->lote = $request->lote;
    //     $entrada->validade = $request->validade;
    //     $entrada->idFuncionario = $funcionario->idFuncionario; // Usa o ID do funcionário
    //     $entrada->idMedicamento = $medicamento->idMedicamento; // Usa o ID do medicamento encontrado
    //     $entrada->idMotivoEntrada = $motivo->idMotivoEntrada; // Usa o ID do motivo criado ou buscado
    
    //     // Salva a entrada de medicamento
    //     $entrada->save();
    
    //     // Redireciona para a página onde você insere entradas de medicamentos
    //     return redirect()->route('medicamentos.index')->with('success', 'Entrada de medicamento cadastrada com sucesso!');
    // }
    
    public function store(Request $request)
    {
        // Busca o medicamento usando o ID selecionado
        $medicamento = ModelMedicamentoFarmaciaUBS::find($request->idMedicamento);
        
        if (!$medicamento) {
            return redirect()->back()->with('error', 'O medicamento não está cadastrado.');
        }
    
        // Cria ou busca o motivo de entrada
        $motivo = ModelMotivoEntrada::firstOrCreate(
            ['motivoEntrada' => $request->motivoEntrada]
        );
    
        // Busca o funcionário pelo ID
        $funcionario = ModelFuncionarioFarmaciaUBS::find($request->idFuncionario);
    
        if (!$funcionario) {
            return redirect()->back()->with('error', 'Funcionário não encontrado.');
        }
    
        // Criação da entrada de medicamento
        $entrada = new ModelEntradaMedicamento();
        $entrada->dataEntrada = $request->dataEntrada;
        $entrada->quantidade = $request->quantidade;
        $entrada->lote = $request->lote;
        $entrada->validade = $request->validade;
        $entrada->idFuncionario = $funcionario->idFuncionario;
        $entrada->idMedicamento = $medicamento->idMedicamento;
        $entrada->idMotivoEntrada = $motivo->idMotivoEntrada;
        $entrada->save();
    
        // Verifica o ID de movimentação para 'Entrada'
        $tipoMovimentacao = ModelTipoMovimentacao::where('movimentacao', 'Entrada')->first();
        
        if (!$tipoMovimentacao) {
            return redirect()->back()->with('error', 'Tipo de movimentação "Entrada" não encontrado.');
        }
    
        // Prepara dados para salvar no estoque
        $estoqueRequest = new Request([
            'quantEstoque' => $entrada->quantidade, 
            'dataMovimentacao' => now(), 
            'idFuncionario' => $entrada->idFuncionario, 
            'idMedicamento' => $entrada->idMedicamento, 
            'idTipoMovimentacao' => $tipoMovimentacao->idTipoMovimentacao, // ID encontrado para 'Entrada'
            'situacaoEstoque' => "A"
        ]);
    
        // Chama o método de estoque para salvar a movimentação
        app(EstoqueFarmaciaUBSController::class)->store($estoqueRequest);
    
        return redirect()->route('medicamentos.index')->with('success', 'Entrada de medicamento e atualização de estoque realizadas com sucesso!');
    }
    
    public function estoque(Request $request)
    {
        // Busca o medicamento usando o ID selecionado
        $medicamento = ModelMedicamentoFarmaciaUBS::find($request->idMedicamento);
        
        if (!$medicamento) {
            return redirect()->back()->with('error', 'O medicamento não está cadastrado.');
        }
    
        // Cria ou busca o motivo de entrada
        $motivo = ModelMotivoEntrada::firstOrCreate(
            ['motivoEntrada' => $request->motivoEntrada]
        );
    
        // Busca o funcionário pelo ID
        $funcionario = ModelFuncionarioFarmaciaUBS::find($request->idFuncionario);
    
        if (!$funcionario) {
            return redirect()->back()->with('error', 'Funcionário não encontrado.');
        }
    
        // Criação da entrada de medicamento
        $entrada = new ModelEntradaMedicamento();
        $entrada->dataEntrada = $request->dataEntrada;
        $entrada->quantidade = $request->quantidade;
        $entrada->lote = $request->lote;
        $entrada->validade = $request->validade;
        $entrada->idFuncionario = $funcionario->idFuncionario;
        $entrada->idMedicamento = $medicamento->idMedicamento;
        $entrada->idMotivoEntrada = $motivo->idMotivoEntrada;
        $entrada->save();
    
        // Verifica o ID de movimentação para 'Entrada'
        $tipoMovimentacao = ModelTipoMovimentacao::where('movimentacao', 'Entrada')->first();
        
        if (!$tipoMovimentacao) {
            return redirect()->back()->with('error', 'Tipo de movimentação "Entrada" não encontrado.');
        }
    
        // Prepara dados para salvar no estoque
        $estoqueRequest = new Request([
            'quantEstoque' => $entrada->quantidade, 
            'dataMovimentacao' => now(), 
            'idFuncionario' => $entrada->idFuncionario, 
            'idMedicamento' => $entrada->idMedicamento, 
            'idTipoMovimentacao' => $tipoMovimentacao->idTipoMovimentacao, // ID encontrado para 'Entrada'
            'situacaoEstoque' => "A"
        ]);
    
        // Chama o método de estoque para salvar a movimentação
        app(EstoqueFarmaciaUBSController::class)->store($estoqueRequest);
    
        return redirect('/estoqueHome')->with('success', 'Estoque registrado com sucesso!');
    }
    

    public function buscarMedicamento(Request $request)
    {
        $nomeMedicamento = $request->query('nomeMedicamento');
    
        $medicamento = ModelMedicamentoFarmaciaUBS::where('nomeMedicamento', $nomeMedicamento)->first();
    
        // Retorna também lote e validade
        return response()->json([
            'idMedicamento' => $medicamento ? $medicamento->idMedicamento : null,
            'lote' => $medicamento ? $medicamento->loteMedicamento : null, // Substitua 'loteMedicamento' pelo campo correto no seu modelo
            'validade' => $medicamento ? $medicamento->validadeMedicamento : null // Substitua 'validadeMedicamento' pelo campo correto no seu modelo
        ]);
    }
    public function showForm()
    {
        $medicamentos = ModelMedicamentoFarmaciaUBS::all();
        $funcionarios = ModelFuncionarioFarmaciaUBS::all(); // Ajuste o nome do modelo conforme necessário
    
        return view('entradaMedicamento', compact('medicamentos', 'funcionarios'));
    }
    
    public function show($id)
    {
        $entrada = ModelEntradaMedicamento::find($id);
        if (!$entrada) {
            return response()->json(['message' => 'Entrada não encontrada'], 404);
        }
        return response()->json($entrada);
    }

    public function update(Request $request, $id)
    {
        $entrada = ModelEntradaMedicamento::find($id);
        if (!$entrada) {
            return response()->json(['message' => 'Entrada não encontrada'], 404);
        }

        $entrada->update($request->all());
        return response()->json($entrada);
    }

    public function destroy($id)
    {
        $entrada = ModelEntradaMedicamento::find($id);
        if (!$entrada) {
            return response()->json(['message' => 'Entrada não encontrada'], 404);
        }

        $entrada->delete();
        return response()->json(['message' => 'Entrada deletada com sucesso']);
    }
}

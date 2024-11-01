<?php

namespace App\Http\Controllers;

use App\Models\ModelEntradaMedicamento;
use App\Models\ModelFuncionario;
use App\Models\ModelFuncionarioFarmaciaUBS;
use App\Models\ModelMedicamentoFarmaciaUBS;
use App\Models\ModelMotivoEntrada;
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

        return view('farmacia.medicamento.medicamentoFarmacia', compact('medicamentos'));
    }

    public function create()
    {
        $medicamentos = ModelMedicamentoFarmaciaUBS::all(); // Altere conforme seu modelo
        $motivosEntrada = ModelMotivoEntrada::all(); // Altere conforme seu modelo
        $funcionarios = ModelFuncionarioFarmaciaUBS::all(); // Altere conforme seu modelo
    
        return view('farmacia.Medicamento.EntradaMedInsert', compact('medicamentos', 'motivosEntrada', 'funcionarios'));
    }

    public function store(Request $request)
    {
        // Busca o medicamento pelo nome
        $medicamento = ModelMedicamentoFarmaciaUBS::where('nomeMedicamento', $request->nomeMedicamento)->first();
        
        // Verifica se o medicamento foi encontrado
        if (!$medicamento) {
            return redirect()->back()->with('error', 'O medicamento não está cadastrado.');
        }
    
        // Cria ou busca o motivo de entrada
        $motivo = ModelMotivoEntrada::firstOrCreate(
            ['motivoEntrada' => $request->motivoEntrada]
        );
    
        // Busca o funcionário pelo nome, e se não existir, cria um novo
        $funcionario = ModelFuncionarioFarmaciaUBS::firstOrCreate(
            ['nomeFuncionario' => $request->nomeFuncionario],
            [
                'cpfFuncionario' => $request->cpfFuncionario ?? null,
                'cargoFuncionario' => $request->cargoFuncionario ?? 'Indefinido',
                'situacaoFuncionario' => 'ativo', // define um valor padrão para situação
                'dataCadastroFuncionario' => now()
            ]
        );
    
        // Criação da entrada de medicamento
        $entrada = new ModelEntradaMedicamento();
        $entrada->dataEntrada = $request->dataEntrada;
        $entrada->quantidade = $request->quantidade;
        $entrada->lote = $request->lote;
        $entrada->validade = $request->validade;
        $entrada->idFuncionario = $funcionario->idFuncionario; // Usa o ID do funcionário criado ou buscado
        $entrada->idMedicamento = $medicamento->idMedicamento; // Usa o ID do medicamento encontrado
        $entrada->idMotivoEntrada = $motivo->idMotivoEntrada; // Usa o ID do motivo criado ou buscado
    
        // Salva a entrada de medicamento
        $entrada->save();
    
        // Redireciona para a página onde você insere entradas de medicamentos
        return redirect()->route('medicamentos.index')->with('success', 'Entrada de medicamento cadastrada com sucesso!');
    }
    
    
    public function buscarMedicamento(Request $request)
    {
        $nomeMedicamento = $request->query('nomeMedicamento');
    
        $medicamento = ModelMedicamentoFarmaciaUBS::where('nomeMedicamento', $nomeMedicamento)->first();
    
        return response()->json(['idMedicamento' => $medicamento ? $medicamento->idMedicamento : null]);
    }    
    

    // public function buscarFuncionario(Request $request)
    // {
    //     $nomeFuncionario = $request->query('nomeFuncionario');
        
    //     // Procura o funcionário pelo nome
    //     $funcionario = ModelFuncionarioFarmaciaUBS::where('nomeFuncionario', $nomeFuncionario)->first();
    
    //     // Retorna o ID do funcionário ou null se não for encontrado
    //     return response()->json(['idFuncionario' => $funcionario ? $funcionario->idFuncionario : null]);
    // }

   
    
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

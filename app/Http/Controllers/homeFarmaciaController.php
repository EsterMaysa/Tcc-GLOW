<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelEstoqueFarmaciaUBS;
use App\Models\ModelMedicamentoFarmaciaUBS;
use App\Models\ModelEntradaMedicamento;
use App\Models\ModelSaidaMedicamento;

use App\Models\TipoMedicamentoModel;

class HomeFarmaciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estoque = ModelEstoqueFarmaciaUBS::with('medicamento')  // Relacionando com a tabela de medicamentos
            ->select('idMedicamento', \DB::raw('SUM(quantEstoque) as totalEstoque'))  // Soma das quantidades
            ->groupBy('idMedicamento')  // Agrupar por id do medicamento
            ->get();

        $entradas = ModelEntradaMedicamento::select(\DB::raw('DATE(dataEntrada) as data, SUM(quantidade) as totalEntradas'))
            ->groupBy(\DB::raw('DATE(dataEntrada)'))
            ->get();

        // Saídas por dia
        $saidas = ModelSaidaMedicamento::select(\DB::raw('DATE(dataSaida) as data, SUM(quantidade) as totalSaidas'))
            ->groupBy(\DB::raw('DATE(dataSaida)'))
            ->get();

        // Organizar os dados para o gráfico
        $datas = $entradas->merge($saidas)->pluck('data')->unique()->sort()->values(); // Unir as datas e remover duplicatas
        $quantidadeEntradas = [];
        $quantidadeSaidas = [];

        foreach ($datas as $data) {
            $quantidadeEntradas[] = $entradas->firstWhere('data', $data)->totalEntradas ?? 0; // Se não tiver entrada, atribui 0
            $quantidadeSaidas[] = $saidas->firstWhere('data', $data)->totalSaidas ?? 0; // Se não tiver saída, atribui 0
        }
        // Extrair os dados de nome e quantidade para passar para o gráfico
        $nomes = $estoque->map(function ($item) {
            return $item->medicamento->nomeMedicamento; // Nome do medicamento
        });

        $quantidades = $estoque->map(function ($item) {
            return $item->totalEstoque; // Quantidade total em estoque
        });

        $estoquetabela = ModelEstoqueFarmaciaUBS::all();
        $medicamento = ModelMedicamentoFarmaciaUBS::orderBy('dataCadastroMedicamento', 'desc')->take(5)->get();
        // Passar os dados para a view
        return view('farmacia.homeFarmacia', [
            'nomes' => $nomes,
            'quantidades' => $quantidades,
            'estoquetabela' => $estoquetabela,
            'medicamento' => $medicamento,
            'datas' => $datas,
            'quantidadeEntradas' => $quantidadeEntradas,
            'quantidadeSaidas' => $quantidadeSaidas,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

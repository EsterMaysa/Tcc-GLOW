<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicamentoModel;
use App\Models\UBSModel;
use App\Models\UsuarioModel;
use App\Models\ClienteAdmModel;

use App\Models\TipoMedicamentoModel;

class HomeAdmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    // Medicamentos cadastrados hoje
    $medicamentosHoje = MedicamentoModel::whereDate('dataCadastroMedicamento', today())->count();
    $totalMedicamentos = MedicamentoModel::count();
    $totalUbs = UBSModel::count();
    $totalUser = UsuarioModel::count();

    // Obter os tipos de medicamentos com a quantidade de medicamentos em cada tipo
    $medicamentosPorTipo = TipoMedicamentoModel::select('tipoMedicamento')
        ->withCount('medicamentos')
        ->get();

    return view('welcome', compact('medicamentosHoje', 'totalMedicamentos', 'totalUbs', 'totalUser', 'medicamentosPorTipo'));

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

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
        $detentores = DetentorModel::all();
        $tiposMedicamento = TipoMedicamentoModel::all();
        
        // Verifica se há dados na sessão para preencher o formulário
        $formData = session()->get('formData', []);

        return view('adm.Medicamento.cadastroMed', compact('detentores', 'tiposMedicamento', 'formData'));
    }

    public function medicamentos()
    {
        $detentores = DetentorModel::all();
        $tiposMedicamento = TipoMedicamentoModel::all();

        $medicamento = MedicamentoModel::with(['detentor', 'tipoMedicamento'])
            ->orderBy('dataCadastroMedicamento', 'desc')
            ->get();

        return view('adm.Medicamento.Medicamento', compact('medicamento','detentores', 'tiposMedicamento'));
    }
   
    public function search(Request $request)
    {

        $detentores = DetentorModel::all();
        $tiposMedicamento = TipoMedicamentoModel::all();

        $query = $request->input('query');
    
        // Buscando medicamentos com base na query
        $medicamento = MedicamentoModel::with(['detentor', 'tipoMedicamento'])
            ->where('nomeMedicamento', 'like', "%{$query}%")
            ->orWhere('nomeGenericoMedicamento', 'like', "%{$query}%")
            ->orWhere('codigoDeBarrasMedicamento', 'like', "%{$query}%")
            ->orWhereHas('detentor', function($q) use ($query) {
                $q->where('nomeDetentor', 'like', "%{$query}%");
            })
            ->orderBy('dataCadastroMedicamento', 'desc')
            ->get();
    
        // Retornar a view com os medicamentos filtrados
        return view('adm.Medicamento.Medicamento', compact('medicamento','detentores', 'tiposMedicamento'));
    }
    
    
    public function store(Request $request)
    {


        $request->validate([
            'nome' => 'required|string|max:255',
            'nomeGenerico' => 'nullable|string|max:255',
            'codigoDeBarras' => 'required|string|max:200', // Verifica se o código de barras é único
            'registroAnvisa' => 'nullable|string|max:50',
            'concentracao' => 'nullable|string|max:50',
            'formaFarmaceutica' => 'nullable|string|max:50',
            'composicao' => 'nullable|string|max:255',
            'fotoOriginal' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Limite de 2MB
            'fotoGenero' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Limite de 2MB
            'idDetentor' => 'required|exists:tbDetentor,idDetentor', // Verifica se o detentor existe
            'idTipo' => 'required|exists:tbTipoMedicamento,idTipoMedicamento', // Verifica se o tipo de medicamento existe
        ]);

        $existingMedicamento = MedicamentoModel::where('codigoDeBarrasMedicamento', $request->codigoDeBarras)
            ->where('situacaoMedicamento', 'A') // A significa Ativo
            ->first();

        if ($existingMedicamento) {
            return redirect()->back()->withErrors(['codigoDeBarras' => 'Já existe um medicamento ativo com este código de barras.'])->withInput();
        }

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

    // Função para exibir o formulário de edição
    public function edit($idMedicamento)
    {
        // Busca o medicamento pelo ID
        $medicamento = MedicamentoModel::findOrFail($idMedicamento);

        // Carrega as opções de Detentor e Tipos de Medicamento
        $detentor = DetentorModel::all();
        $tiposMedicamento = TipoMedicamentoModel::all();

        // Retorna a view de edição com os dados do medicamento
        return view('adm.Medicamento.editMedicamento', compact('medicamento', 'detentor', 'tiposMedicamento'));
    }

    public function update(Request $request, $id)
    {


        // Encontra o medicamento que será atualizado
        $medicamento = MedicamentoModel::findOrFail($id);

        // Atualiza os dados do medicamento
        $medicamento->codigoDeBarrasMedicamento = $request->codigoDeBarras;
        $medicamento->nomeMedicamento = $request->nome;
        $medicamento->nomeGenericoMedicamento = $request->nomeGenerico;
        $medicamento->idDetentor = $request->idDetentor;
        $medicamento->idTipoMedicamento = $request->idTipo;
        $medicamento->formaFarmaceuticaMedicamento = $request->formaFarmaceutica;
        $medicamento->concentracaoMedicamento = $request->concentracao;
        $medicamento->composicaoMedicamento = $request->composicao;
        $medicamento->registroAnvisaMedicamento = $request->registroAnvisa;
        $medicamento->situacaoMedicamento = $request->situacaoMedicamento;



        // Upload de fotos (se fornecidas)
        if ($request->hasFile('fotoOriginalMedicamento')) {
            $path = $request->file('fotoOriginalMedicamento')->store('fotos_medicamentos', 'public');
            $medicamento->fotoOriginalMedicamento = $path;
        }

        if ($request->hasFile('fotoGenericoMedicamento')) {
            $path = $request->file('fotoGenericoMedicamento')->store('fotos_medicamentos', 'public');
            $medicamento->fotoGenericoMedicamento = $path;
        }

        // Salva as alterações
        $medicamento->save();
        // Redireciona o usuário com uma mensagem de sucesso
        return redirect('/medicamento')->with('success', 'Medicamento atualizado com sucesso!');
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

    public function desativar($id)
    {
        // Encontrar o medicamento pelo ID
        $medicamento = MedicamentoModel::find($id);

        if ($medicamento) {
            // Desativar o medicamento (atualizar o campo de situação)
            $medicamento->situacaoMedicamento = 'D'; // ou outro valor que indica "inativo"
            $medicamento->save();
        }

        return redirect('/medicamento')->with('success', 'Medicamento desativado com sucesso.');
    }

    public function buscarMedicamentoPorCodigo($codigoDeBarras)
    {
        // Busca o medicamento na tabela tbMedicamento do banco de dados bdAdminGeral
        $medicamento = MedicamentoModel::where('codigoDeBarrasMedicamento', $codigoDeBarras)->first();

        if ($medicamento) {
            return response()->json($medicamento);
        }

        return response()->json(null);
    }

public function applyFilters(Request $request)
{
    $detentores = DetentorModel::all();
    $tiposMedicamento = TipoMedicamentoModel::all();

    $query = MedicamentoModel::query();

    // Filtrar por Situação
    if ($request->has('situacao') && !empty($request->situacao)) {
        $query->whereIn('situacaoMedicamento', $request->situacao);
    }

    // Filtrar por Forma Farmacêutica
    if ($request->has('formaFarmaceutica') && !empty($request->formaFarmaceutica)) {
        $query->whereIn('formaFarmaceuticaMedicamento', $request->formaFarmaceutica);
    }

    // Filtrar por Tipo de Medicamento
    if ($request->has('tipoMedicamento') && $request->tipoMedicamento != '') {
        $query->where('idTipoMedicamento', $request->tipoMedicamento);
    }

    // Filtrar por Data de Cadastro
    if ($request->has('dataCadastro') && $request->dataCadastro != '') {
        $query->whereDate('dataCadastroMedicamento', '=', $request->dataCadastro);
    }

    // Obter os resultados filtrados
    $medicamento = $query->get();

    return view('adm.Medicamento.Medicamento', compact('medicamento','detentores', 'tiposMedicamento'));
}


    // API
    public function indexApi()
    {
        // Obter todos os registros de UBS do modelo
        $med = MedicamentoModel::all();

        // Retornar a resposta JSON com os dados e uma mensagem de sucesso
        return response()->json([
            'message' => 'Sucesso',
            'code' => 200,
            'data' => $med // Inclui os dados obtidos do modelo
        ]);
    }
    
}

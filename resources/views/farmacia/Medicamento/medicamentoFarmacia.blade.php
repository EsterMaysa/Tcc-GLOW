@include('includes.headerFarmacia')

<!-- Main content -->
<div class="container" style="margin: 10px;">

<div class="col-md-9 col-lg-10 main-content">
    <div class="head-title">
        <div class="left">
            <h1>Medicamentos Disponíveis</h1>
        </div>

        <!-- Botão para a página de cadastro de medicamentos -->
        <div class="right">
            <a href="/FormsMed" class="btn btn-primary">
                <img src="{{ asset('Image/add_medicine_icon.png') }}" alt="">
                Cadastrar Medicamento
            </a>
        </div>
    </div>
</div>

<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Nome Genérico</th>
                <th>Código de Barras</th>
                <th>Lote</th>
                <th>Dosagem</th>
                <th>Forma Farmacêutica</th>
                <th>Validade</th>
                <th>Composição</th>
                <th>Situação</th>
                <th>Data de Cadastro</th>
                <th>Açoes</th>
                <th></th>


            </tr>
        </thead>
        <tbody>
            @foreach ($medicamento as $med)
            <tr>
                <td>{{ $med->nomeMedicamento }}</td>
                <td>{{ $med->nomeGenericoMedicamento }}</td>
                <td>{{ $med->codigoDeBarrasMedicamento }}</td>
                <td>{{ $med->loteMedicamento }}</td>
                <td>{{ $med->dosagemMedicamento }}</td>
                <td>{{ $med->formaFarmaceuticaMedicamento }}</td>
                <td>{{ \Carbon\Carbon::parse($med->validadeMedicamento)->format('d/m/Y') }}</td>
                <td>{{ $med->composicaoMedicamento }}</td>
                <td>{{ $med->situacaoMedicamento == 'A' ? 'Ativo' : 'Inativo' }}</td>
                <td>{{ \Carbon\Carbon::parse($med->dataCadastroMedicamento)->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('medicamentosFarma.edit', $med->idMedicamento) }}" class="btn btn-warning">Editar</a>
                </td>
                <td>
                    <form action="{{ route('medicamentosFarma.desativar', $med->idMedicamento) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja inativar este medicamento?');">
                        @csrf
                        @method('PATCH') 
                        <button type="submit" class="btn btn-danger">Desativar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

@include('includes.footer')
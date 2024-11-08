@include('includes.headerFarmacia')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Main content -->
<div class="container" style="margin: 10px;">
    <div class="col-md-9 col-lg-10 main-content">
        <div class="head-title">
            <div class="left">
                <h1>Medicamentos</h1>
            </div>

            <!-- Botão para a página de cadastro de medicamentos -->
            <div class="right">
                <a href="/FormsMed" class="btn btn-primary">Cadastrar Medicamento</a>
            </div>

            <!-- Modal de Filtros -->
            <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="filterModalLabel">Filtros de Medicamentos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Formulário de filtros -->
                            <form action="/filtrarMedFarma" method="GET">
                                <!-- Forma Farmacêutica (Checkboxes) -->
                                <div class="form-group">
                                    <label>Forma Farmacêutica</label>
                                    @php
                                    $formasFarmaceuticas = ['Comprimido', 'Cápsula', 'Pomada', 'Solução', 'Suspensão', 'Creme', 'Gel', 'Injeção'];
                                    @endphp
                                    @foreach ($formasFarmaceuticas as $forma)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="formaFarmaceutica[]" value="{{ $forma }}" id="forma{{ $forma }}">
                                        <label class="form-check-label" for="forma{{ $forma }}">{{ $forma }}</label>
                                    </div>
                                    @endforeach
                                </div>

                                <!-- Validade do Medicamento -->
                                <div class="form-group">
                                    <label for="filtroValidadeInicio">Validade</label>
                                    <div class="input-group">
                                        <p>de</p>
                                        <input type="date" class="form-control" id="filtroValidadeInicio" name="filtroValidadeInicio" placeholder="De">
                                        <p>Até</p>
                                        <input type="date" class="form-control" id="filtroValidadeFim" name="filtroValidadeFim" placeholder="Até">
                                    </div>
                                </div>

                                <!-- Data de Cadastro do Medicamento -->
                                <div class="form-group">
                                    <label for="filtroDataCadastroInicio">Data de Cadastro</label>
                                    <div class="input-group">
                                        <p>de</p>
                                        <input type="date" class="form-control" id="filtroDataCadastroInicio" name="filtroDataCadastroInicio" placeholder="De">
                                        <p>Até</p>
                                        <input type="date" class="form-control" id="filtroDataCadastroFim" name="filtroDataCadastroFim" placeholder="Até">
                                    </div>
                                </div>

                                <!-- Situação -->
                                <div class="form-group">
                                    <label for="filtroSituacao">Situação</label>
                                    <select class="form-control" id="filtroSituacao" name="filtroSituacao">
                                        <option value="">Todos</option>
                                        <option value="A">Ativo</option>
                                        <option value="D">Inativo</option>
                                    </select>
                                </div>

                                <!-- Botão de Aplicar Filtros -->
                                <button type="submit" class="btn btn-primary">Aplicar Filtros</button>
                                <a href="/MedicamentoHome" class="btn btn-secondary">Cancelar Filtros</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#filterModal">
                Filtros
            </button>
            <input type="text" id="searchInput" class="form-control" placeholder="Pesquisar por Nome, Genérico, Código ou Lote" style="margin-top: 10px;">
        </div>
    </div>

    <div class="container">
        <table class="table table-striped" id="medicamentoTable"> <!-- Adicionando o ID aqui -->
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
                    <th>Ações</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                @foreach ($medicamentos as $med)
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
                   
                   
                    @if ($med->situacaoMedicamento == 'A')
                    <td>
                        <a href="{{ route('medicamentosFarma.edit', $med->idMedicamento) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('medicamentosFarma.desativar', $med->idMedicamento) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja desativar este medicamento?');">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger">Desativar</button>
                        </form>
                       
                    </td>
                    @else
                    <td>
                        <form action="{{ route('medicamentosFarma.ativar', $med->idMedicamento) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja ativar este medicamento?');">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-primary">Ativar</button>
                        </form>
                    </td>
                 @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- jQuery e Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
// Função para filtrar a tabela de medicamentos
document.getElementById('searchInput').addEventListener('keyup', function() {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#medicamentoTable tbody tr');

    rows.forEach(row => {
        const columns = row.getElementsByTagName('td');
        let match = false;

        for (let i = 0; i < columns.length; i++) {
            if (columns[i].textContent.toLowerCase().includes(filter)) {
                match = true;
                break;
            }
        }

        row.style.display = match ? '' : 'none'; // Exibir ou ocultar a linha
    });
});
</script>

@include('includes.footer')

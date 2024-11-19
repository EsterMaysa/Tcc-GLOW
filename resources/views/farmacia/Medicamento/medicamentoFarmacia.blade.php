<!--CSS OK ASS:DUDA-->
@include('includes.headerFarmacia')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/Farmacia-CSS/Medicamento.css')}}">

<div class="navbar">
    <div class="search-container">
        <input type="text" class="search-input" placeholder="Pesquisar...">
        <button class="search-button"><i class="fas fa-search"></i></button>
    </div>
</div>

<div class="container-um">
    <div class="jumbotron-um">
        <h1 style="font-weight: bold;"> Medicamentos </h1>
        <p>gerencie os medicamentos.</p>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/medi.png') }}" alt="Entrada De Medicamentos" class="img-fluid">
    </div>
</div>

<div class="cadastros-container">
    <h3><i class='bx bx-plus-circle' style="margin-right: 6px;"></i> Cadastrar </h3>
    <div class="cadastros-list">
        <div class="cadastro-item">
            <p>Cadastrar Medicamento</p>
            <a href="/FormsMed" class="cadastrar-link">
                <i class="fas fa-inbox"></i>
            </a>
        </div>
    </div>
</div>

<main>
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
                    <form action="/filtrarMedFarma" method="GET">
                        <div class="mb-3">
                            <label>Forma Farmacêutica</label>
                            <br>
                            @php
                            $formasFarmaceuticas = ['Comprimido', 'Cápsula', 'Pomada', 'Solução', 'Suspensão', 'Creme', 'Gel', 'Injeção'];
                            @endphp
                            @foreach ($formasFarmaceuticas as $forma)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="formaFarmaceutica[]" value="{{ $forma }}" id="forma{{ $forma }}">
                                    <label class="form-check-label" for="forma{{ $forma }}">{{ $forma }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="mb-3">
                            <label for="filtroValidadeInicio">Validade</label>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <label for="filtroValidadeInicio">De:</label>
                                    <input type="date" class="form-control" id="filtroValidadeInicio" name="filtroValidadeInicio">
                                </div>
                                <div>
                                    <label for="filtroValidadeFim">Até:</label>
                                    <input type="date" class="form-control" id="filtroValidadeFim" name="filtroValidadeFim">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="aplicar">Aplicar Filtros</button>
                            <a href="/MedicamentoHome" class="cancelar">Cancelar Filtros</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="custom-table">
        <div class="card-header-1 d-flex justify-content-between align-items-center">
            <h5>Medicamentos</h5>

            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Pesquisar por Nome, Genérico, Código ou Lote" class="form-control">
            </div>
            <!-- Botão de Filtro -->
            <button class="botãoInfo" data-toggle="modal" data-target="#filterModal">
                <i class="fas fa-filter"></i> Filtros
            </button>
        </div>

        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-bordered table-striped mt-3">
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
                            <td class="actions">
                                @if ($med->situacaoMedicamento == 'A')
                                <a href="{{ route('medicamentosFarma.edit', $med->idMedicamento) }}" class="icon-action" title="Editar" style="color: #f7d516;">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('medicamentosFarma.desativar', $med->idMedicamento) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="icon-action-2" title="Desativar" style="color: red;">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                </form>
                                @else
                                <form action="{{ route('medicamentosFarma.ativar', $med->idMedicamento) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="icon-action-2" title="Ativar">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>


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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

@include('includes.footer')
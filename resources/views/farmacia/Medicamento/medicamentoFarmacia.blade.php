<!--CSS OK ASS: GABY-->

@include('includes.headerFarmacia')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/Farmacia-CSS/Medicamento.css')}}">

<nav class="navbar">
    <div class="navbar-brand">
        <img src="{{ asset('Image/3a.png') }}" alt="Logo" class="logo">
    </div>
    <div class="search-container">
        <input type="text" placeholder="Buscar..." class="search-input">
        <button class="search-button"><i class="fas fa-search"></i></button>
    </div>
</nav>


<div class="container-um">
    <div class="jumbotron-um">
        <h1 style="font-weight: bold;">Medicamento</h1>
        <p>Você pode gerenciar o medicamento nessa página.</p>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/medi.png') }}" alt="Cadastro de Medicamentos" class="img-fluid" />
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

<main style="padding-right: 20px;">
    <!-- Modal de Filtros -->
    <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filtros de Medicamentos</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/filtrarMedFarma" method="GET">
                        <!-- Forma Farmacêutica -->
                        <div class="mb-3">
                            <label>Forma Farmacêutica</label>
                            @php
                            $formasFarmaceuticas = ['Comprimido', 'Cápsula', 'Pomada', 'Solução', 'Suspensão', 'Creme', 'Gel', 'Injeção'];
                            @endphp
                            @foreach ($formasFarmaceuticas as $forma)
                            <div class="mb-3">
                                <input class="form-check-input" type="checkbox" name="formaFarmaceutica[]" value="{{ $forma }}" id="forma{{ $forma }}">
                                <label class="form-label" for="forma{{ $forma }}">{{ $forma }}</label>
                            </div>
                            @endforeach
                        </div>

                        <!-- Validade do Medicamento -->
                        <div class="mb-3">
                            <label for="filtroValidadeInicio">Validade</label>
                            <p style="margin-top: 7px;">De:</p>

                            <div>
                                <input type="date" class="form-control" id="filtroValidadeInicio" name="filtroValidadeInicio">
                            </div>
                            <p style="margin-top: 7px;">Até:</p>
                            <div>

                            <input type="date" class="form-control" id="filtroValidadeFim" name="filtroValidadeFim">
                            </div>

                        </div>

                        <!-- Botão de Aplicar Filtros -->
                        <button type="submit" class="btn btn-primary">Aplicar Filtros</button>
                        <a href="/MedicamentoHome" class="btn btn-secondary">Cancelar Filtros</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="custom-table">
        <div class="custom-table">
            <div class="card-header-1">
                <h5>Medicamentos</h5>
                <input type="text" id="searchInput" placeholder="Pesquisar por Nome, Genérico, Código ou Lote" class="form-control" style="margin-top: 10px;margin-left: 600px;">
                <i class='bx bx-filter' data-toggle="modal" data-target="#filterModal"></i>
            </div>

            <table class="table table-bordered table-striped" id="medicamentoTable">
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
</main>

<!-- jQuery e Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script> -->
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
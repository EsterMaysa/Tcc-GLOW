@include('includes.header') 
<link rel="stylesheet" href="{{ url('css/UBS.css')}}">


<nav class="navbar">
    <div class="navbar-brand">
        <img src="{{ asset('Image/2a.png')}}" alt="Logo" class="logo"> 
    </div>
    <div class="search-container">
        <input type="text" placeholder="Buscar..." class="search-input">
        <button class="search-button"><i class="fas fa-search"></i></button>
    </div>
</nav>

<div class="container-um">
    <div class="jumbotron-um">
        <h1>UBS</h1>
        <p>Você pode gerenciar UBS por aqui.</p>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/pacientes.png')}}" alt="Cadastro de Medicamentos" class="img-fluid" />
    </div>
</div>


<div class="tabela">
    <div class="btn-container">
        <div class="btn-card">
            <p>Posto</p>
            <a href="/selectRegiaoForm">
                <button class="btn-acao"><i class="fas fa-plus"></i> Criar</button>
            </a>
        </div>
        <div class="btn-card">
            <p>Região</p>
            <a href="/formRegiao">
                <button class="btn-acao"><i class="fas fa-plus"></i> Criar</button>
            </a>
        </div>
        <div class="btn-card">
            <p>Farmacia</p>
            <a href="/Farmacia">
                <button class="btn-acao"><i class="fas fa-plus"></i> Criar</button>
            </a>
        </div>
        <div class="btn-card">
            <p>Telefone</p>
            <a href="formTelefone">
                <button class="btn-acao"><i class="fas fa-plus"></i> Criar</button>
            </a>
        </div>
    </div>
</div>








<!-- MAIN -->
<main>
    <div class="table-data">
        <div class="order">

            <div class="head">
                <h3>Lista de Unidades Básicas de Saúde (UBS)</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <!-- Campo de pesquisa -->
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Pesquisar por nome ou CNPJ da UBS...">

            </div>


            <table class="ubs-table">
                <thead>
                    <tr>
                        <th>Nome UBS</th>
                        <th>E-mail UBS</th>
                        <th>CNPJ UBS</th>
                        <th>Situação</th>
                        <th>Data Cadastro</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                        <th>Ver Mais</th>

                    </tr>
                </thead>
                @foreach ($ubs as $unidade)

                <tbody id="ubsTableBody">
                    <tr class="ubs-row" data-situacao="{{ $unidade->situacaoUBS }}" style="{{ $unidade->situacaoUBS == 0 ? 'display:none;' : '' }}">
                        <td>{{ $unidade->nomeUBS }}</td>
                        <td>{{ $unidade->emailUBS }}</td>
                        <td>{{ $unidade->cnpjUBS }}</td>
                        <td>{{ $unidade->situacaoUBS }}</td>
                        <td>{{ $unidade->dataCadastroUBS }}</td>


                        <td>
                            <a href="{{ route('ubs.edit', $unidade->idUBS) }}" class="edit-icon">
                                <i class="fas fa-pencil-alt"></i>
                                Editar
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('changeStatus', $unidade->idUBS) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="edit-icon" style="background: none; border: none; color: inherit;">
                                    <i class="fas fa-pencil-alt"></i>
                                    Excluir
                                </button>
                            </form>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetalhes{{ $unidade->idUBS }}">
                                Ver mais
                            </button>
                        </td>


                    </tr>
                    <!-- Modal do ver mais -->
                    <div class="modal fade" id="modalDetalhes{{ $unidade->idUBS }}" tabindex="-1" aria-labelledby="modalUBSLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalUBSLabel">Detalhes da UBS</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <img src="{{ asset('storage/' . $unidade->fotoUBS) }}" alt="Foto UBS" style="max-width: 100%;margin-bottom: 5%;">

                                    <p><strong>Situação UBS:</strong> {{ $unidade->situacaoUBS }}</p>
                                    <p><strong>Nome UBS:</strong> {{ $unidade->nomeUBS }}</p>
                                    <p><strong>E-mail:</strong> {{ $unidade->emailUBS }}</p>
                                    <p><strong>CNPJ:</strong> {{ $unidade->cnpjUBS }}</p>
                                    <p><strong>CEP:</strong> {{ $unidade->cepUBS }}</p>
                                    <p><strong>Endereço:</strong> {{ $unidade->logradouroUBS }}, nº {{ $unidade->numeroUBS }}, {{ $unidade->bairroUBS }}, {{ $unidade->cidadeUBS }} - {{ $unidade->estadoUBS }}</p>
                                    <p><strong>Região de São Paulo:</strong> {{ $unidade->regiao->nomeRegiaoUBS ?? 'N/A' }}</p>
                                    <p><strong>Complemento:</strong> {{ $unidade->complementoUBS }}</p>
                                    <p><strong>Latitude:</strong> {{ $unidade->latitudeUBS }}</p>
                                    <p><strong>Longitude:</strong> {{ $unidade->longitudeUBS }}</p>
                                    <p><strong>Data de Cadastro:</strong> {{ \Carbon\Carbon::parse($unidade->dataCadastroUBS)->format('d/m/Y') }}</p>
                                    <p><strong>Telefone:</strong> {{ $unidade->telefone->numeroTelefoneUBS ?? 'N/A' }}</p>
                                    <p><strong>Telefone 2:</strong> {{ $unidade->telefone->numeroTelefoneUBS2 ?? 'Não Cadastrdo' }}</p>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </tbody>
                @endforeach

            </table>
        </div>
    </div>

    <!-- Modal filtro -->
    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filtros</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Checkboxes para os filtros -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="filterActive" checked>
                        <label class="form-check-label" for="filterActive">Ativos</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="filterInactive">
                        <label class="form-check-label" for="filterInactive">Inativos</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="filterExcluded">
                        <label class="form-check-label" for="filterExcluded">Mostrar Excluídos</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="applyFilters" class="btn btn-primary">Adicionar Filtros</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Função para filtrar a tabela pela barra de pesquisa
    function filterTable() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('#ubsTableBody tr');
        
        rows.forEach(row => {
            const nomeUBS = row.cells[0].textContent.toLowerCase(); // Nome da UBS
            const cnpjUBS = row.cells[2].textContent.toLowerCase(); // CNPJ da UBS
            
            // Verifica se a linha deve ser exibida com base na pesquisa
            const matchesSearch = nomeUBS.includes(searchTerm) || cnpjUBS.includes(searchTerm);
            const situacao = row.getAttribute('data-situacao');
            const isActive = situacao == 1;
            const isInactive = situacao == 0;

            // Verifica se a linha deve ser exibida com base nos filtros
            const showActive = document.getElementById('filterActive').checked;
            const showInactive = document.getElementById('filterInactive').checked;

            const matchesFilter = (showActive && isActive) || (showInactive && isInactive);

            // A linha é visível se corresponder à pesquisa e aos filtros
            if ((matchesSearch && matchesFilter) || (searchTerm === '' && matchesFilter)) {
                row.style.display = 'table-row'; // Mostra a linha se corresponder
            } else {
                row.style.display = 'none'; // Esconde a linha se não corresponder
            }
        });
    }

    // Lógica para aplicar os filtros
    document.getElementById('applyFilters').addEventListener('click', function() {
        // Atualiza a pesquisa após aplicar os filtros
        filterTable(); // Chama a função de filtragem

        // Fecha o modal após aplicar os filtros
        var modal = bootstrap.Modal.getInstance(document.getElementById('filterModal'));
        modal.hide();
    });

    // Adiciona o evento de entrada ao campo de pesquisa
    document.getElementById('searchInput').addEventListener('input', filterTable);
</script>



   

    <!-- Link para o Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@include('includes.footer') <!-- include -->
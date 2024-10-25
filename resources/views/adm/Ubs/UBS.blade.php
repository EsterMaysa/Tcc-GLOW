@include('includes.header') <!-- include -->

<!-- MAIN -->
<main>
    <style>
        .ubs-table {
            width: 100%;
            /* A tabela ocupa 100% da largura disponível */
            border-collapse: collapse;
            /* Remove espaços entre as bordas das células */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            /* Sombra para a tabela */
            border-radius: 8px;
            /* Bordas arredondadas */
            overflow: hidden;
            /* Para garantir que as bordas arredondadas apareçam */
            margin-top: 20px;
            /* Espaço acima da tabela */
        }

        .ubs-table th,
        .ubs-table td {
            padding: 20px;
            /* Aumenta o espaçamento interno (padding) das células */
            text-align: left;
            /* Alinha o conteúdo à esquerda */
            border: 1px solid #ddd;
            /* Borda leve em cada célula */
        }

        .ubs-table th {
            background-color: #f2f2f2;
            /* Cor de fundo para o cabeçalho */
            font-weight: bold;
            /* Deixa o texto do cabeçalho em negrito */
            font-size: 1.1em;
            /* Aumenta o tamanho da fonte do cabeçalho */
        }

        .ubs-row:nth-child(even) {
            background-color: #f9f9f9;
            /* Cor de fundo para linhas pares */
        }

        .ubs-image {
            max-width: 100px;
            /* Define o tamanho máximo das imagens */
            height: auto;
            /* Mantém a proporção da imagem */
            border-radius: 5px;
            /* Bordas arredondadas nas imagens */
        }

        .ubs-row:hover {
            background-color: #e9e9e9;
            /* Cor de fundo ao passar o mouse nas linhas */
        }

        .ubs-table td {
            line-height: 1.5;
            /* Aumenta a altura da linha para melhor legibilidade */
        }

        .search-container {
            margin: 20px 0;
            /* Espaço acima e abaixo do campo de pesquisa */
        }

        .search-container input {
            width: 100%;
            /* Campo de pesquisa ocupa 100% da largura disponível */
            padding: 10px;
            /* Espaçamento interno do campo */
            border: 1px solid #ccc;
            /* Borda do campo */
            border-radius: 5px;
            /* Bordas arredondadas */
            font-size: 16px;
            /* Tamanho da fonte do campo */
        }
    </style>

    <div class="head-title">
        <div class="left">
            <h1> Criar </h1>
            <ul class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="/"> UBS </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="table-data">
        <div class="order">
            <table>
                <thead>
                    <tr>
                        <th>Campo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p>Posto</p>
                        </td>
                        <td>
                            <a href="/selectRegiaoForm">
                                <span class="status busca">Criar</span>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Região</p>
                        </td>
                        <td>
                            <a href="/formRegiao">
                                <span class="status busca"> Criar </span>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Farmacia</p>
                        </td>
                        <td>
                            <a href="/Farmacia"> <!-- Usando a função route -->
                                <span class="status busca"> Criar </span>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Telefone</p>
                        </td>
                        <td>
                            <a href="formTelefone">
                                <span class="status busca"> Criar </span>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <br>
            <div class="head">
                <h3>Lista de Unidades Básicas de Saúde (UBS)</h3>

                <input type="text" id="searchInput" placeholder="Pesquisar por nome ou CNPJ da UBS..." style="width: 500px;">
                <i class='bx bx-filter' data-bs-toggle="modal" data-bs-target="#filterModal"></i>
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



    @include('includes.footer') <!-- include -->

    <!-- Link para o Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
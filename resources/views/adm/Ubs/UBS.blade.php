@include('includes.header') <!-- include -->

<!-- MAIN -->
<main>
    <style>
        .ubs-table {
            width: 100%; /* A tabela ocupa 100% da largura disponível */
            border-collapse: collapse; /* Remove espaços entre as bordas das células */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Sombra para a tabela */
            border-radius: 8px; /* Bordas arredondadas */
            overflow: hidden; /* Para garantir que as bordas arredondadas apareçam */
            margin-top: 20px; /* Espaço acima da tabela */
        }

        .ubs-table th, .ubs-table td {
            padding: 20px; /* Aumenta o espaçamento interno (padding) das células */
            text-align: left; /* Alinha o conteúdo à esquerda */
            border: 1px solid #ddd; /* Borda leve em cada célula */
        }

        .ubs-table th {
            background-color: #f2f2f2; /* Cor de fundo para o cabeçalho */
            font-weight: bold; /* Deixa o texto do cabeçalho em negrito */
            font-size: 1.1em; /* Aumenta o tamanho da fonte do cabeçalho */
        }

        .ubs-row:nth-child(even) {
            background-color: #f9f9f9; /* Cor de fundo para linhas pares */
        }

        .ubs-image {
            max-width: 100px; /* Define o tamanho máximo das imagens */
            height: auto; /* Mantém a proporção da imagem */
            border-radius: 5px; /* Bordas arredondadas nas imagens */
        }

        .ubs-row:hover {
            background-color: #e9e9e9; /* Cor de fundo ao passar o mouse nas linhas */
        }

        .ubs-table td {
            line-height: 1.5; /* Aumenta a altura da linha para melhor legibilidade */
        }

        .search-container {
            margin: 20px 0; /* Espaço acima e abaixo do campo de pesquisa */
        }

        .search-container input {
            width: 100%; /* Campo de pesquisa ocupa 100% da largura disponível */
            padding: 10px; /* Espaçamento interno do campo */
            border: 1px solid #ccc; /* Borda do campo */
            border-radius: 5px; /* Bordas arredondadas */
            font-size: 16px; /* Tamanho da fonte do campo */
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
            <div class="head">
                <h3> Criar Campos</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
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
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>

            <!-- Campo de pesquisa -->
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Pesquisar por nome ou CNPJ da UBS...">
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Criar Campos</th>
                        <button id="showExcluded" class="btn-excluir">Mostrar Excluídos</button> <!-- Botão para mostrar excluídos -->
                        <button id="showZeroSituacao" class="btn-excluir">Inativo</button> <!-- Novo botão -->
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </tr>
                </thead>
            </table>
            <table class="ubs-table">
                <thead>
                    <tr>
                        <th>ID UBS</th>
                        <th>Nome UBS</th>
                        <th>E-mail UBS</th>
                        <th>Foto UBS</th>
                        <th>CNPJ UBS</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>CEP</th>
                        <th>Logradouro</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Número</th>
                        <th>UF</th>
                        <th>Complemento</th>
                        <th>Situação</th>
                        <th>Data Cadastro</th>
                        <th>ID Telefone</th>
                        <th>ID Região</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody id="ubsTableBody">
                    @foreach ($ubs as $unidade)
                        <tr class="ubs-row" data-situacao="{{ $unidade->situacaoUBS }}" style="{{ $unidade->situacaoUBS == 0 ? 'display:none;' : '' }}">
                            <td>{{ $unidade->idUBS }}</td>
                            <td>{{ $unidade->nomeUBS }}</td>
                            <td>{{ $unidade->emailUBS }}</td>
                            <td><img class="ubs-image" src="{{ $unidade->fotoUBS }}" alt="Foto UBS"></td>
                            <td>{{ $unidade->cnpjUBS }}</td>
                            <td>{{ $unidade->latitudeUBS }}</td>
                            <td>{{ $unidade->longitudeUBS }}</td>
                            <td>{{ $unidade->cepUBS }}</td>
                            <td>{{ $unidade->logradouroUBS }}</td>
                            <td>{{ $unidade->bairroUBS }}</td>
                            <td>{{ $unidade->cidadeUBS }}</td>
                            <td>{{ $unidade->estadoUBS }}</td>
                            <td>{{ $unidade->numeroUBS }}</td>
                            <td>{{ $unidade->ufUBS }}</td>
                            <td>{{ $unidade->complementoUBS }}</td>
                            <td>{{ $unidade->situacaoUBS }}</td>
                            <td>{{ $unidade->dataCadastroUBS }}</td>
                            <td>{{ $unidade->idTelefoneUBS }}</td>
                            <td>{{ $unidade->idRegiaoUBS }}</td>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('showExcluded').addEventListener('click', function() {
            // Toggle para mostrar/esconder a tabela de excluídos
            const excludedRows = document.querySelectorAll('.ubs-row[data-situacao="0"]');
            excludedRows.forEach(row => {
                row.style.display = (row.style.display === 'none' || row.style.display === '') ? 'table-row' : 'none';
            });
        });

        document.getElementById('showZeroSituacao').addEventListener('click', function() {
            // Verifica se o botão está ativo ou inativo
            const isActive = this.textContent === 'Ativos';
            const ubsRows = document.querySelectorAll('.ubs-row');

            ubsRows.forEach(row => {
                const situacao = row.getAttribute('data-situacao');
                if (isActive && situacao == 0) {
                    row.style.display = 'none'; // Esconde os inativos
                } else {
                    row.style.display = 'table-row'; // Mostra todos
                }
            });

            // Troca o texto do botão
            this.textContent = isActive ? 'Inativos' : 'Ativos';
        });

        // Função para filtrar a tabela pela barra de pesquisa
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('#ubsTableBody tr');

            rows.forEach(row => {
                const nomeUBS = row.cells[1].textContent.toLowerCase();
                const cnpjUBS = row.cells[3].textContent.toLowerCase();
                row.style.display = nomeUBS.includes(searchTerm) || cnpjUBS.includes(searchTerm) ? '' : 'none';
            });
        });
    </script>

    @include('includes.footer') <!-- include -->
</main>

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

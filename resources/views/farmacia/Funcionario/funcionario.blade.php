@include('includes.headerFarmacia')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/Farmacia-CSS/Funcionario.css')}}">

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
        <h1 style="font-weight: bold;">Funcionário</h1>
        <p>Você pode gerenciar os funcionários nessa página.</p>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/estoque.png') }}" alt="Cadastro de Medicamentos" class="img-fluid" />
    </div>
</div>

<div class="cadastros-container">
    <h3><i class='bx bx-plus-circle' style="margin-right: 6px;"></i> Acessar </h3>
    <div class="cadastros-list">
        <div class="cadastro-item">
            <p>Cadastro do Funcionário</p>
            <a href="/formFuncionario" class="cadastrar-link">
                <i class="fas fa-inbox"></i> 
            </a>
        </div>
    </div>
</div>
<!-- ESTÁ PAGINA É AGORA DO FUNCIONARIO MUDE OS CAMPOS CONFORME A TABELA (ANTIGA PAGINA DO CLIENTE) -->

<!-- Main content -->

<!-- Contêiner para os Botões de Filtro e a Barra de Pesquisa -->
<div class="filter-search-container">
    <!-- Botões de Filtro -->
    <div class="filter-buttons">
        <button class="filter-btn" onclick="filterByStatus('A')">Ativos</button>
        <button class="filter-btn" onclick="filterByStatus('I')">Inativos</button>
        <button class="filter-btn" onclick="resetFilter()">Todos</button>
    </div>

    <!-- Barra de Pesquisa -->
    <div class="search-bar">
        <input type="text" id="searchInput" placeholder="Digite o nome ou CPF do funcionário" onkeyup="filterTable()">
    </div>
</div>


<!-- Tabela de Funcionários -->
<table id="funcionarioTable">
    <thead>
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Cargo</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($funcionarios as $funcionario)
            <tr data-status="{{ $funcionario->situacaoFuncionario }}">
                <td>{{ $funcionario->nomeFuncionario }}</td>
                <td>{{ $funcionario->cpfFuncionario }}</td>
                <td>{{ $funcionario->cargoFuncionario }}</td>

                <td class="text-center">
                    <a href="{{ route('funcionario.edit', $funcionario->idFuncionario) }}" class="btn btn-primary btn-acao">
                        <i class="fas fa-edit"></i> Editar
                    </a>

                    <form action="{{ route('funcionario.destroy', $funcionario->idFuncionario) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-acao" onclick="return confirm('Tem certeza que deseja excluir este funcionário?');">
                            <i class="fas fa-trash-alt"></i> Excluir
                        </button>
                    </form>
                </td>



            </tr>
        @endforeach
    </tbody>
</table>


    <!-- Formulário para criar um cliente e seu telefone -->
    <div class="form-wrapper">
        <!-- Aqui pode ir seu formulário, se necessário -->
    </div>
</div>

<script>
    function filterTable() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toLowerCase();
        const table = document.getElementById('funcionarioTable');
        const tr = table.getElementsByTagName('tr');

        for (let i = 1; i < tr.length; i++) { // Começa em 1 para pular o cabeçalho
            const tdNome = tr[i].getElementsByTagName('td')[0];
            const tdCpf = tr[i].getElementsByTagName('td')[1];
            if (tdNome || tdCpf) {
                const txtValueNome = tdNome.textContent || tdNome.innerText;
                const txtValueCpf = tdCpf.textContent || tdCpf.innerText;
                if (txtValueNome.toLowerCase().indexOf(filter) > -1 || txtValueCpf.toLowerCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function filterByStatus(status) {
        const table = document.getElementById('funcionarioTable');
        const tr = table.getElementsByTagName('tr');

        for (let i = 1; i < tr.length; i++) {
            const rowStatus = tr[i].getAttribute('data-status');
            if (rowStatus == status) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }

        // Limpa a barra de pesquisa ao filtrar por status
        document.getElementById('searchInput').value = '';
    }

    function resetFilter() {
        const table = document.getElementById('funcionarioTable');
        const tr = table.getElementsByTagName('tr');

        for (let i = 1; i < tr.length; i++) {
            tr[i].style.display = ""; // Mostra todas as linhas
        }

        // Limpa a barra de pesquisa ao resetar o filtro
        document.getElementById('searchInput').value = '';
    }
</script>

@include('includes.footer')

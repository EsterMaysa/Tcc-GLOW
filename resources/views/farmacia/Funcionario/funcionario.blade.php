@include('includes.headerFarmacia')

<!-- ESTÁ PAGINA É AGORA DO FUNCIONARIO MUDE OS CAMPOS CONFORME A TABELA (ANTIGA PAGINA DO CLIENTE) -->

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 20px;
    }

    .main-content {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .page-title {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
    }

    .btn-acao {
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 15px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        margin: 10px 0;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-acao:hover {
        background-color: #0056b3;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table, th, td {
        border: 1px solid #dee2e6;
    }

    th, td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #007bff;
        color: white;
    }

    td {
        background-color: #f9f9f9;
    }

    tr:hover td {
        background-color: #e9ecef;
    }

    .form-wrapper {
        margin-top: 30px;
    }

    /* Estilos para a barra de pesquisa */
    .search-bar {
        margin-bottom: 20px;
    }

    .search-bar input {
        padding: 10px;
        width: 100%;
        border: 1px solid #ced4da;
        border-radius: 5px;
        font-size: 16px;
    }

    /* Estilos para os botões de filtro */
    .filter-btn {
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 15px;
        margin-right: 10px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .filter-btn:hover {
        background-color: #0056b3;
    }
</style>

<!-- Main content -->
<div class="col-md-9 col-lg-10 main-content">
    <h1 class="page-title">Cadastro do Funcionário</h1>

    <p>Cadastrar Funcionário</p>
    <a href="/formFuncionario">
        <button class="btn-acao"><i class="fas fa-plus"></i> Cadastrar Funcionário</button>
    </a>

    <!-- Botões de filtro -->
    <div class="filter-buttons" style="margin-bottom: 20px;">
        <button class="filter-btn" onclick="filterByStatus(1)">Ativos</button>
        <button class="filter-btn" onclick="filterByStatus(0)">Inativos</button>
        <button class="filter-btn" onclick="resetFilter()">Todos</button>
    </div>

    <!-- Barra de Pesquisa -->
    <div class="search-bar">
        <input type="text" id="searchInput" placeholder="Digite o nome ou CPF do funcionário" onkeyup="filterTable()">
    </div>

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
                    <td>
                        <a href="{{ route('funcionario.edit', $funcionario->idFuncionario) }}" class="btn-acao"><i class="fas fa-edit"></i> Editar</a>
                        <form action="{{ route('funcionario.destroy', $funcionario->idFuncionario) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn-acao" onclick="return confirm('Tem certeza que deseja excluir este funcionário?');"><i class="fas fa-trash-alt"></i> Excluir</button>
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

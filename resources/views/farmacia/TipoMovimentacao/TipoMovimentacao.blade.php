@include('includes.headerFarmacia')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Adiciona Font Awesome -->
<link rel="stylesheet" href="{{asset('css/Farmacia-CSS/TipoMovimentacao.css')}}">

<nav class="navbar">
    <div class="navbar-brand">
        <img src="{{ asset('Image/3a.png') }}" alt="Logo" class="logo">
    </div>
    <div class="search-container">
        <input type="text" placeholder="Buscar..." class="search-input" id="searchInput" onkeyup="filterTable()">
        <button class="search-button"><i class="fas fa-search"></i></button>
    </div>
</nav>

<div class="container-um">
    <div class="jumbotron-um">
        <h1 style="font-weight: bold;">Tipo de Movimentação</h1>
        <p>Gerencie os tipos de movimentações nesta página.</p>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/estoque.png') }}" alt="Movimentações" class="img-fluid" />
    </div>
</div>

<div class="cadastros-container">
    <h3><i class='bx bx-plus-circle' style="margin-right: 6px;"></i> Acessar </h3>
    <div class="cadastros-list">
        <div class="cadastro-item">
            <p>Cadastrar Tipo de Movimentação</p>
            <a href="/formTipoMovimentacao" class="cadastrar-link">
                <i class="fas fa-inbox"></i> 
            </a>
        </div>
    </div>
</div>

<div class="filter-search-container">
    <div class="filter-buttons">
        <button class="filter-btn" onclick="filterByStatus('1')">Ativos</button>
        <button class="filter-btn" onclick="filterByStatus('0')">Inativos</button>
        <button class="filter-btn" onclick="resetFilter()">Todos</button>
    </div>
</div>

<table id="tabelaMovimentacoes" class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Movimentação</th>
            <th>Situação</th>
            <th>Data de Cadastro</th>
            <th>ID Prescrição</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($movimentacoes as $movimentacao)
            <tr data-status="{{ $movimentacao->situacaoTipoMovimentacao }}">
                <td>{{ $movimentacao->idTipoMovimentacao }}</td>
                <td>{{ $movimentacao->movimentacao }}</td>
                <td>
                    <span class="badge {{ $movimentacao->situacaoTipoMovimentacao == 1 ? 'bg-success' : 'bg-warning' }}">
                        {{ $movimentacao->situacaoTipoMovimentacao == 1 ? 'Ativo' : 'Inativo' }}
                    </span>
                </td>
                <td>{{ \Carbon\Carbon::parse($movimentacao->dataCadastroTipoMovimentacao)->format('d/m/Y') }}</td>
                <td>{{ $movimentacao->idPrescricao }}</td>
                <td class="text-center">
                    <a href="{{ route('editarTipoMovimentacao', $movimentacao->idTipoMovimentacao) }}" class="btn btn-primary btn-acao">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <form action="{{ route('excluirTipoMovimentacao', $movimentacao->idTipoMovimentacao) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-acao" onclick="return confirm('Tem certeza que deseja excluir este item?')">
                            <i class="fas fa-trash-alt"></i> Excluir
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    function filterTable() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('#tabelaMovimentacoes tbody tr');

        rows.forEach(row => {
            const movimentacao = row.cells[1].textContent.toLowerCase();
            row.style.display = movimentacao.includes(input) ? '' : 'none';
        });
    }

    function filterByStatus(status) {
        const rows = document.querySelectorAll('#tabelaMovimentacoes tbody tr');

        rows.forEach(row => {
            const rowStatus = row.getAttribute('data-status');
            row.style.display = (status === '' || rowStatus === status) ? '' : 'none';
        });

        document.getElementById('searchInput').value = '';
    }

    function resetFilter() {
        const rows = document.querySelectorAll('#tabelaMovimentacoes tbody tr');

        rows.forEach(row => {
            row.style.display = '';
        });

        document.getElementById('searchInput').value = '';
    }
</script>

@include('includes.footer')

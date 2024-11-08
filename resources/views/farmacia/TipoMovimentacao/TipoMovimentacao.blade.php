@include('includes.headerFarmacia')

<!-- Main content -->
<div class="col-md-9 col-lg-10 main-content">
    <div class="head-title d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Tipo Movimentação</h1>
        <a href="formTipoMovimentacao" target="_blank" class="btn btn-success">Cadastrar Tipo de Movimentação</a>
    </div>

    <!-- Filtro de Situação -->
    <div class="mb-3">
        <button class="btn btn-info" onclick="filtrarMovimentacoes(1)">Ativos</button>
        <button class="btn btn-warning" onclick="filtrarMovimentacoes(0)">Inativos</button>
        <button class="btn btn-secondary" onclick="filtrarMovimentacoes()">Todos</button>
    </div>

    <!-- Tabela de Movimentações -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tabelaMovimentacoes">
            <thead class="thead-dark">
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
                    <tr class="movimentacao-row" data-situacao="{{ $movimentacao->situacaoTipoMovimentacao }}">
                        <td>{{ $movimentacao->idTipoMovimentacao }}</td>
                        <td>{{ $movimentacao->movimentacao }}</td>
                        <td>
                            <span class="badge {{ $movimentacao->situacaoTipoMovimentacao == 1 ? 'badge-success' : 'badge-warning' }}">
                                {{ $movimentacao->situacaoTipoMovimentacao == 1 ? 'Ativo' : 'Inativo' }}
                            </span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($movimentacao->dataCadastroTipoMovimentacao)->format('d/m/Y') }}</td>
                        <td>{{ $movimentacao->idPrescricao }}</td>
                        <td class="text-center">
                            <a href="{{ route('editarTipoMovimentacao', $movimentacao->idTipoMovimentacao) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('excluirTipoMovimentacao', $movimentacao->idTipoMovimentacao) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este item?')">
                                    <i class="fas fa-trash-alt"></i> Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('includes.footer')

<!-- Adicionando Font Awesome para ícones -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<!-- Estilos adicionais -->
<style>
    .main-content {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 8px;
    }
    .head-title h1 {
        font-size: 32px;
        font-weight: bold;
    }
    .btn {
        font-size: 14px;
        padding: 8px 12px;
        border-radius: 4px;
        font-weight: bold;
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .table th {
        background-color: #343a40;
        color: white;
    }
    .table td {
        text-align: center;
    }
</style>

<!-- Script para filtro -->
<script>
    function filtrarMovimentacoes(situacao = '') {
        const rows = document.querySelectorAll('.movimentacao-row');
        
        rows.forEach(row => {
            const rowSituacao = row.getAttribute('data-situacao');
            
            if (situacao === '' || rowSituacao == situacao) {
                row.style.display = ''; // Mostra a linha
            } else {
                row.style.display = 'none'; // Esconde a linha
            }
        });
    }
</script>

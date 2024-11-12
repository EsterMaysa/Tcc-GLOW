@include('includes.headerFarmacia')
<div class="col-md-9 col-lg-10 main-content">
    <div class="head-title">
        <div class="left">
            <h1>Entrada do Medicamento</h1>
        </div>
        <div class="right">
            <a href="{{ route('entradaMedInsert') }}" class="btn btn-primary">+ Entrada de Medicamento</a>
        </div>
    </div>

    <!-- Campo de Pesquisa -->
    <input type="text" id="searchInput" class="form-control" placeholder="Pesquisar por Nome, Lote, Funcionário ou Motivo" style="margin-top: 10px;">

    <!-- Tabela de Entradas de Medicamentos -->
    <div class="container mt-4">
        <table class="table table-bordered table-striped" id="medicamentoTable"> <!-- Adicionando o ID aqui -->
            <thead>
                <tr>
                    <th>Nome do Medicamento</th>
                    <th>Data de Entrada</th>
                    <th>Quantidade</th>
                    <th>Lote</th>
                    <th>Validade</th>
                    <th>Motivo da Entrada</th>
                    <th>Funcionário Responsável</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($medicamentos as $med)
                    <tr>
                        <!-- <td>{{ $med->idEntradaMedicamento }}</td> -->
                        <td>{{ $med->nomeMedicamento }}</td>
                        <td>{{ $med->dataEntrada }}</td>
                        <td>{{ $med->quantidade }}</td>
                        <td>{{ $med->lote }}</td>
                        <td>{{ $med->validade }}</td>
                        <td>{{ $med->motivoEntrada }}</td>
                        <td>{{ $med->nomeFuncionario }}</td>
                        <td>
                            <a href="{{ route('entradaMedEdit', $med->idEntradaMedicamento) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('entradaMedDelete', $med->idEntradaMedicamento) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">
                                    <i class="fas fa-trash"></i>
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

<!-- Estilos para a tabela -->
<style>
    .table {
        margin: 20px 0;
        width: 100%;
        background-color: #14213D;
        color: #fff;
    }
    .table thead {
        background-color: #57b8ff;
    }
    .table tbody tr:hover {
        background-color: #4b89f5;
    }
    .btn-primary i, .btn-danger i {
        margin-right: 0;
    }
</style>

<!-- Script para o filtro -->
<script>
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

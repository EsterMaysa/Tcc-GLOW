<!--CSS OK(ASS:Duda)-->

@include('includes.headerFarmacia')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/Farmacia-CSS/EntradaMedicamento.css')}}">

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
        <h1 style="font-weight: bold;"> Entrada De Medicamentos </h1>
        <p>gerencie a entrada de medicamentos.</p>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/medi.png') }}" alt="Cadastro de Medicamentos" class="img-fluid" />
    </div>
</div>

<div class="cadastros-container">
    <h3><i class='bx bx-plus-circle' style="margin-right: 6px;"></i> Acessar </h3>
    <div class="cadastros-list">
        <div class="cadastro-item">
            <p>Entrada Medicamento</p>
            <a href="{{ route('entradaMedInsert') }}" class="cadastrar-link">
                <i class="fas fa-inbox"></i> 
            </a>
        </div>
    </div>
</div>

<main>
    <div class="pesquisa">
        <p class="titulo-pesquisa">Buscar registros</p>
        <input type="text" id="searchInput" class="form-control" placeholder="Pesquisar por Nome, Lote, Funcionário ou Motivo">
    </div>

    <div class="container">
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
</main>
@include('includes.footer')

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
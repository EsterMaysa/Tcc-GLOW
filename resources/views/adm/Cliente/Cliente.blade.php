@include('includes.header')
<link rel="stylesheet" href="{{ url('css/Paciente.css')}}"> <!--CSS DESSA PÁGINA É SOMENTE ESSE-->

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
        <h1>Pacientes</h1>
        <p>Você pode gerenciar medicamentos, detentores e consultar a tabela de medicamentos.</p>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/pacientes.png')}}" alt="Cadastro de Medicamentos" class="img-fluid" />
    </div>
</div>

<div class="cadastros-container">
    <h3><i class='bx bx-plus-circle' style="margin-right: 6px;"></i> Cadastrar</h3>
    <div class="cadastros-list">
        <div class="cadastro-item">
            <p>Cadastrar Paciente</p> 
            <a href="criarCliente" class="cadastrar-link">
                <i class="fas fa-plus"></i> <!-- Ícone de adição -->
                <span class="status-busca"> Cadastrar </span>
            </a>
        </div>
    </div>
</div>

<!-- MAIN -->
<main>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Campos</h3>
                <!-- Formulário de Pesquisa -->
                <form action="{{ route('cliente.filtros') }}" method="GET">
                    <div class="search-container2">
                        <h5>Pesquisar paciente</h5>
                        <input type="text" name="query" placeholder="Nome, CPF, CNS ou UF" aria-label="Pesquisar Pacientes" aria-describedby="button-search" value="{{ request('query') }}" class="search-input2">
                        <button class="search-button2" type="submit" id="button-search"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>

            <!-- Tabela de clientes -->
            <div class="form-wrapper">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>CNS</th>
                            <th>Data de Nascimento</th>
                            <th>Usuário</th>
                            <th>Telefone</th>
                            <th>CEP</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($clientes) && count($clientes) > 0)
                            @foreach($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nomeCliente }}</td>
                                <td>{{ $cliente->cpfCliente }}</td>
                                <td>{{ $cliente->cnsCliente }}</td>
                                <td>{{ $cliente->dataNascCliente }}</td>
                                <td>{{ $cliente->userCliente }}</td>
                                <td>{{ $cliente->idTelefoneCliente }}</td>
                                <td>{{ $cliente->cepCliente }}</td>
                                <td>
                                    <div class="action-icons">
                                        <a href="{{ route('cliente.edit', $cliente->idCliente) }}" class="icon-action" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0);" onclick="openDetailsModal({{ json_encode($cliente) }})" class="icon-action" title="Ver Mais">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{ route('deletarCliente', $cliente->idCliente) }}" method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="icon-action" title="Deletar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="14">Nenhum Paciente encontrado.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Overlay para desfoque -->
            <div id="overlay" class="overlay" style="display: none;"></div>
        </div>
    </div>

    <!-- Modal de Filtros -->
    <div id="filterModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Filtrar Clientes</h2>
            <form method="GET" action="{{ route('cliente.filtros') }}">
                <label for="nomeCliente">Nome:</label>
                <input type="text" id="nomeCliente" name="nomeCliente">

                <label for="cpfCliente">CPF:</label>
                <input type="text" id="cpfCliente" name="cpfCliente">

                <label for="cnsCliente">CNS:</label>
                <input type="text" id="cnsCliente" name="cnsCliente">

                <label for="cidadeCliente">Cidade:</label>
                <input type="text" id="cidadeCliente" name="cidadeCliente">

                <label for="ufCliente">UF:</label>
                <select id="ufCliente" name="ufCliente">
                    <!-- Opções de UF -->
                    <!-- Add the states here -->
                </select>

                <button type="submit" class="btn btn-primary">Aplicar Filtro</button>
                <a href="{{ route('cliente.index') }}" class="btn btn-secondary">Cancelar Filtro</a>
            </form>
        </div>
    </div>

    <!-- Modal de Detalhes -->
    <div id="detailsModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeDetailsModal()">&times;</span>
            <h2>Detalhes do Cliente</h2>
            <div id="detailsContent">
                <p><strong>Nome:</strong> <span id="detailNome"></span></p>
                <p><strong>CPF:</strong> <span id="detailCpf"></span></p>
                <p><strong>CNS:</strong> <span id="detailCns"></span></p>
                <p><strong>Data de Nascimento:</strong> <span id="detailDataNasc"></span></p>
                <p><strong>Usuário:</strong> <span id="detailUsuario"></span></p>
                <p><strong>Telefone:</strong> <span id="detailTelefone"></span></p>
                <p><strong>CEP:</strong> <span id="detailCep"></span></p>
                <p><strong>Logradouro:</strong> <span id="detailLogradouro"></span></p>
                <p><strong>Bairro:</strong> <span id="detailBairro"></span></p>
                <p><strong>Número:</strong> <span id="detailNumero"></span></p>
                <p><strong>UF:</strong> <span id="detailUf"></span></p>
                <p><strong>Cidade:</strong> <span id="detailCidade"></span></p>
            </div>
        </div>
    </div>
</main>

@include('includes.footer')

<script>
// Função para abrir o modal de filtros
function openModal() {
    var modal = document.getElementById("filterModal");
    modal.style.display = "block";
}

// Função para fechar o modal de filtros
function closeModal() {
    var modal = document.getElementById("filterModal");
    modal.style.display = "none";
}

// Função para abrir o modal de detalhes
function openDetailsModal(cliente) {
    var modal = document.getElementById("detailsModal");
    
    // Preenche os detalhes do cliente no modal
    document.getElementById("detailNome").textContent = cliente.nomeCliente;
    document.getElementById("detailCpf").textContent = cliente.cpfCliente;
    document.getElementById("detailCns").textContent = cliente.cnsCliente;
    document.getElementById("detailDataNasc").textContent = cliente.dataNascCliente;
    document.getElementById("detailUsuario").textContent = cliente.userCliente;
    document.getElementById("detailTelefone").textContent = cliente.idTelefoneCliente;
    document.getElementById("detailCep").textContent = cliente.cepCliente;
    document.getElementById("detailLogradouro").textContent = cliente.logradouroCliente;
    document.getElementById("detailBairro").textContent = cliente.bairroCliente;
    document.getElementById("detailNumero").textContent = cliente.numeroCliente;
    document.getElementById("detailUf").textContent = cliente.ufCliente;
    document.getElementById("detailCidade").textContent = cliente.cidadeCliente;

    modal.style.display = "block";
}

// Função para fechar o modal de detalhes
function closeDetailsModal() {
    var modal = document.getElementById("detailsModal");
    modal.style.display = "none";
}

// Fecha o modal se o usuário clicar fora dele
window.onclick = function(event) {
    var modal = document.getElementById("filterModal");
    if (event.target === modal) {
        closeModal();
    }
}
</script>

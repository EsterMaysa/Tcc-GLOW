@include('includes.header') <!-- include -->

<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Paciente</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="/cliente">Home</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="/cliente">Paciente</a>
                </li>
            </ul>
        </div>
        <!-- Botão de cadastro com novo design -->
        <div>
            <td>
                <a href="criarCliente">
                    <span class="status busca cadastro-btn">Cadastrar Paciente</span>
                </a>
            </td>
        </div>
    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Campos</h3>

                <!-- Formulário de Pesquisa -->
                <form action="{{ route('cliente.filtros') }}" method="GET">
                    <div class="input-group mb-3">
                        <h5>Pesquisar paciente</h5>
                        <input type="text" name="query" class="form-control" placeholder="Nome, CPF, CNS ou UF" aria-label="Pesquisar Pacientes" aria-describedby="button-search" value="{{ request('query') }}">
                        <button class="btn btn-primary" type="submit" id="button-search">🔍</button>
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
                                    <a href="{{ route('cliente.edit', $cliente->idCliente) }}" class="btn btn-primary btn-sm" title="Editar">
                                        ✏️
                                    </a>
                                    <button onclick="openDetailsModal({{ json_encode($cliente) }})" class="btn btn-info btn-sm" title="Ver Mais">
                                        👁️
                                    </button>
                                    <form action="{{ route('deletarCliente', $cliente->idCliente) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Deletar">
                                            🗑️
                                        </button>
                                    </form>
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

            <!-- Modal de Detalhes -->
            <div id="detailsModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeDetailsModal()">&times;</span>
                    <h2>Detalhes do Paciente</h2>
                    <div id="detailsContent">
                        <!-- <p><strong>ID:</strong> <span id="detailId"></span></p> -->
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
        </div>
    </div>

</main>

@include('includes.footer') <!-- include -->

<!-- Estilos CSS para a tabela e barra de pesquisa -->
<style>
    /* Estilos gerais */
    main {
        padding: 20px;
    }

    .head-title {
        margin-bottom: 40px;
        text-align: center;
    }

    /* Estilo da barra de pesquisa */
    .search-bar {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .search-bar input {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 300px;
    }

    .search-bar button {
        background-color: transparent;
        border: none;
        cursor: pointer;
        font-size: 18px;
    }

    .search-bar button i {
        color: #0056b3;
    }

    /* Estilo do botão de cadastro */
    .cadastro-btn {
        background-color: #14213D;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        text-align: center;
    }

    .cadastro-btn:hover {
        background-color: #0056b3;
    }

    /* Estilo da tabela */
    .table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f1f1f1;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    /* Estilos do Modal */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 40%; /* Could be more or less, depending on screen size */
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red; /* Muda a cor para vermelho ao passar o mouse */
    text-decoration: none;
    cursor: pointer;
}

/* Efeito de desfoque */
.blurred {
    position: fixed; /* Fica fixo no fundo */
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5); /* Fundo escuro */
    filter: blur(4px); /* Aplica o efeito de desfoque */
    z-index: 1; /* Fica abaixo do modal */
}
/* Estilo do Overlay */
.overlay {
    position: fixed; /* Fica fixo no fundo */
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5); /* Fundo escuro com transparência */
    z-index: 1; /* Fica abaixo do modal */
    backdrop-filter: blur(5px); /* Aplica o desfoque ao fundo */
    display: none; /* Escondido por padrão */
}


</style>

<script>
function openDetailsModal(cliente) {
    // Preenche os detalhes do cliente no modal
    document.getElementById('detailNome').innerText = cliente.nomeCliente;
    document.getElementById('detailCpf').innerText = cliente.cpfCliente;
    document.getElementById('detailCns').innerText = cliente.cnsCliente;
    document.getElementById('detailDataNasc').innerText = cliente.dataNascCliente;
    document.getElementById('detailUsuario').innerText = cliente.userCliente;
    document.getElementById('detailTelefone').innerText = cliente.idTelefoneCliente; // Ajuste se necessário
    document.getElementById('detailCep').innerText = cliente.cepCliente;
    document.getElementById('detailLogradouro').innerText = cliente.logradouroCliente; // Ajuste se necessário
    document.getElementById('detailBairro').innerText = cliente.bairroCliente; // Ajuste se necessário
    document.getElementById('detailNumero').innerText = cliente.numeroCliente; // Ajuste se necessário
    document.getElementById('detailUf').innerText = cliente.ufCliente; // Ajuste se necessário
    document.getElementById('detailCidade').innerText = cliente.cidadeCliente; // Ajuste se necessário

    // Mostra o fundo desfocado e o modal
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('detailsModal').style.display = 'block';
}

// Fecha o modal e restaura o foco quando o usuário clica fora dele
window.onclick = function(event) {
    var modalDetails = document.getElementById("detailsModal");
    var overlay = document.getElementById("overlay");

    // Verifica se o clique foi fora do modal ou do overlay
    if (event.target === modalDetails || event.target === overlay) {
        closeDetailsModal(); // Chama a função para fechar o modal
    }
}

function closeDetailsModal() {
    document.getElementById("detailsModal").style.display = "none";
    document.getElementById("overlay").style.display = "none"; // Oculta o fundo desfocado
}

</script>

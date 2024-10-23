@include('includes.header') <!-- include -->

<!-- MAIN -->
<!-- ta feio a parte da barra de pesquisa perdao duda -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Cliente</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="/cliente">Home</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="/cliente">Cliente</a>
                </li>
            </ul>
        </div>
        <!-- Botão de cadastro com novo design -->
        <div>
            <td>
                <a href="criarCliente">
                    <span class="status busca cadastro-btn">Cadastrar Cliente</span>
                </a>
            </td>
        </div>
    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3> Campos</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter' onclick="openModal()"></i> <!-- Ícone de filtro abre modal -->
            </div>
        </div>
    </div>

    <!-- Tabela de clientes -->
    <div class="form-wrapper">
        <table class="table table-striped">
            <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>CNS</th>
                    <th>Data de Nascimento</th>
                    <th>Usuário</th>
                    <th>Telefone</th>
                    <th>CEP</th>
                    <!-- <th>Logradouro</th>
                    <th>Bairro</th>
                    <th>Número</th>
                    <th>UF</th>
                    <th>Cidade</th> -->
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($clientes) && count($clientes) > 0)
                    @foreach($clientes as $cliente)
                    <tr>
                        <!-- <td>{{ $cliente->idCliente }}</td> -->
                        <td>{{ $cliente->nomeCliente }}</td>
                        <td>{{ $cliente->cpfCliente }}</td>
                        <td>{{ $cliente->cnsCliente }}</td>
                        <td>{{ $cliente->dataNascCliente }}</td>
                        <td>{{ $cliente->userCliente }}</td>
                        <td>{{ $cliente->idTelefoneCliente }}</td>
                        <td>{{ $cliente->cepCliente }}</td>
                        <!-- <td>{{ $cliente->logradouroCliente }}</td>
                        <td>{{ $cliente->bairroCliente }}</td>
                        <td>{{ $cliente->numeroCliente }}</td>
                        <td>{{ $cliente->ufCliente }}</td>
                        <td>{{ $cliente->cidadeCliente }}</td> -->
                        <td>
                            <a href="{{ route('cliente.edit', $cliente->idCliente) }}" class="btn btn-primary btn-sm" title="Editar">
                                ✏️ <!-- Símbolo de lápis para editar -->
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
                        <td colspan="14">Nenhum cliente encontrado.</td>
                    </tr>
                @endif
            </tbody>
        </table>
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
                    <option value="">Selecione</option>
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AP">AP</option>
                    <option value="AM">AM</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MT">MT</option>
                    <option value="MS">MS</option>
                    <option value="MG">MG</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PR">PR</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RS">RS</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SP">SP</option>
                    <option value="SE">SE</option>
                    <option value="TO">TO</option>
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
			<p><strong>Numero:</strong> <span id="detailnumero"></span></p>
			<p><strong>Uf:</strong> <span id="detailUf"></span></p>
			<p><strong>Cidade:</strong> <span id="detailCidade"></span></p>
        </div>
    </div>
</div>


</main>
<!-- CONTENT -->
@include('includes.footer') <!-- include -->

<!-- Estilos CSS para a tabela e modal -->
<style>
    /* Estilos gerais */
    main {
        padding: 20px;
    }

    .head-title {
        margin-bottom: 40px;
        text-align: center;
    }

    /* Estilo do container da tabela para centralizar melhor */
.form-wrapper {
    width: 80%; /* Ajuste a largura do container da tabela */
    margin: 20px auto; /* Centralizando a tabela */
}

	.table {
    width: 60%; /* Reduzindo a largura da tabela */
    max-width: 900px; /* Definindo um limite máximo de largura */
    background-color: #fff;
    border-collapse: collapse;
    color: #333;
    font-size: 14px;
    margin: 0 auto; /* Centralizando a tabela */
}

th, td {
    padding: 8px; /* Diminuindo o padding das células */
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #f1f1f1;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

.btn-sm {
    padding: 5px 10px;
    font-size: 14px; /* Ajustando o tamanho da fonte dos botões */
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

    /* Estilos da MODALL */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: #fff;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 40%;
        border-radius: 10px;
        text-align: center;
    }

	.close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

	.modal-content .close:hover,
.modal-content .close:focus {
    color: red; /* Cor vermelha ao passar o mouse */
    text-decoration: none;
    cursor: pointer;
}


    /* Estilo dos inputs */
    input[type="text"] {
        width: 80%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button.btn-primary {
        background-color: #0056b3;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

	/* Estilos da modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7); /* Escurece um pouco mais o fundo */
    backdrop-filter: blur(5px); /* Adiciona um efeito de desfoque */
}

.modal-content {
    background-color: #fff;
    margin: auto;
    padding: 20px;
    border: none; /* Remove a borda padrão */
    border-radius: 15px; /* Borda mais arredondada */
    width: 40%;
	height: 100%;
    max-width: 600px; /* Limita a largura máxima */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Adiciona uma sombra suave */
    animation: fadeIn 0.3s; /* Animação ao abrir */
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: #333; /* Cor mais escura ao passar o mouse */
    text-decoration: none;
    cursor: pointer;
}

/* Estilo dos inputs */
input[type="text"] {
    width: 100%; /* Largura total */
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Adiciona uma sombra aos inputs */
    transition: border-color 0.3s; /* Transição suave para a borda */
}

input[type="text"]:focus {
    border-color: #0056b3; /* Cor da borda ao focar */
    outline: none; /* Remove a borda padrão do navegador */
}

/* Estilo do botão de filtro */
button.btn-primary {
    background-color: #0056b3;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s; /* Transição suave para a cor do fundo */
}

button.btn-primary:hover {
    background-color: #004494; /* Cor mais escura ao passar o mouse */
}

</style>

<!-- Script para abrir e fechar o modal -->
<script>
    function openModal() {
        document.getElementById("filterModal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("filterModal").style.display = "none";
    }

    
//Modal Cliente
	function openDetailsModal(cliente) {
    // document.getElementById("detailId").innerText = cliente.idCliente;
    document.getElementById("detailNome").innerText = cliente.nomeCliente;
    document.getElementById("detailCpf").innerText = cliente.cpfCliente;
    document.getElementById("detailCns").innerText = cliente.cnsCliente;
    document.getElementById("detailDataNasc").innerText = cliente.dataNascCliente;
    document.getElementById("detailUsuario").innerText = cliente.userCliente;
    document.getElementById("detailTelefone").innerText = cliente.idTelefoneCliente;
    document.getElementById("detailCep").innerText = cliente.cepCliente;
	document.getElementById("detailLogradouro").innerText = cliente.logradouroCliente;
	document.getElementById("detailBairro").innerText = cliente.bairroCliente;
	document.getElementById("detailnumero").innerText = cliente.numeroCliente;
	document.getElementById("detailUf").innerText = cliente.ufCliente;
	document.getElementById("detailCidade").innerText = cliente.cidadeCliente;
    // Preencha outros campos conforme necessário
	
    // Exibe o modal
    document.getElementById("detailsModal").style.display = "block";
}

function closeDetailsModal() {
    document.getElementById("detailsModal").style.display = "none";
}
 // Fecha os modals se o usuário clicar fora de qualquer um deles
window.onclick = function(event) {
    var modalFilter = document.getElementById("filterModal");
    var modalDetails = document.getElementById("detailsModal");

    // Verifica se o clique foi fora do modal de filtros
    if (event.target == modalFilter) {
        modalFilter.style.display = "none";
    }

    // Verifica se o clique foi fora do modal de detalhes
    if (event.target == modalDetails) {
        modalDetails.style.display = "none";
    }
};


</script>
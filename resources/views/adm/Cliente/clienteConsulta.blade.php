@include('includes.header')

<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Lista de Clientes</h1>
            <ul class="breadcrumb">
                <li><a href="/cliente">Home</a></li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li><a class="active" href="/">Lista de Clientes</a></li>
            </ul>
        </div>
    </div>

    <!-- Exibir mensagens de sucesso ou erro -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Tabela de clientes -->
    <div class="form-wrapper">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>CNS</th>
                    <th>Data de Nascimento</th>
                    <th>Usuário</th>
                    <th>Telefone</th>
                    <th>CEP</th>
                    <th>Logradouro</th>
                    <th>Bairro</th>
                    <th>Número</th>
                    <th>UF</th>
                    <th>Cidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($clientes) && count($clientes) > 0)
                    @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->idCliente }}</td>
                        <td>{{ $cliente->nomeCliente }}</td>
                        <td>{{ $cliente->cpfCliente }}</td>
                        <td>{{ $cliente->cnsCliente }}</td>
                        <td>{{ $cliente->dataNascCliente }}</td>
                        <td>{{ $cliente->userCliente }}</td>
                        <td>{{ $cliente->idTelefoneCliente}}</td>
                        <td>{{ $cliente->cepCliente }}</td>
                        <td>{{ $cliente->logradouroCliente }}</td>
                        <td>{{ $cliente->bairroCliente }}</td>
                        <td>{{ $cliente->numeroCliente }}</td>
                        <td>{{ $cliente->ufCliente }}</td>
                        <td>{{ $cliente->cidadeCliente }}</td>
                        <td>
                        <a href="{{ route('cliente.edit', $cliente->idCliente) }}" class="btn btn-primary btn-sm" title="Editar">
                            ✏️ <!-- Símbolo de lápis para editar -->
                        </a>

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
</main>

@include('includes.footer')

<!-- Estilos CSS para a tabela -->
<style>
    main {
        padding: 20px; /* Define o espaçamento interno da seção principal (main) */
    }

    .head-title {
        margin-bottom: 40px; /* Espaçamento abaixo do título principal */
        text-align: center; /* Centraliza o texto do título */
    }

    .alert {
        padding: 10px; /* Espaçamento interno das mensagens de alerta */
        margin-bottom: 15px; /* Espaçamento abaixo das mensagens */
        border-radius: 5px; /* Define bordas arredondadas */
        text-align: center; /* Centraliza o texto dentro das mensagens */
    }

    .alert-success {
        background-color: #d4edda; /* Cor de fundo verde para sucesso */
        color: #155724; /* Cor do texto verde escuro para mensagens de sucesso */
    }

    .alert-danger {
        background-color: #f8d7da; /* Cor de fundo vermelho claro para erros */
        color: #721c24; /* Cor do texto vermelho escuro para mensagens de erro */
    }

    .form-wrapper {
       /* Define layout flexível para centralizar a tabela */
        /* Centraliza horizontalmente */
      /* Alinha a tabela ao topo */
        margin-left: -13%;
        margin-top: 0px; /* Espaçamento acima do formulário */
        width: 112%; /* Define que o formulário ocupa toda a largura disponível */
    }

    table {
        width: 80%; /* Define a largura da tabela como 80% do contêiner */
        height: auto; /* Define altura automática */
        max-width: 1200px; /* Define um limite máximo de largura */
        background-color: #fff; /* Cor de fundo branca para a tabela */
        border-collapse: collapse; /* Remove os espaçamentos entre bordas das células */
        color: #333; /* Cor do texto da tabela */
        font-size: 14px; /* Tamanho do texto dentro da tabela */
    }

    th, td {
        padding: 10px; /* Espaçamento interno das células */
        border: 1px solid #ddd; /* Bordas finas nas células */
        text-align: left; /* Alinhamento à esquerda do conteúdo das células */
    }

    th {
        background-color: #f1f1f1; /* Cor de fundo cinza claro para os cabeçalhos */
    }

    tr:nth-child(even) {
        background-color: #f9f9f9; /* Define uma cor de fundo diferente para linhas pares */
    }

    .btn-sm {
        padding: 5px 10px; /* Define o tamanho dos botões pequenos */
        font-size: 16px; /* Tamanho da fonte nos botões */
    }

    a.btn-primary {
        background-color: #4CAF50; /* Cor verde para o botão de editar */
        border-color: #4CAF50; /* Cor da borda verde */
        color: white; /* Cor do texto em branco */
        text-decoration: none; /* Remove sublinhado do link */
    }

    form button.btn-danger {
        background-color: #f44336; /* Cor vermelha para o botão de deletar */
        border-color: #f44336; /* Cor da borda vermelha */
        color: white; /* Cor do texto em branco */
    }
</style>

@include('includes.header')

@if (session('success'))
    <div class="alert alert-success" id="successMessage">
        {{ session('success') }}
    </div>
@endif

<div class="container"> <!-- Mantenha o container padrão para o formulário -->
    <h2>Cadastro de Farmácia UBS</h2>
    <form action="/insertFarmaciaUbs" method="POST">
        @csrf
        <!-- Nome da Farmácia -->
        <div class="form-group">
            <label for="nomeFamaciaUBS">Nome da Farmácia</label>
            <input type="text" class="form-control" id="nomeFamaciaUBS" name="nomeFamaciaUBS" required>
        </div>
        
        <!-- Email da Farmácia -->
        <div class="form-group">
            <label for="emailFamaciaUBS">Email</label>
            <input type="email" class="form-control" id="emailFamaciaUBS" name="emailFamaciaUBS" required>
        </div>
        
        <!-- Senha da Farmácia -->
        <div class="form-group">
            <label for="senhaFamaciaUBS">Senha</label>
            <input type="password" class="form-control" id="senhaFamaciaUBS" name="senhaFamaciaUBS" required>
        </div>
        
        <!-- Tipo da Farmácia -->
        <div class="form-group">
            <label for="tipoFamaciaUBS">Tipo da Farmácia</label>
            <input type="text" class="form-control" id="tipoFamaciaUBS" name="tipoFamaciaUBS">
        </div>
        
        <!-- Botão de Enviar -->
        <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
    </form>
</div>

<!-- Filtro de Pesquisa -->
<div class="container mt-5"> <!-- Container para a pesquisa -->
    <h3 class="mt-5">Todas as Farmácias Cadastradas</h3>
    <form action="{{ route('farmacia.showForm') }}" method="GET" class="mb-3"> <!-- Formulário de pesquisa -->
        <div class="input-group" style="width: 280px;"> <!-- Ajuste a largura aqui -->
            <input type="hidden" name="query" id="searchQuery" value="{{ request('query') }}">
            <input type="text" id="searchInput" placeholder="Pesquisar pelo nome da farmácia" aria-label="Pesquisar pelo nome da farmácia" oninput="updateQuery()" class="form-control"> <!-- Campo de pesquisa -->
            <div class="input-group-append"> <!-- Div para o ícone -->
                <button type="submit" class="btn btn-secondary" style="background: transparent; border: none; color: inherit; padding: 0; margin-left: 1px; height: 100%; display: flex; align-items: center; margin-top:7px; margin: 3px;">
                    <i class="fas fa-search"></i> <!-- Ícone de pesquisa -->
                </button>
            </div>
        </div>
    </form>

    <table class="table table-bordered table-sm mt-3" style="margin: 0; width: 100%;"> <!-- Remover margens da tabela -->
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @if ($farmacias->isEmpty())
                <tr>
                    <td colspan="5" class="text-center">Nenhuma farmácia cadastrada.</td>
                </tr>
            @else
                @foreach($farmacias as $farmaciaItem)
                    <tr>
                        <td>{{ $farmaciaItem->nomeFarmaciaUBS }}</td>
                        <td>{{ $farmaciaItem->emailFarmaciaUBS }}</td>
                        <td>{{ $farmaciaItem->tipoFarmaciaUBS }}</td>
                        <td>
                            <a href="{{ route('farmacia.edit', $farmaciaItem->idFarmaciaUBS) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> <!-- Ícone de editar -->
                            </a>
                            <form action="{{ route('farmacia.destroy', $farmaciaItem->idFarmaciaUBS) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> <!-- Ícone de excluir -->
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

<script>
    function updateQuery() {
        var input = document.getElementById('searchInput');
        document.getElementById('searchQuery').value = input.value;
    }

    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.transition = "opacity 1s ease-out";
            successMessage.style.opacity = '0';
            setTimeout(function() {
                successMessage.remove();
            }, 1000);
        }
    }, 6000);
</script>

@include('includes.footer')

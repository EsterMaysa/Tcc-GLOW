@include('includes.header')

@if (session('success'))
    <div class="alert alert-success" id="successMessage">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <h3>Todas as Farmácias Cadastradas</h3>
    
    <!-- Formulário de Pesquisa -->
    <form action="/farmacia" method="GET" class="mb-3">
        <div class="input-group" style="width: 280px;">
            <input type="hidden" name="query" id="searchQuery" value="{{ request('query') }}">
            <input type="text" id="searchInput" placeholder="Pesquisar pelo nome da farmácia" class="form-control" value="{{ request('query') }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Tabela de Farmácias -->
    <table class="table table-bordered">
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
                    <td colspan="4" class="text-center">Nenhuma farmácia cadastrada.</td>
                </tr>
            @else
                @foreach($farmacias as $farmaciaItem)
                    <tr>
                        <td>{{ $farmaciaItem->nomeFarmaciaUBS }}</td>
                        <td>{{ $farmaciaItem->emailFarmaciaUBS }}</td>
                        <td>{{ $farmaciaItem->tipoFarmaciaUBS }}</td>
                        <td>
                            <a href="{{ route('farmacia.edit', $farmaciaItem->idFarmaciaUBS) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('farmacia.destroy', $farmaciaItem->idFarmaciaUBS) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta farmácia?');">
                                    <i class="fas fa-trash-alt"></i>
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
    // Mensagem de sucesso desaparecendo após alguns segundos
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

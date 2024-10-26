@include('includes.header')

@if (session('success'))
    <div class="alert alert-success" id="successMessage">
        {{ session('success') }}
    </div>
@endif

<!-- Encosta a tabela e o título no canto esquerdo -->
<div class="container-fluid" style="padding-left: 0; margin-top:18px;">
    <!-- Título -->
    <h3 style="margin-left: 15px; ">Todas as Farmácias Cadastradas</h3>

    <!-- Formulário de Pesquisa alinhado abaixo do título -->
    <form action="{{ url('/farmacia') }}" method="GET" class="mb-3" style="margin-left: 15px; display: flex; align-items: center; margin-top:18px;">
        <div class="input-group" style="width: 330px;">
            <input type="text" name="query" id="searchInput" placeholder="Pesquisar pelo nome da farmácia" class="form-control" value="{{ request('query') }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-secondary" style="margin-top: -2px;">
                    <i class="fas fa-search" style="font-size: 0.9em;"></i> <!-- Ícone ajustado -->
                </button>
            </div>
        </div>
    </form>

    <!-- Tabela de Farmácias com margem superior -->
    <table class="table table-bordered" style="width: auto; margin-left: 15px; margin-top: 20px;">
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

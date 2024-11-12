<!--CSS OK (ASS:Duda)-->

@include('includes.headerFarmacia')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/Farmacia-CSS/Saida.css')}}">

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
        <h1 style="font-weight: bold;"> Lista de Saídas de Medicamentos e Motivos </h1>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/lista.png') }}" alt="Cadastro de Medicamentos" class="img-fluid" />
    </div>
</div>

<div class="cadastros-container">
    <h3><i class='bx bx-plus-circle' style="margin-right: 6px;"></i> Cadastrar </h3>
    <div class="cadastros-list">
        <div class="cadastro-item">
            <p>Cadastrar Prescrição</p>
            <a href="/prescricao" class="cadastrar-link">
                <i class="fas fa-file-medical"></i> 
            </a>
        </div>
    </div>
    <br>
    <div class="cadastros-list">
        <div class="cadastro-item">
            <p>Cadastrar Saída</p>
            <a href="/saidaMedMotivoCadastro" class="cadastrar-link">
                <i class="fas fa-sign-out-alt"></i> 
            </a>
        </div>
    </div>
</div>

<main>
    <div class="filter-container">
        <h2>Filtros</h2>
        <form action="{{ route('saidaMedMotivo.index') }}" method="GET" class="filter-form">
            <div class="filter-item">
                <input type="date" name="dataSaida" placeholder="Filtrar por Data" value="{{ request()->get('dataSaida') }}">
            </div>
            <div class="filter-item">
                <input type="text" name="motivoSaida" placeholder="Filtrar por Motivo" value="{{ request()->get('motivoSaida') }}">
            </div>
            <div class="filter-item">
                <button type="submit" class="search-btn">
                    <i class="fas fa-search"></i> Pesquisar
                </button>
            </div>
        </form>
    </div>

    <table>
            <thead>
                <tr>
                    <th>Medicamento</th>
                    <th>Data de Saída</th>
                    <th>Quantidade</th>
                    <th>Motivo de Saída</th>
                    <th>Lote</th>
                    <th>Validade</th>
                    <th>Funcionário</th>
                    <th>Situação</th>

                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($saidas as $saida)
                <tr>
                    <td>{{ $saida->medicamento->nomeMedicamento ?? 'N/A' }}</td>
                    <td> {{ \Carbon\Carbon::parse($saida->dataSaida)->format('d/m/Y') }}</td>
                    <td>{{ $saida->quantidade }}</td>
                    <td>{{ $saida->motivoSaida }}</td>
                    <td>{{ $saida->lote }}</td>
                    <td> {{ \Carbon\Carbon::parse($saida->validade)->format('d/m/Y') }}</td>
                    <td>{{ $saida->funcionario->nomeFuncionario ?? 'N/A' }}</td>
                    <td>{{ $saida->situacao == 'A' ||  $saida->situacao == '1' ? 'Ativo' : 'Inativo'  }}</td>


                    <td class="action-icons">
                        <!-- Botão de edição -->
                        <i class="fas fa-edit" title="Editar" onclick="window.location.href='{{ route('saidaMedMotivo.edit', $saida->idSaidaMedicamento) }}'"></i>

                        <!-- Botão de exclusão -->
                        <i class="fas fa-trash-alt" title="Desativar" onclick="if(confirm('Tem certeza que deseja desativar?')) { event.preventDefault(); document.getElementById('delete-form-{{ $saida->idSaidaMedicamento }}').submit(); }"></i>

                        <!-- Formulário de desativação -->
                        <form id="delete-form-{{ $saida->idSaidaMedicamento }}" action="{{ route('saidaMedMotivo.desativar', $saida->idSaidaMedicamento) }}" method="POST" style="display: none;">
                            @csrf
                            @method('PATCH')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</main>

@include('includes.headerFarmacia')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/Farmacia-CSS/FuncionarioCadastro.css') }}">

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
        <h1>Editar Movimentação</h1>
        <p>Atualize os dados da movimentação.</p>
    </div>
</div>

<main>
    <form action="{{ route('atualizarTipoMovimentacao', $movimentacao->idTipoMovimentacao) }}" method="POST" class="formulario">
        @csrf
        @method('PUT') <!-- Método PUT para atualização -->
        
        <!-- Input para Movimentação -->
        <div class="input-container">
            <label for="movimentacao">
                <i class="fas fa-info-circle icon"></i>
                Movimentação:
            </label>
            <input type="text" name="movimentacao" id="movimentacao" value="{{ old('movimentacao', $movimentacao->movimentacao) }}" placeholder="Digite o nome da movimentação" style="background-color: #F7F7F7;" required>
        </div>

        <!-- Input para Situação -->
        <div class="input-container">
            <label for="situacaoTipoMovimentacao">
                <i class="fas fa-info-circle icon"></i> 
                Situação:
            </label>
            <input type="number" name="situacaoTipoMovimentacao" id="situacaoTipoMovimentacao" value="{{ old('situacaoTipoMovimentacao', $movimentacao->situacaoTipoMovimentacao) }}" placeholder="Digite a situação da movimentação" style="background-color: #F7F7F7;" required>
        </div>

        <!-- Input para Data de Cadastro -->
        <div class="input-container">
            <label for="dataCadastroTipoMovimentacao">
                <i class="fas fa-calendar-alt icon"></i> 
                Data de Cadastro:
            </label>
            <input type="date" name="dataCadastroTipoMovimentacao" id="dataCadastroTipoMovimentacao" value="{{ old('dataCadastroTipoMovimentacao', $movimentacao->dataCadastroTipoMovimentacao) }}" style="background-color: #F7F7F7;" required>
        </div>

        <!-- Input para ID Prescrição -->
        <div class="input-container">
            <label for="idPrescricao">
                <i class="fas fa-info-circle icon"></i> 
                ID Prescrição:
            </label>
            <input type="number" name="idPrescricao" id="idPrescricao" value="{{ old('idPrescricao', $movimentacao->idPrescricao) }}" placeholder="Digite o ID da prescrição" style="background-color: #F7F7F7;" required>
        </div>

        <!-- Botão para salvar alterações -->
        <button type="submit" class="botaozinho">Salvar Alterações</button>
    </form>
</main>

@include('includes.footer')

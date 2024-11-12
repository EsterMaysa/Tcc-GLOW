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
        <h1>Editar Funcionário</h1>
        <p>Atualize os dados do funcionário.</p>
    </div>
</div>

<main>
    <form action="{{ route('funcionario.update', $funcionario->idFuncionario) }}" method="POST" class="formulario">
        @csrf
        @method('PUT') <!-- Método PUT para atualização -->
        <div class="input-container">
            <label for="nomeFuncionario">
                <i class="fas fa-info-circle icon"></i>
                Nome Funcionario:
            </label>
            <input type="text" name="nomeFuncionario" id="nomeFuncionario" value="{{ $funcionario->nomeFuncionario }}" placeholder="Digite o nome do funcionário" style="background-color: #F7F7F7;" required>
        </div>
        <div class="input-container">
            <label for="cpfFuncionario">
                <i class="fas fa-info-circle icon"></i> 
                CPF Funcionario:
            </label>
            <input type="text" name="cpfFuncionario" id="cpfFuncionario" value="{{ $funcionario->cpfFuncionario }}" placeholder="Digite o CPF do funcionário" style="background-color: #F7F7F7;" required>
        </div>
        <div class="input-container">
            <label for="cargoFuncionario">
                <i class="fas fa-info-circle icon"></i> 
                Cargo Funcionario:
            </label>
            <input type="text" name="cargoFuncionario" id="cargoFuncionario" value="{{ $funcionario->cargoFuncionario }}" placeholder="Digite o cargo do funcionário" style="background-color: #F7F7F7;" required>
        </div>
        <button type="submit" class="botaozinho">Atualizar Funcionário</button>
    </form>
</main>

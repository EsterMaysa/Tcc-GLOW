
@include('includes.headerFarmacia') 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/Farmacia-CSS/FuncionarioCadastro.css')}}">

<nav class="navbar">
    <div class="navbar-brand">
        <img src="{{ asset('Image/3a.png')}}" alt="Logo" class="logo"> 
    </div>
    <div class="search-container">
        <input type="text" placeholder="Buscar..." class="search-input">
        <button class="search-button"><i class="fas fa-search"></i></button>
    </div>
</nav>

<div class="container-um">
    <div class="jumbotron-um">
        <h1>Cadastrar Funcionário</h1>
        <p>Cadastre um funcionário novo.</p>
    </div>
</div>

<main>
    <form action="{{ route('insertFuncionario') }}" method="POST" class="formulario">
        @csrf <!-- Proteção contra CSRF vini -->
        <div class="input-container">
            <label for="nomeFuncionario">
                <i class="fas fa-info-circle icon"></i>
                Nome Funcionario:
            </label>
            <input type="text" name="nomeFuncionario" id="nomeFuncionario" placeholder="Digite o nome do funcionário" style="background-color: #F7F7F7;">
        </div>
        <div class="input-container">
            <label for="cpfFuncionario">
                <i class="fas fa-info-circle icon"></i> 
                cpf Funcionario :
            </label>
            <input type="text" name="cpfFuncionario" id="cpfFuncionario" placeholder="Digite o cpf do funcionário" style="background-color: #F7F7F7;">
        </div>
        <div class="input-container">
            <label for="cargoFuncionario">
                <i class="fas fa-info-circle icon"></i> 
                Cargo Funcionario :
            </label>
            <input type="text" name="cargoFuncionario" id="cargoFuncionario" placeholder="Digite o cargo do funcionário" style="background-color: #F7F7F7;">
        </div>
        <button type="submit" class="botaozinho">Cadastrar Funcionário</button>
    </form>
</main>




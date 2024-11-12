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
        <h1>Cadastro de Tipo de Movimentação</h1>
        <p>Preencha os campos abaixo para cadastrar um novo tipo de movimentação.</p>
    </div>
</div>

<main>
    <!-- Formulário de Cadastro -->
    <form action="{{ route('tipomovimentacao.store') }}" method="POST" class="formulario">
        @csrf
        
        <!-- Campo de Movimentação -->
        <div class="input-container">
            <label for="movimentacao">
                <i class="fas fa-info-circle icon"></i>
                Movimentação:
            </label>
            <input type="text" name="movimentacao" id="movimentacao" class="form-control" required maxlength="50" placeholder="Digite o tipo de movimentação" style="background-color: #F7F7F7;">
        </div>

        <!-- Campo de ID Prescrição -->
        <div class="input-container">
            <label for="idPrescricao">
                <i class="fas fa-info-circle icon"></i>
                ID Prescrição:
            </label>
            <input type="number" name="idPrescricao" id="idPrescricao" class="form-control" required placeholder="Digite o ID da prescrição" style="background-color: #F7F7F7;">
        </div>

        <!-- Botão de Submissão -->
        <button type="submit" class="botaozinho">Salvar</button>
    </form>
</main>

@include('includes.footer')

<!-- Estilos adicionais -->
<style>
    .container-um {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 8px;
    }

    .jumbotron-um h1 {
        font-size: 32px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .jumbotron-um p {
        font-size: 16px;
        color: #555;
    }

    .formulario {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .input-container {
        margin-bottom: 15px;
    }

    .input-container label {
        font-weight: bold;
    }

    .input-container input {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-top: 8px;
    }

    .botaozinho {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #007bff;
        border-color: #007bff;
        color: white;
        border-radius: 4px;
        margin-top: 20px;
        display: inline-block;
    }

    .botaozinho:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>

@include('includes.headerFarmacia')

<!-- Main content -->
<div class="col-md-9 col-lg-10 main-content">
    <div class="head-title d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Cadastro de Tipo de Movimentação</h1>
    </div>

    <!-- Formulário de Cadastro de Tipo de Movimentação -->
    <form action="{{ route('tipomovimentacao.store') }}" method="POST" class="form-container">
        @csrf

        <div class="form-group">
            <label for="movimentacao" class="form-label">Movimentação:</label>
            <input type="text" id="movimentacao" name="movimentacao" class="form-control" required maxlength="50" placeholder="Digite o tipo de movimentação">
        </div>

        <div class="form-group">
            <label for="idPrescricao" class="form-label">ID Prescrição:</label>
            <input type="number" id="idPrescricao" name="idPrescricao" class="form-control" required placeholder="Digite o ID da prescrição">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>

@include('includes.footer')

<!-- Estilos adicionais -->
<style>
    .main-content {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 8px;
    }

    .head-title h1 {
        font-size: 32px;
        font-weight: bold;
    }

    .form-container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-label {
        font-weight: bold;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-top: 8px;
    }

    .btn {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #007bff;
        border-color: #007bff;
        color: white;
        border-radius: 4px;
        margin-top: 20px;
    }

    .btn:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>

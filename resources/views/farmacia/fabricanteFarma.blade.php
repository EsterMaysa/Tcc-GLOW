@include('includes.headerFarmacia')

<!-- Main content -->
<div class="col-md-9 col-lg-10 main-content">
    <div class="head-title">
        <div class="left">
            <h1>Cadastrar Fabricante</h1>
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li><a class="active" href="#">Cadastrar Fabricante</a></li>
            </ul>
        </div>
    </div>

    <!-- Mensagens de Sucesso e Erro -->
    <div class="messages">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <!-- Formulário de Cadastro de Fabricante -->
    <div class="form-wrapper">
        <form action="/fabricanteFarma" method="POST" class="styled-form">
            @csrf <!-- Token de segurança do Laravel -->

            <!-- Linha 1 -->
            <div class="form-row">
                <div class="form-group column">
                    <label for="nomeFabricante">Nome do Fabricante:</label>
                    <input type="text" id="nomeFabricante" name="nomeFabricante" maxlength="100" required>
                </div>
                <div class="form-group column">
                    <label for="cnpjFabricante">CNPJ:</label>
                    <input type="text" id="cnpjFabricante" name="cnpjFabricante" maxlength="18" required>
                </div>
            </div>

            <!-- Linha 2 -->
            <div class="form-row">
                <div class="form-group column">
                    <label for="emailFabricante">Email:</label>
                    <input type="email" id="emailFabricante" name="emailFabricante" maxlength="100">
                </div>
                <div class="form-group column">
                    <label for="logradouroFabricante">Logradouro:</label>
                    <input type="text" id="logradouroFabricante" name="logradouroFabricante" maxlength="50" required>
                </div>
            </div>

            <!-- Linha 3 -->
            <div class="form-row">
                <div class="form-group column">
                    <label for="bairroFabricante">Bairro:</label>
                    <input type="text" id="bairroFabricante" name="bairroFabricante" maxlength="50" required>
                </div>
                <div class="form-group column">
                    <label for="estadoFabricante">Estado:</label>
                    <input type="text" id="estadoFabricante" name="estadoFabricante" maxlength="2" required>
                </div>
            </div>

            <!-- Linha 4 -->
            <div class="form-row">
                <div class="form-group column">
                    <label for="cidadeFabricante">Cidade:</label>
                    <input type="text" id="cidadeFabricante" name="cidadeFabricante" maxlength="25" required>
                </div>
                <div class="form-group column">
                    <label for="numeroFabricante">Número:</label>
                    <input type="text" id="numeroFabricante" name="numeroFabricante" maxlength="6" required>
                </div>
            </div>

            <!-- Linha 5 -->
            <div class="form-row">
                <div class="form-group column">
                    <label for="ufFabricante">UF:</label>
                    <input type="text" id="ufFabricante" name="ufFabricante" maxlength="2" required>
                </div>
                <div class="form-group column">
                    <label for="cepFabricante">CEP:</label>
                    <input type="text" id="cepFabricante" name="cepFabricante" maxlength="10" required>
                </div>
            </div>

            <!-- Linha 6 -->
            <div class="form-row">
                <div class="form-group column">
                    <label for="complementoFabricante">Complemento:</label>
                    <input type="text" id="complementoFabricante" name="complementoFabricante" maxlength="10">
                </div>
                
            </div>

            <!-- Botão de Submissão -->
            <div class="form-group button-wrapper">
                <button type="submit" class="submit-btn">Cadastrar Fabricante</button>
            </div>

        </form>
    </div>
</div>

<!-- Estilos CSS Atualizados -->
<style>
    .messages {
        margin-bottom: 20px;
        text-align: center;
    }

    .alert {
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
        display: inline-block;
        width: 100%;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }

    .alert-success {
        background-color: #4CAF50;
        color: #155724;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .styled-form {
        background-color: #265C4B;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 700px;
        margin: 0 auto;
    }

    .form-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 6px;
        color: #fff;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #ddd;
        font-size: 14px;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #8FC1B5;
        box-shadow: 0 0 4px rgba(87, 184, 255, 0.3);
    }

    .form-row {
        display: flex;
        justify-content: space-between;
        gap: 15px;
    }

    .column {
        flex: 1;
    }

    .submit-btn {
        padding: 12px 25px;
        background-color: #2E8B57;
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #3CB371;
    }
</style>

@include('includes.footer')

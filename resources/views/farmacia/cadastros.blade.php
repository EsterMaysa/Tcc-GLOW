@include('includes.headerFarmacia')

<!-- Main content -->
<div class="col-md-9 col-lg-10 main-content">
    <h1 class="page-title">Cadastro de Cliente</h1>

    <!-- Exibe mensagens de sucesso ou erros -->
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

    <!-- Formulário para criar um cliente e seu telefone -->
    <div class="form-wrapper">
        <form action="{{ route('cliente.store') }}" method="POST" class="styled-form">
            @csrf

            <div class="row">
                <!-- Coluna da esquerda -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nomeCliente">Nome do Cliente:</label>
                        <input type="text" name="nomeCliente" id="nomeCliente" class="form-control" value="{{ old('nomeCliente') }}" placeholder="Ex: João Silva" maxlength="100" required>
                    </div>

                    <div class="form-group">
                        <label for="cpfCliente">CPF do Cliente:</label>
                        <input type="text" name="cpfCliente" id="cpfCliente" class="form-control" value="{{ old('cpfCliente') }}" placeholder="Ex: 12345678900" maxlength="11" required>
                    </div>

                    <div class="form-group">
                        <label for="dataNascCliente">Data de Nascimento:</label>
                        <input type="date" name="dataNascCliente" id="dataNascCliente" class="form-control" value="{{ old('dataNascCliente') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="userCliente">Usuário:</label>
                        <input type="text" name="userCliente" id="userCliente" class="form-control" value="{{ old('userCliente') }}" placeholder="Ex: joao_silva" maxlength="30" required>
                    </div>

                    <div class="form-group">
                        <label for="numeroTelefoneCliente">Número de Telefone:</label>
                        <input type="text" name="numeroTelefoneCliente" id="numeroTelefoneCliente" class="form-control" value="{{ old('numeroTelefoneCliente') }}" placeholder="Ex: (11) 12345-6789" maxlength="11" required>
                    </div>

                    <div class="form-group">
                        <label for="cepCliente">CEP:</label>
                        <input type="text" name="cepCliente" id="cepCliente" class="form-control" value="{{ old('cepCliente') }}" placeholder="Ex: 12345-678" maxlength="10" required>
                    </div>

                    <div class="form-group">
                        <label for="logradouroCliente">Logradouro:</label>
                        <input type="text" name="logradouroCliente" id="logradouroCliente" class="form-control" value="{{ old('logradouroCliente') }}" placeholder="Ex: Rua das Flores" maxlength="50" required>
                    </div>
                </div>

                <!-- Coluna da direita -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bairroCliente">Bairro:</label>
                        <input type="text" name="bairroCliente" id="bairroCliente" class="form-control" value="{{ old('bairroCliente') }}" placeholder="Ex: Centro" maxlength="50" required>
                    </div>

                    <div class="form-group">
                        <label for="numeroCliente">Número:</label>
                        <input type="text" name="numeroCliente" id="numeroCliente" class="form-control" value="{{ old('numeroCliente') }}" placeholder="Ex: 123" maxlength="6" required>
                    </div>

                    <div class="form-group">
                        <label for="estadoCliente">Estado:</label>
                        <input type="text" name="estadoCliente" id="estadoCliente" class="form-control" value="{{ old('estadoCliente') }}" placeholder="Ex: SP" maxlength="2" required>
                    </div>

                    <div class="form-group">
                        <label for="cidadeCliente">Cidade:</label>
                        <input type="text" name="cidadeCliente" id="cidadeCliente" class="form-control" value="{{ old('cidadeCliente') }}" placeholder="Ex: São Paulo" maxlength="25" required>
                    </div>

                    <div class="form-group">
                        <label for="ufCliente">UF:</label>
                        <input type="text" name="ufCliente" id="ufCliente" class="form-control" value="{{ old('ufCliente') }}" placeholder="Ex: SP" maxlength="2" required>
                    </div>

                    <div class="form-group">
                        <label for="complementoCliente">Complemento:</label>
                        <input type="text" name="complementoCliente" id="complementoCliente" class="form-control" value="{{ old('complementoCliente') }}" placeholder="Ex: Apto 301" maxlength="10">
                    </div>

                    <!-- Botão de Envio -->
                    <div class="text-center mt-4">
                        <button type="submit" class="submit-btn">Cadastrar Cliente</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#cepCliente').on('blur', function() {
            var cep = $(this).val().replace(/\D/g, ''); // Remove caracteres não numéricos
            if (cep.length === 8) {
                $.getJSON(`https://viacep.com.br/ws/${cep}/json/?callback=?`, function(dados) {
                    if (!("erro" in dados)) {
                        // Preencher os campos do endereço
                        $('#logradouroCliente').val(dados.logradouro);
                        $('#bairroCliente').val(dados.bairro);
                        $('#cidadeCliente').val(dados.localidade);
                        $('#estadoCliente').val(dados.uf); // Preenche o campo UF
                        $('#ufCliente').val(dados.uf); // Preenche o campo Estado
                    } else {
                        alert("CEP não encontrado.");
                    }
                });
            } else {
                alert("CEP inválido.");
            }
        });
    });
</script>

<style>
    /* Estilos CSS adicionais */
    .form-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column; /* Centraliza o conteúdo */
        min-height: 80vh; /* Para centralização vertical */
        margin-left: 160px;
    }

    .styled-form {
        background-color: #265C4B; /* Cor de fundo do formulário */
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 800px; /* Largura máxima do formulário */
        margin: 0 auto; /* Centraliza o formulário */
    }

    .form-group {
        margin-bottom: 15px; /* Espaçamento entre os campos */
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: white; /* Cor da letra do label */
    }

    .form-control {
        background-color: #f0f0f0; /* Cor de fundo dos campos */
        color: #000; /* Cor do texto nos campos */
        border: 1px solid #ced4da; /* Cor da borda padrão */
        border-radius: 4px; /* Bordas levemente arredondadas */
    }

    .form-control:focus {
        border-color: #80bdff; /* Cor da borda quando focado */
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* Sombra quando focado */
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

    .submit-btn {
        padding: 22px 25px;
        background-color: #90EE90; /* Verde claro */
        border: none;
        border-radius: 5px; /* Bordas levemente arredondadas para o botão */
        cursor: pointer;
        display: block;
        margin: 20px auto; /* Centraliza o botão */
        color: white; /* Cor da letra do botão */
        width: 250px; /* Largura do botão */
        font-size: 20px; /* Tamanho da fonte do botão */
        transition: background-color 0.3s; /* Transição suave para mudança de cor */
    }

    .submit-btn:hover {
        background-color: #57b8ff; /* Cor do botão ao passar o mouse */
    }
</style>

@include('includes.footer')

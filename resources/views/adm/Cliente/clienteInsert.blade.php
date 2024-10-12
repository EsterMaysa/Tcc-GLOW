@include('includes.header')

<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Criar Cliente</h1>
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li><a class="active" href="/">Criar Cliente</a></li>
            </ul>
        </div>
    </div>

    <!-- Exibir mensagens de sucesso ou erro -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Contêiner para centralizar o formulário -->
    <div class="form-wrapper">
        <form action="/criarCliente" method="POST" class="styled-form">
            @csrf <!-- Token de segurança do Laravel -->

            <div class="form-row">
                <div class="form-group">
                    <label for="nomeCliente">Nome do Cliente:</label>
                    <input type="text" id="nomeCliente" name="nomeCliente" required>
                </div>

                <div class="form-group">
                    <label for="cpfCliente">CPF do Cliente:</label>
                    <input type="text" id="cpfCliente" name="cpfCliente" maxlength="11" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="cnsCliente">CNS do Cliente:</label>
                    <input type="text" id="cnsCliente" name="cnsCliente" maxlength="15" required>
                </div>

                <div class="form-group">
                    <label for="dataNascCliente">Data de Nascimento:</label>
                    <input type="date" id="dataNascCliente" name="dataNascCliente" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="userCliente">Usuário:</label>
                    <input type="text" id="userCliente" name="userCliente" required>
                </div>

                <div class="form-group">
                    <label for="telefoneCliente">Telefone do Cliente:</label>
                    <input type="text" id="telefoneCliente" name="telefoneCliente" maxlength="11" required>
                </div>
            </div>

            <!-- Diminuir o tamanho das caixas de CEP e Complemento e posicioná-las lado a lado -->
            <div class="form-row">
                <div class="form-group cep-field">
                    <label for="cepCliente">CEP do Cliente:</label>
                    <input type="text" id="cepCliente" name="cepCliente" maxlength="8" required>
                </div>

                <div class="form-group complemento-field">
                    <label for="complementoCliente">Complemento:</label>
                    <input type="text" id="complementoCliente" name="complementoCliente">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="logradouroCliente">Logradouro:</label>
                    <input type="text" id="logradouroCliente" name="logradouroCliente" required readonly>
                </div>

                <div class="form-group">
                    <label for="bairroCliente">Bairro:</label>
                    <input type="text" id="bairroCliente" name="bairroCliente" required readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="cidadeCliente">Cidade:</label>
                    <input type="text" id="cidadeCliente" name="cidadeCliente" required readonly>
                </div>

                <div class="form-group">
                    <label for="ufCliente">UF:</label>
                    <input type="text" id="ufCliente" name="ufCliente" required readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="estadoCliente">Estado:</label>
                    <input type="text" id="estadoCliente" name="estadoCliente" required>
                </div>

                <div class="form-group">
                    <label for="numeroCliente">Número:</label>
                    <input type="text" id="numeroCliente" name="numeroCliente" maxlength="11" required>
                </div>
            </div>

            <div class="form-group button-wrapper">
                <button type="submit" class="submit-btn">Cadastrar Cliente</button>
            </div>
        </form>
    </div>
</main>

@include('includes.footer')

<!-- Estilos CSS -->
<style>
    /* Estilo para a página principal */
    main {
        padding: 20px;
    }

    /* Estilo para manter o título e breadcrumb no topo */
    .head-title {
        margin-bottom: 40px;
        text-align: center;
    }

    /* Estilo para alertas */
    .alert {
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
        text-align: center;
    }
    .alert-success {
        background-color: #d4edda;
        color: #155724;
    }
    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
    }

    /* Form-wrapper centraliza o formulário */
    .form-wrapper {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        margin-top: 50px;
        height: auto;
    }

    /* Estilo moderno e delicado para o formulário */
    .styled-form {
        background-color: #1f2b5b;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 600px;
    }

    /* Form-row para alinhar as colunas */
    .form-row {
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }

    .form-group {
        flex: 1;
    }

    /* Estilo específico para o campo CEP e Complemento */
    .cep-field {
        flex: 0.5;
    }

    .complemento-field {
        flex: 0.5
    }

    .form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 6px;
        color: #fff;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #ddd;
        font-size: 14px;
    }

    .form-group input:focus {
        outline: none;
        border-color: #57b8ff;
        box-shadow: 0 0 4px rgba(87, 184, 255, 0.3);
    }

    /* Botão de envio */
    .submit-btn {
        padding: 12px 25px;
        background-color: #57b8ff;
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-left: 14%;
    }

    .submit-btn:hover {
        background-color: #4b89f5;
    }
</style>

<!-- Script para buscar endereço usando a API do ViaCEP -->
<script>
    document.getElementById('cepCliente').addEventListener('blur', function() {
        var cep = this.value.replace(/\D/g, '');
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if(validacep.test(cep)) {
                document.getElementById('logradouroCliente').value = "...";
                document.getElementById('bairroCliente').value = "...";
                document.getElementById('cidadeCliente').value = "...";
                document.getElementById('ufCliente').value = "...";

                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => response.json())
                .then(data => {
                    if (!("erro" in data)) {
                        document.getElementById('logradouroCliente').value = data.logradouro;
                        document.getElementById('bairroCliente').value = data.bairro;
                        document.getElementById('cidadeCliente').value = data.localidade;
                        document.getElementById('ufCliente').value = data.uf;
                    } else {
                        alert("CEP não encontrado.");
                    }
                })
                .catch(error => {
                    alert("Erro ao buscar o CEP.");
                });
            } else {
                alert("Formato de CEP inválido.");
            }
        }
    });
</script>

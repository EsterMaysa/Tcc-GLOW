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
                    <input type="text" id="cpfCliente" name="cpfCliente" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="dataNascCliente">Data de Nascimento:</label>
                    <input type="date" id="dataNascCliente" name="dataNascCliente" required>
                </div>

                <div class="form-group">
                    <label for="userCliente">Usuário:</label>
                    <input type="text" id="userCliente" name="userCliente" required>
                </div>
            </div>           
            <div class="form-group">
                <label for="telefoneCliente">Telefone do Cliente:</label>
                <input type="text" id="telefoneCliente" name="telefoneCliente" required>
            </div>

            <div class="form-group">
                <label for="cepCliente">CEP do Cliente:</label>
                <input type="text" id="cepCliente" name="cepCliente" required>
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

            <div class="form-group">
                <label for="complementoCliente">Complemento:</label>
                <input type="text" id="complementoCliente" name="complementoCliente">
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

    /* Form-wrapper centraliza o formulário */
    .form-wrapper {
        display: flex;
        justify-content: center;
        align-items: flex-start; /* Ajustado para alinhar ao topo */
        margin-top: 50px; /* Ajuste o valor conforme necessário */
        height: auto; /* Remover a limitação de altura */
    }

    /* Estilo moderno e delicado para o formulário */
    .styled-form {
        background-color: #1f2b5b; /* Azul escuro */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 600px; /* Mais largo para comportar duas colunas */
    }

    /* Form-row para alinhar as colunas */
    .form-row {
        display: flex;
        justify-content: space-between;
        gap: 20px; /* Espaçamento entre as colunas */
    }

    .form-group {
        flex: 1; /* Ocupa o mesmo espaço em cada coluna */
    }

    .form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 6px;
        color: #fff; /* Cor branca para melhor contraste com o fundo azul escuro */
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
        border-color: #57b8ff; /* Cor azul claro para foco */
        box-shadow: 0 0 4px rgba(87, 184, 255, 0.3); /* Sombra azul clara suave */
    }

    /* Botão de envio */
    .submit-btn {
        padding: 12px 25px;
        background-color: #57b8ff; /* Azul suave */
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #4b89f5; /* Tom um pouco mais escuro para hover */
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

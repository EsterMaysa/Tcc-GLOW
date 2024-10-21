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
                    <input type="text" id="cpfCliente" name="cpfCliente" maxlength="14" required>
                    @error('cpfCliente')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="cnsCliente">CNS do Cliente:</label>
                    <input type="text" id="cnsCliente" name="cnsCliente" maxlength="15" required>
                    @error('cnsCliente')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="dataNascCliente">Data de Nascimento:</label>
                    <input type="date" id="dataNascCliente" name="dataNascCliente" required>
                </div>
            </div>

            <div class="form-row">
                <!-- <div class="form-group">
                    <label for="userCliente">Usuário:</label>
                    <input type="text" id="userCliente" name="userCliente" required>
                </div> -->

                <div class="form-group">
                    <label for="telefoneCliente">Telefone do Cliente:</label>
                    <input type="text" id="telefoneCliente" name="telefoneCliente" maxlength="11" required>
                    @error('telefoneCliente')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Diminuir o tamanho das caixas de CEP e Complemento e posicioná-las lado a lado -->
            <div class="form-row">
                <div class="form-group cep-field">
                    <label for="cepCliente">CEP do Cliente:</label>
                    <input type="text" id="cepCliente" name="cepCliente" maxlength="9" required>
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

                <div class="form-row">
   
    <div class="form-row">
    <div class="form-group">
        <label for="ufCliente">UF:</label>
        <select id="ufCliente" name="ufCliente" required onchange="updateEstado()">
            <option value="">Selecione um estado</option>
            <option value="AC">AC</option>
            <option value="AL">AL</option>
            <option value="AP">AP</option>
            <option value="AM">AM</option>
            <option value="BA">BA</option>
            <option value="CE">CE</option>
            <option value="DF">DF</option>
            <option value="ES">ES</option>
            <option value="GO">GO</option>
            <option value="MA">MA</option>
            <option value="MT">MT</option>
            <option value="MS">MS</option>
            <option value="MG">MG</option>
            <option value="PA">PA</option>
            <option value="PB">PB</option>
            <option value="PR">PR</option>
            <option value="PE">PE</option>
            <option value="PI">PI</option>
            <option value="RJ">RJ</option>
            <option value="RN">RN</option>
            <option value="RS">RS</option>
            <option value="RO">RO</option>
            <option value="RR">RR</option>
            <option value="SC">SC</option>
            <option value="SP">SP</option>
            <option value="SE">SE</option>
            <option value="TO">TO</option>
        </select>
    </div>

    <div class="form-group">
        <label for="estadoCliente">Estado:</label>
        <input type="text" id="estadoCliente" name="estadoCliente" required readonly>
    </div>
</div>

</div>

            </div>

            <div class="form-row">
               

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
        if (validacep.test(cep)) {
            document.getElementById('logradouroCliente').value = "...";
            document.getElementById('bairroCliente').value = "...";
            document.getElementById('cidadeCliente').value = "...";
            document.getElementById('ufCliente').value = "...";
            document.getElementById('estadoCliente').value = "..."; // Adicionei esta linha para limpar o campo Estado

            fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => response.json())
            .then(data => {
                if (!("erro" in data)) {
                    document.getElementById('logradouroCliente').value = data.logradouro;
                    document.getElementById('bairroCliente').value = data.bairro;
                    document.getElementById('cidadeCliente').value = data.localidade;
                    document.getElementById('ufCliente').value = data.uf;

                    // Adicione o nome completo do estado
                    fetch(`https://servicodados.ibge.gov.br/api/v2/malhas/${data.uf}?formato=application/json`)
                    .then(response => response.json())
                    .then(estadoData => {
                        if (estadoData.nome) {
                            document.getElementById('estadoCliente').value = estadoData.nome; // Preencher o estado
                        } else {
                            document.getElementById('estadoCliente').value = data.uf; // Se não encontrar o nome completo, use a sigla
                        }
                    })
                    .catch(error => {
                        console.error("Erro ao buscar o nome do estado:", error);
                        document.getElementById('estadoCliente').value = data.uf; // Se houver erro, use a sigla
                    });

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
<!-- Script de formatação para CPF e Telefone -->
<!-- <script>
// Formatação do campo CPF
document.getElementById('cpfCliente').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, '');
    value = value.replace(/(\d{3})(\d)/, '$1.$2');
    value = value.replace(/(\d{3})(\d)/, '$1.$2');
    value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    e.target.value = value;
});

// Formatação do campo Telefone
document.getElementById('telefoneCliente').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, '');
    value = value.replace(/(\d{2})(\d)/, '($1) $2');
    value = value.replace(/(\d{5})(\d{1,4})$/, '$1-$2');
    e.target.value = value;
});
</script> -->

<script>
    document.getElementById('submitBtn').addEventListener('click', function() {
        // Limpar mensagens de erro anteriores
        document.querySelectorAll('.text-danger').forEach(el => el.remove());

        // Validar campos
        let isValid = true;
        const nomeCliente = document.getElementById('nomeCliente').value.trim();
        const cpfCliente = document.getElementById('cpfCliente').value.trim();
        const cnsCliente = document.getElementById('cnsCliente').value.trim();
        const telefoneCliente = document.getElementById('telefoneCliente').value.trim();

        if (!nomeCliente) {
            isValid = false;
            displayError('nomeCliente', 'O nome do cliente é obrigatório.');
        }
        if (!cpfCliente) {
            isValid = false;
            displayError('cpfCliente', 'O CPF do cliente é obrigatório.');
        }
        if (!cnsCliente) {
            isValid = false;
            displayError('cnsCliente', 'O CNS do cliente é obrigatório.');
        }
        if (!telefoneCliente) {
            isValid = false;
            displayError('telefoneCliente', 'O telefone do cliente é obrigatório.');
        }

        // Verificar se o CPF, CNS ou telefone já está cadastrado
        if (isValid) {
            checkIfExists(cpfCliente, cnsCliente, telefoneCliente).then(exists => {
                if (exists) {
                    displayError('cpfCliente', 'CPF já cadastrado no banco.');
                    displayError('cnsCliente', 'CNS já cadastrado no banco.');
                    displayError('telefoneCliente', 'Telefone já cadastrado no banco.');
                } else {
                    document.querySelector('.styled-form').submit();
                }
            });
        }
    });

    function displayError(fieldId, message) {
        const field = document.getElementById(fieldId);
        const error = document.createElement('span');
        error.className = 'text-danger';
        error.innerText = message;
        field.parentElement.appendChild(error);
    }

    
</script>
<!-- CSS finalizado aqui (ASS: Duda)-->
 
@include('includes.header')
<link rel="stylesheet" href="{{ url('css/InserirPaciente.css')}}">

<nav class="navbar">
    <div class="navbar-brand">
        <img src="{{ asset('Image/2a.png') }}" alt="Logo" class="logo"> 
    </div>
    <div class="search-container">
        <input type="text" placeholder="Buscar..." class="search-input">
        <button class="search-button"><i class="fas fa-search"></i></button>
    </div>
</nav>

<div class="container-um">
    <div class="jumbotron-um">
        <h1>Cadastrar Cliente</h1>
        <p>Crie novos clientes.</p>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/AdmCriando.png') }}" alt="Cadastro de Clientes" class="img-fluid" />
    </div>
</div>

<!-- MAIN -->
<main>
    <!--Alert para exibir mensagens de sucesso ou erro -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="form-wrapper">
    <form action="/criarCliente" method="POST" class="styled-form">
        @csrf <!-- Token de segurança do Laravel -->

        <div class="form-row">
            <div class="form-group">
                <label for="nomeCliente">
                    <i class="fas fa-user"></i> Nome do Cliente:
                </label>
                <input type="text" id="nomeCliente" name="nomeCliente" required>
            </div>

            <div class="form-group">
                <label for="cpfCliente">
                    <i class="fas fa-id-card"></i> CPF do Cliente:
                </label>
                <input type="text" id="cpfCliente" name="cpfCliente" maxlength="14" required>
                @error('cpfCliente')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="cnsCliente">
                    <i class="fas fa-heartbeat"></i> CNS do Cliente:
                </label>
                <input type="text" id="cnsCliente" name="cnsCliente" maxlength="15" required>
                @error('cnsCliente')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="dataNascCliente">
                    <i class="fas fa-calendar-alt"></i> Data de Nascimento:
                </label>
                <input type="date" id="dataNascCliente" name="dataNascCliente" required>
            </div>

            <div class="form-group">
                <label for="telefoneCliente">
                    <i class="fas fa-phone"></i> Telefone do Cliente:
                </label>
                <input type="text" id="telefoneCliente" name="telefoneCliente" maxlength="11" required>
                @error('telefoneCliente')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group cep-field">
                <label for="cepCliente">
                    <i class="fas fa-map-marker-alt"></i> CEP do Cliente:
                </label>
                <input type="text" id="cepCliente" name="cepCliente" maxlength="9" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group complemento-field">
                <label for="complementoCliente">
                    <i class="fas fa-info-circle"></i> Complemento:
                </label>
                <input type="text" id="complementoCliente" name="complementoCliente">
            </div>

            <div class="form-group">
                <label for="logradouroCliente">
                    <i class="fas fa-road"></i> Logradouro:
                </label>
                <input type="text" id="logradouroCliente" name="logradouroCliente" required readonly>
            </div>

            <div class="form-group">
                <label for="bairroCliente">
                    <i class="fas fa-building"></i> Bairro:
                </label>
                <input type="text" id="bairroCliente" name="bairroCliente" required readonly>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="cidadeCliente">
                    <i class="fas fa-city"></i> Cidade:
                </label>
                <input type="text" id="cidadeCliente" name="cidadeCliente" required readonly>
            </div>

            <div class="form-group">
                <label for="ufCliente">
                    <i class="fas fa-map"></i> UF:
                </label>
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
                <label for="estadoCliente">
                    <i class="fas fa-flag"></i> Estado:
                </label>
                <input type="text" id="estadoCliente" name="estadoCliente" required readonly>
            </div>

            <div class="form-group">
                <label for="numeroCliente">
                    <i class="fas fa-sort-numeric-up"></i> Número:
                </label>
                <input type="text" id="numeroCliente" name="numeroCliente" maxlength="11" required>
            </div>
        </div>

        <div class="button-wrapper">
            <button type="submit" class="submit-btn">
                <i class="fas fa-user-plus"></i> Cadastrar Cliente
            </button>
        </div>
    </form>
</div>

<br><br>

</main>

@include('includes.footer')



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
<!--Vinícius, fiz algumas alterações no modo telefone (ao clicar duas vezes no botão adicionar telefone,
 um modal informativo aparece dizendo que o número total já foi alcançado), Tirei o header pois ele não era necessário 
 e todos os scripts de JS estão  no final da página pois eles são internos. Creio que o front dessa já está ok (ASS: Maria Eduarda)-->

 <!--CSS finalizado OK (ASS:Duda-->
 
@include('includes.header')
<link rel="stylesheet" href="{{ url('css/CadastroUBS.css') }}"> <!--CSS PARA ESSA PÁGINA FICA APENAS NESSE ARQUIVO :)-->

<nav class="navbar">
    <div class="navbar-brand">
        <img src="{{ asset('Image/2a.png')}}" alt="Logo" class="logo">
    </div>
    <div class="search-container">
        <input type="text" placeholder="Buscar..." class="search-input">
        <button class="search-button"><i class="fas fa-search"></i></button>
    </div>
</nav>
<div class="container-um">
    <div class="jumbotron-um">
        <h1>Adicionar UBS</h1>
        <p>Adicione novas UBS no sistema por aqui</p>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/AdicionarEndereço.png')}}" alt="Cadastro de Medicamentos" class="img-fluid" />
    </div>
</div>

<body>
    <div class="container">
        <div class="form-container">
            <form id="ubsForm" action="{{ route('insertUBS') }}" method="POST" enctype="multipart/form-data" onsubmit="return checkCNPJ()">
                @csrf

                <div class="form-row">
                    <div class="form-col">
                        <label for="ubs">
                            <i class="fas fa-hospital"></i> Nome da UBS :
                        </label>
                        <input type="text" name="ubs" id="ubs" required>
                    </div>

                    <div class="form-col">
                        <label for="email">
                            <i class="fas fa-envelope"></i> E-mail :
                        </label>
                        <input type="text" name="email" id="email" required>
                    </div>

                    <div class="form-col">
                        <label for="cnpj">
                            <i class="fas fa-id-card"></i> CNPJ :
                        </label>
                        <input type="text" name="cnpj" id="cnpj" required>
                    </div>

                    <div class="form-col">
                        <label for="cep">
                            <i class="fas fa-map-marker-alt"></i> CEP :
                        </label>
                        <input type="text" name="cep" id="cep" required onblur="buscaCep()">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <label for="logradouro">
                            <i class="fas fa-road"></i> Logradouro :
                        </label>
                        <input type="text" name="logradouro" id="logradouro" required>
                    </div>

                    <div class="form-col">
                        <label for="bairro">
                            <i class="fas fa-home"></i> Bairro :
                        </label>
                        <input type="text" name="bairro" id="bairro" required>
                    </div>

                    <div class="form-col">
                        <label for="cidade">
                            <i class="fas fa-city"></i> Cidade :
                        </label>
                        <input type="text" name="cidade" id="cidade" required>
                    </div>
                    
                    <div class="form-col">
                        <label for="uf">
                            <i class="fas fa-globe"></i> UF :
                        </label>
                        <select name="uf" id="uf" required>
                            <option value="">Selecione o estado</option>
                            <option value="AC">Acre (AC)</option>
                            <option value="AL">Alagoas (AL)</option>
                            <option value="AP">Amapá (AP)</option>
                            <option value="AM">Amazonas (AM)</option>
                            <option value="BA">Bahia (BA)</option>
                            <option value="CE">Ceará (CE)</option>
                            <option value="DF">Distrito Federal (DF)</option>
                            <option value="ES">Espírito Santo (ES)</option>
                            <option value="GO">Goiás (GO)</option>
                            <option value="MA">Maranhão (MA)</option>
                            <option value="MT">Mato Grosso (MT)</option>
                            <option value="MS">Mato Grosso do Sul (MS)</option>
                            <option value="MG">Minas Gerais (MG)</option>
                            <option value="PA">Pará (PA)</option>
                            <option value="PB">Paraíba (PB)</option>
                            <option value="PR">Paraná (PR)</option>
                            <option value="PE">Pernambuco (PE)</option>
                            <option value="PI">Piauí (PI)</option>
                            <option value="RJ">Rio de Janeiro (RJ)</option>
                            <option value="RN">Rio Grande do Norte (RN)</option>
                            <option value="RS">Rio Grande do Sul (RS)</option>
                            <option value="RO">Rondônia (RO)</option>
                            <option value="RR">Roraima (RR)</option>
                            <option value="SC">Santa Catarina (SC)</option>
                            <option value="SP">São Paulo (SP)</option>
                            <option value="SE">Sergipe (SE)</option>
                            <option value="TO">Tocantins (TO)</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <label for="numero">
                            <i class="fas fa-sort-numeric-up"></i> Número:
                        </label>
                        <input type="text" name="numero" id="numero" required>
                    </div>
                    <div class="form-col">
                        <label for="telefone">
                            <i class="fas fa-phone"></i> Telefone :
                        </label>
                        <div id="telefoneContainer">
                            <!-- Os campos de telefone serão adicionados aqui -->
                        </div>
                        <div class="add-phone-container">
                            <button type="button" onclick="addPhoneField()">
                                <i class="fas fa-plus-circle"></i> Adicionar Telefone 
                            </button>
                            <span class="info-text">Você pode adicionar apenas 2 números de telefone.</span> 
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="latitude">
                            <i class="fas fa-map-marker"></i> Latitude :
                        </label>
                        <input type="text" name="latitude" id="latitude" required readonly>
                    </div>
                    <div class="form-col">
                        <label for="longitude">
                            <i class="fas fa-map-marker"></i> Longitude :
                        </label>
                        <input type="text" name="longitude" id="longitude" required readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col full-width">
                        <label for="regiao">
                            <i class="fas fa-globe-americas"></i> Selecione a região :
                        </label>
                        <select id="idRegiao" name="idRegiao" required>
                            <option value="">Selecione a região</option>
                            @foreach($regioes as $r)
                                <option value="{{ $r->idRegiaoUBS }}">{{ $r->nomeRegiaoUBS }}</option>
                            @endforeach           
                        </select>
                    </div>
                </div>

                <button type="submit" class="button">Adicionar UBS</button>
            </form>
        </div>
    </div>
</body>

<!-- Modal para exibir o número atingido de telefones -->
<div id="alertModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <p id="alertText"></p>
    </div>
</div>

@include('includes.footer')

    <script>
        function buscaCep() {
            const cep = document.getElementById('cep').value.replace(/\D/g, ''); // Remove caracteres não numéricos
            if (cep.length === 8) {
                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (!data.erro) {
                            // Preencher os campos de endereço
                            document.getElementById('logradouro').value = data.logradouro;
                            document.getElementById('bairro').value = data.bairro;
                            document.getElementById('cidade').value = data.localidade;
                            document.getElementById('uf').value = data.uf;

                            // Chama a função para buscar latitude e longitude
                            getLatLongNominatim(data.logradouro, data.localidade, data.uf);
                        } else {
                            alert('CEP não encontrado.');
                        }
                    })
                    .catch(() => alert('Erro ao buscar o CEP.'));
            }
        }

        // Função para buscar latitude e longitude usando o Nominatim (OpenStreetMap)
        function getLatLongNominatim(logradouro, cidade, uf) {
            const enderecoCompleto = `${logradouro}, ${cidade}, ${uf}, Brasil`;

            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(enderecoCompleto)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        const location = data[0];
                        document.getElementById('latitude').value = location.lat;
                        document.getElementById('longitude').value = location.lon;
                    } else {
                        alert('Não foi possível obter a latitude e longitude.');
                    }
                })
                .catch(() => alert('Erro ao buscar a latitude e longitude.'));
        }

        // Exibe o modal personalizado com a mensagem desejada
        function showModal(message) {
            document.getElementById("alertText").innerText = message;
            document.getElementById("alertModal").style.display = "block";
        }

        // Fecha o modal
        function closeModal() {
            document.getElementById("alertModal").style.display = "none";
        }

        let phoneCount = 0; // declaração global

        function addPhoneField() {
            if (phoneCount < 2) {
                const container = document.getElementById('telefoneContainer');

                const newField = document.createElement('div');
                newField.className = 'telefone-field';
                newField.innerHTML = `
                    <input type="text" name="telefone[]" placeholder="Número do Telefone" required>
                    <button type="button" class="remove-phone" onclick="removePhoneField(this)">
                        <i class="fas fa-minus-circle"></i>
                    </button>
                `;
                container.appendChild(newField);
                phoneCount++;
            } else {
                showModal("O limite máximo de números de telefone já foi alcançado.");
            }
        }

        function removePhoneField(button) {
            const phoneField = button.parentElement;
            phoneField.remove();
            phoneCount--; // Decrementa o contador ao remover um campo
        }

        // Validação do CNPJ
        function validaCNPJ(cnpj) {
            cnpj = cnpj.replace(/[^\d]+/g, '');

            if (cnpj.length !== 14) {
                return false;
            }

            // Elimina CNPJs inválidos conhecidos
            if (/^(\d)\1+$/.test(cnpj)) {
                return false;
            }

            let tamanho = cnpj.length - 2;
            let numeros = cnpj.substring(0, tamanho);
            let digitos = cnpj.substring(tamanho);
            let soma = 0;
            let pos = tamanho - 7;

            for (let i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2) {
                    pos = 9;
                }
            }

            let resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado !== parseInt(digitos.charAt(0))) {
                return false;
            }

            tamanho = tamanho + 1;
            numeros = cnpj.substring(0, tamanho);
            soma = 0;
            pos = tamanho - 7;

            for (let i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2) {
                    pos = 9;
                }
            }

            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            return resultado === parseInt(digitos.charAt(1));
        }

        function checkCNPJ() {
            const cnpj = document.getElementById('cnpj').value;
            if (!validaCNPJ(cnpj)) {
                alert('CNPJ inválido. Por favor, insira um CNPJ válido.');
                return false;
            }
            return true;
        }

        // Função para garantir o envio correto do formulário
        function submitForm() {
            if (checkCNPJ()) {
                document.getElementById('ubsForm').submit();
            }
        }   
    </script>

@include('includes.header')

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar UBS</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
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

        // Função para adicionar um novo campo de telefone
        function addPhoneField() {
            const container = document.getElementById('telefoneContainer');
            const newField = document.createElement('div');
            newField.className = 'telefone-field';

            newField.innerHTML = `
                <input type="text" name="telefone2" placeholder="Número do Telefone" required>
                <button type="button" class="remove-phone" onclick="removePhoneField(this)">-</button>
            `;

            container.appendChild(newField);
        }

        // Função para remover um campo de telefone
        function removePhoneField(button) {
            const field = button.parentElement;
            field.remove();
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

    <style>
        /* Estilos específicos do formulário */
        .form-container {
            background-color: #f5f5f5;
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            text-align: center;
            color: #333;
        }

        .form-container label {
            font-size: 16px;
            color: #555;
        }

        .form-container input[type="text"],
        .form-container input[type="password"],
        .form-container input[type="file"],
        .form-container select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-container button {
            background-color: #28a745;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        .form-container button:hover {
            background-color: #218838;
        }

        .telefone-field {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }

        .telefone-field input[type="text"] {
            flex: 1;
            margin-right: 5px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .telefone-field button {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px;
            cursor: pointer;
            font-size: 14px;
            width: 40px;
            height: 40px;
        }

        .telefone-field button:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Adicionar uma nova UBS</h1>
        <form id="ubsForm" action="/insertUBS" method="POST" enctype="multipart/form-data" onsubmit="return checkCNPJ()">
            @csrf <!-- Proteção contra CSRF -->

            <label for="nome">Nome da UBS:</label>
            <input type="text" name="ubs" id="ubs" required><br>

            <label for="email">E-mail UBS:</label>
            <input type="text" name="email" id="email" required><br>

            <label for="cnpj">CNPJ da UBS:</label>
            <input type="text" name="cnpj" id="cnpj" required><br>

            <label for="cep">CEP:</label>
            <input type="text" name="cep" id="cep" required onblur="buscaCep()"><br>

            <label for="logradouro">Logradouro:</label>
            <input type="text" name="logradouro" id="logradouro" required><br>

            <label for="bairro">Bairro:</label>
            <input type="text" name="bairro" id="bairro" required><br>

            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" id="cidade" required><br>

            <label for="uf">UF:</label>
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
            </select><br>

            <label for="regiao">Selecione a região:</label>
            <select id="idRegiao" name="idRegiao" required>
                <option value="">Selecione a região</option>
                @foreach($regioes as $r)
                <option value="{{ $r->idRegiaoUBS }}">{{ $r->nomeRegiaoUBS }}</option>
                @endforeach
            </select><br>

            <label for="numero">Número:</label>
            <input type="text" name="numero" id="numero" required><br>

            <label for="foto">Foto da UBS:</label>
            <input type="file" name="fotoUBS" id="fotoUBS"  required><br>
           
            <label for="telefone">Telefones:</label>
            <div id="telefoneContainer">
                <div class="telefone-field">
                    <input type="text" name="telefone" placeholder="Número do Telefone" required>
                    <button type="button" class="remove-phone" onclick="removePhoneField(this)">-</button>
                </div>
            </div>
            <button type="button" onclick="addPhoneField()">Adicionar Telefone</button><br>

            <label for="latitude">Latitude:</label>
            <input type="text" name="latitude" id="latitude" required readonly><br>

            <label for="longitude">Longitude:</label>
            <input type="text" name="longitude" id="longitude" required readonly><br>

            <button type="submit">Adicionar UBS</button>
        </form>
    </div>
</body>

</html>
@include('includes.footer')
<!--CSS OK(ASS: Duda-->

@include('includes.header')
<link rel="stylesheet" href="{{ url('css/CadastroDetentor.css')}}">

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
        <h1>Cadastrar Detentores</h1>
        <p>Crie novos detentores.</p>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/AdmAlterandoSemFundo.png') }}" alt="Cadastro de Medicamentos" class="img-fluid" />
    </div>
</div>

<main>
    <div class="container">
        <div class="form-container">
            <form action="/cadastroDetentor" method="POST" onsubmit="return checkForm()">
                @csrf
                <div class="form-row">
                    <div class="form-col">
                        <label for="nomeDetentor">
                            <i class="fas fa-user"></i> Nome do Detentor
                        </label>
                        <input type="text" class="form-control" id="nomeDetentor" name="nome" required>
                    </div>
                    <div class="form-col">
                        <label for="emailDetentor">
                            <i class="fas fa-envelope"></i> Email
                        </label>
                        <input type="email" class="form-control" id="emailDetentor" name="email" required>
                    </div>
                    <div class="form-col">
                        <label for="cnpjDetentor">
                            <i class="fas fa-id-card"></i> CNPJ
                        </label>
                        <input type="text" class="form-control" id="cnpjDetentor" name="cnpj" required>
                        <span id="cnpjError" class="text-danger" style="display: none;">CNPJ inválido.</span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label for="cepDetentor">
                            <i class="fas fa-map-marked-alt"></i> CEP
                        </label>
                        <input type="text" class="form-control" id="cepDetentor" name="cep" required>
                        <span id="cepError" class="text-danger" style="display: none;">CEP inválido.</span>
                    </div>
                    <div class="form-col">
                        <label for="logradouroDetentor">
                            <i class="fas fa-road"></i> Logradouro
                        </label>
                        <input type="text" class="form-control" id="logradouroDetentor" name="logradouro" required>
                    </div>
                    <div class="form-col">
                        <label for="bairroDetentor">
                            <i class="fas fa-home"></i> Bairro
                        </label>
                        <input type="text" class="form-control" id="bairroDetentor" name="bairro" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label for="cidadeDetentor">
                            <i class="fas fa-city"></i> Cidade
                        </label>
                        <input type="text" class="form-control" id="cidadeDetentor" name="cidade" required>
                    </div>
                    <div class="form-col">
                        <label for="estadoDetentor">
                            <i class="fas fa-globe-americas"></i> Estado
                        </label>
                        <input type="text" class="form-control" id="estadoDetentor" name="estado" required>
                    </div>
                    <div class="form-col">
                        <label for="numeroDetentor">
                            <i class="fas fa-sort-numeric-up"></i> Número
                        </label>
                        <input type="text" class="form-control" id="numeroDetentor" name="numero" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label for="complementoDetentor">
                            <i class="fas fa-plus"></i> Complemento
                        </label>
                        <input type="text" class="form-control" id="complementoDetentor" name="complemento" required>
                    </div>
                </div>
                <button type="submit" class="button">Cadastrar</button>
            </form>
        </div>
    </div>
</main>
    <script>
        // Função de validação do CNPJ
        function validaCNPJ(cnpj) {
            cnpj = cnpj.replace(/[^\d]+/g, ''); // Remove caracteres não numéricos

                if (cnpj.length !== 14) {
                    return false; // CNPJ deve ter 14 dígitos
                }

                // Elimina CNPJs inválidos conhecidos
                if (/^(\d)\1+$/.test(cnpj)) {
                    return false; // Elimina sequências repetidas (ex: 11111111111111)
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
                    return false; // O primeiro dígito verificador está incorreto
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
                return resultado === parseInt(digitos.charAt(1)); // Retorna se o segundo dígito verificador está correto
            }

            function checkCNPJ() {
                const cnpj = document.getElementById('cnpjDetentor').value;
                if (!validaCNPJ(cnpj)) {
                    alert('CNPJ inválido. Por favor, insira um CNPJ válido.'); // Alerta para CNPJ inválido
                    document.getElementById('cnpjError').style.display = 'inline'; // Exibe mensagem de erro
                    return false;
                }
                document.getElementById('cnpjError').style.display = 'none'; // Esconde a mensagem de erro se válido
                return true; // Retorna true se o CNPJ for válido
            }

            function formatCNPJ() {
                const cnpjInput = document.getElementById('cnpjDetentor');
                let cnpj = cnpjInput.value.replace(/\D/g, ''); // Remove caracteres não numéricos

                if (cnpj.length <= 14) {
                    cnpj = cnpj.replace(/(\d{2})(\d)/, "$1.$2"); // 00.0
                    cnpj = cnpj.replace(/(\d{3})(\d)/, "$1.$2"); // 00.000
                    cnpj = cnpj.replace(/(\d{3})(\d{1,2})$/, "$1/$2"); // 00.000/0000
                    cnpj = cnpj.replace(/(\d{4})(\d)/, "$1-$2"); // 0000-00
                }

                cnpjInput.value = cnpj; // Atualiza o valor do campo
            }

            // Validação e formatação ao perder o foco (blur)
            document.getElementById('cnpjDetentor').addEventListener('blur', function() {
                checkCNPJ();
                formatCNPJ();
            });

            // Função para validar o CEP
            function validaCEP(cep) {
                cep = cep.replace(/[^\d]+/g, ''); // Remove caracteres não numéricos
                return cep.length === 8; // CEP deve ter 8 dígitos
            }

            function checkCEP() {
                const cep = document.getElementById('cepDetentor').value;
                if (!validaCEP(cep)) {
                    alert('CEP inválido. Por favor, insira um CEP válido.'); // Alerta para CEP inválido
                    document.getElementById('cepError').style.display = 'inline'; // Exibe mensagem de erro
                    return false;
                }
                document.getElementById('cepError').style.display = 'none'; // Esconde a mensagem de erro se válido
                return true; // Retorna true se o CEP for válido
            }

            function formatCEP() {
                const cepInput = document.getElementById('cepDetentor');
                let cep = cepInput.value.replace(/\D/g, ''); // Remove caracteres não numéricos

                if (cep.length <= 8) {
                    cep = cep.replace(/(\d{5})(\d)/, "$1-$2"); // 00000-00
                }

                cepInput.value = cep; // Atualiza o valor do campo
            }

            // Função para buscar o endereço pelo CEP
            function buscarEnderecoPorCEP(cep) {
                const url = `https://viacep.com.br/ws/${cep}/json/`;

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        if (!data.erro) {
                            document.getElementById('logradouroDetentor').value = data.logradouro;
                            document.getElementById('bairroDetentor').value = data.bairro;
                            document.getElementById('cidadeDetentor').value = data.localidade;
                            document.getElementById('estadoDetentor').value = data.uf;
                        } else {
                            alert('CEP não encontrado.'); // Alerta se o CEP não existir
                        }
                    })
                    .catch(error => {
                        console.error('Erro ao buscar o endereço:', error);
                        alert('Erro ao buscar o endereço.'); // Alerta em caso de erro
                    });
            }

            // Verifica e busca o endereço ao perder o foco no campo CEP
            document.getElementById('cepDetentor').addEventListener('blur', function() {
                const cep = this.value.replace(/\D/g, ''); // Remove caracteres não numéricos
                formatCEP();
                if (validaCEP(cep)) {
                    buscarEnderecoPorCEP(cep);
                }
            });

            // Verifica o formulário antes de enviar
            function checkForm() {
                return checkCNPJ() && checkCEP();
            }
    </script>
@include('includes.footer')

           
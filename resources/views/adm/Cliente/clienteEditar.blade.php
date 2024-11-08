<!--CSS completo (ASS: Duda) Cuidado pois estão estou usando um para duas páginas-->

@include('includes.header')
<link rel="stylesheet" href="{{ url('css/InserirPaciente.css')}}">

<nav class="navbar">
    <div class="navbar-brand">
        <img src="{{ asset('Image/2a.png') }}" alt="Logo" class="logo"> 
    </div>
    <div class="search-container">
        <input type="text" placeholder="Buscar..." class="search-input" style="border-radius: 30px;">
        <button class="search-button"><i class="fas fa-search"></i></button>
    </div>
</nav>

<div class="container-um">
    <div class="jumbotron-um">
        <h1>Editar Cliente</h1>
        <p>Edite os clientes já existentes.</p>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/AdmCriando.png') }}" alt="Edição de Clientes" class="img-fluid" />
    </div>
</div>

<!-- MAIN -->
<main>
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

    <div class="form-wrapper">
        <form action="{{ route('cliente.update', $cliente->idCliente) }}" method="POST" class="styled-form">
            @csrf
            @method('PUT') <!-- Método PUT para atualização -->

            <div class="form-row">
                <div class="form-group">
                    <label for="nomeCliente"><i class="fas fa-user"></i> Nome do Cliente:</label>
                    <input type="text" id="nomeCliente" name="nomeCliente" value="{{ $cliente->nomeCliente }}" required>
                </div>

                <div class="form-group">
                    <label for="cpfCliente"><i class="fas fa-id-card"></i> CPF do Cliente:</label>
                    <input type="text" id="cpfCliente" name="cpfCliente" maxlength="11" value="{{ $cliente->cpfCliente }}" required>
                </div>

                <div class="form-group">
                    <label for="cnsCliente"><i class="fas fa-hospital-user"></i> CNS do Cliente:</label>
                    <input type="text" id="cnsCliente" name="cnsCliente" maxlength="15" value="{{ $cliente->cnsCliente }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="dataNascCliente"><i class="fas fa-calendar-alt"></i> Data de Nascimento:</label>
                    <input type="date" id="dataNascCliente" name="dataNascCliente" value="{{ $cliente->dataNascCliente }}" required>
                </div>

                <div class="form-group">
                    <label for="userCliente"><i class="fas fa-user-circle"></i> Usuário:</label>
                    <input type="text" id="userCliente" name="userCliente" value="{{ $cliente->userCliente }}" required>
                </div>

                <div class="form-group">
                    <label for="numeroTelefoneCliente"><i class="fas fa-phone"></i> Novo Telefone do Cliente:</label>
                    <input type="text" id="numeroTelefoneCliente" name="numeroTelefoneCliente" maxlength="15" oninput="mascaraTelefone(this)" value="{{ $telefone->numeroTelefoneCliente }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group cep-field">
                    <label for="cepCliente"><i class="fas fa-map-marker-alt"></i> CEP do Cliente:</label>
                    <input type="text" id="cepCliente" name="cepCliente" maxlength="8" value="{{ $cliente->cepCliente }}" required>
                </div>

                <div class="form-group complemento-field">
                    <label for="complementoCliente"><i class="fas fa-info-circle"></i> Complemento:</label>
                    <input type="text" id="complementoCliente" name="complementoCliente" value="{{ $cliente->complementoCliente }}">
                </div>

                <div class="form-group">
                    <label for="logradouroCliente"><i class="fas fa-road"></i> Logradouro:</label>
                    <input type="text" id="logradouroCliente" name="logradouroCliente" value="{{ $cliente->logradouroCliente }}" required readonly>
                </div>

                <div class="form-group">
                    <label for="bairroCliente"><i class="fas fa-home"></i> Bairro:</label>
                    <input type="text" id="bairroCliente" name="bairroCliente" value="{{ $cliente->bairroCliente }}" required readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="cidadeCliente"><i class="fas fa-city"></i> Cidade:</label>
                    <input type="text" id="cidadeCliente" name="cidadeCliente" value="{{ $cliente->cidadeCliente }}" required readonly>
                </div>

                <div class="form-group">
                    <label for="ufCliente"><i class="fas fa-globe"></i> UF:</label>
                    <input type="text" id="ufCliente" name="ufCliente" value="{{ $cliente->ufCliente }}" required readonly>
                </div>

                <div class="form-group">
                    <label for="estadoCliente"><i class="fas fa-map"></i> Estado:</label>
                    <input type="text" id="estadoCliente" name="estadoCliente" value="{{ $cliente->estadoCliente }}" required>
                </div>

                <div class="form-group">
                    <label for="numeroCliente"><i class="fas fa-sort-numeric-up-alt"></i> Número:</label>
                    <input type="text" id="numeroCliente" name="numeroCliente" maxlength="11" value="{{ $cliente->numeroCliente }}" required>
                </div>
            </div>

            <div class="form-group button-wrapper">
                <button type="submit" class="submit-btn">Atualizar Cliente</button>
            </div>
        </form>
    </div>
</main>

@include('includes.footer')

<!-- Script para buscar endereço usando a API do ViaCEP -->
<script>
    // Máscara para o telefone
    function mascaraTelefone(input) {
        var valor = input.value.replace(/\D/g, '');
        if (valor.length <= 10) {
            input.value = valor.replace(/(\d{2})(\d)/, '($1) $2').replace(/(\d)(\d{4})$/, '$1-$2');
        } else {
            input.value = valor.replace(/(\d{2})(\d)(\d{4})(\d+)/, '($1) $2 $3-$4');
        }
    }

    // API ViaCEP
    document.getElementById('cepCliente').addEventListener('blur', function() {
        var cep = this.value.replace(/\D/g, '');
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if(validacep.test(cep)) {
                document.getElementById('logradouroCliente').value = '...';
                document.getElementById('bairroCliente').value = '...';
                document.getElementById('cidadeCliente').value = '...';
                document.getElementById('ufCliente').value = '...';
                
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
                    });
            } else {
                alert("Formato de CEP inválido.");
            }
        }
    });
</script>
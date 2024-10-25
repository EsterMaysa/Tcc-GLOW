@include('includes.header') <!-- include -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar UBS</title>
    <!-- Adicionando Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        h2 {
            margin-bottom: 30px;
            color: #343a40;
        }
        label {
            font-weight: bold;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        function buscaCep() {
            const cep = document.getElementById('cepUBS').value.replace(/\D/g, ''); // Remove caracteres não numéricos
            if (cep.length === 8) {
                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (!data.erro) {
                            // Preencher os campos de endereço
                            document.getElementById('logradouroUBS').value = data.logradouro;
                            document.getElementById('bairroUBS').value = data.bairro;
                            document.getElementById('cidadeUBS').value = data.localidade;
                            document.getElementById('ufUBS').value = data.uf;

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
                        document.getElementById('latitudeUBS').value = location.lat;
                        document.getElementById('longitudeUBS').value = location.lon;
                    } else {
                        alert('Não foi possível obter a latitude e longitude.');
                    }
                })
                .catch(() => alert('Erro ao buscar a latitude e longitude.'));
        }
    </script>
</head>
<body>
<div class="container">
    <h2>Atualizar UBS</h2>
    <form action="{{ route('ubs.update', $ubs->idUBS) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nomeUBS">Nome UBS:</label>
            <input type="text" class="form-control" name="nomeUBS" value="{{ $ubs->nomeUBS }}" required>
        </div>

        <div class="form-group">
            <label for="emailUBS">E-mail:</label>
            <input type="email" class="form-control" name="emailUBS" value="{{ $ubs->emailUBS }}" required>
        </div>

        <div class="form-group">
            <label for="fotoUBS">Foto:</label>
            <input type="text" class="form-control" name="fotoUBS" value="{{ $ubs->fotoUBS }}" required>
        </div>

        <div class="form-group">
            <label for="cnpjUBS">CNPJ:</label>
            <input type="text" class="form-control" name="cnpjUBS" value="{{ $ubs->cnpjUBS }}" required>
        </div>

        <div class="form-group">
            <label for="cepUBS">CEP:</label>
            <input type="text" class="form-control" name="cepUBS" id="cepUBS" value="{{ $ubs->cepUBS }}" required onblur="buscaCep()">
        </div>

        <div class="form-group">
            <label for="logradouroUBS">Logradouro:</label>
            <input type="text" class="form-control" name="logradouroUBS" id="logradouroUBS" value="{{ $ubs->logradouroUBS }}" required>
        </div>

        <div class="form-group">
            <label for="bairroUBS">Bairro:</label>
            <input type="text" class="form-control" name="bairroUBS" id="bairroUBS" value="{{ $ubs->bairroUBS }}" required>
        </div>

        <div class="form-group">
            <label for="cidadeUBS">Cidade:</label>
            <input type="text" class="form-control" name="cidadeUBS" id="cidadeUBS" value="{{ $ubs->cidadeUBS }}" required>
        </div>

        <div class="form-group">
            <label for="ufUBS">UF:</label>
            <input type="text" class="form-control" name="ufUBS" id="ufUBS" value="{{ $ubs->ufUBS }}" required>
        </div>

        <div class="form-group">
            <label for="latitudeUBS">Latitude:</label>
            <input type="text" class="form-control" name="latitudeUBS" id="latitudeUBS" value="{{ $ubs->latitudeUBS }}" required readonly>
        </div>

        <div class="form-group">
            <label for="longitudeUBS">Longitude:</label>
            <input type="text" class="form-control" name="longitudeUBS" id="longitudeUBS" value="{{ $ubs->longitudeUBS }}" required readonly>
        </div>

        <div class="form-group">
            <label for="numeroUBS">Número:</label>
            <input type="text" class="form-control" name="numeroUBS" value="{{ $ubs->numeroUBS }}" required>
        </div>

        <div class="form-group">
            <label for="complementoUBS">Complemento:</label>
            <input type="text" class="form-control" name="complementoUBS" value="{{ $ubs->complementoUBS }}">
        </div>

        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" name="telefone" id="telefone" value="{{ $telefone->numeroTelefoneUBS }}" required>
        </div>

        <div class="form-group">
            <label for="telefone2">Telefone:</label>
            <input type="text" class="form-control" name="telefone2" id="telefone2" value="{{ $telefone->numeroTelefoneUBS2 }}" required>
        </div>

        <label for="idRegiao">Selecione a região:</label>
        <select id="idRegiao" name="idRegiao" required>
            <option value="">Selecione a região</option>
            @foreach($regioes as $r)
                <option value="{{ $r->idRegiaoUBS }}" {{ $r->idRegiaoUBS == $ubs->idRegiaoUBS ? 'selected' : '' }}>
                    {{ $r->nomeRegiaoUBS }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-custom">Atualizar</button>
    </form>
</div>

</body>
</html>

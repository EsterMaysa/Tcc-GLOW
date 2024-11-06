<!--CSS finalizado OK (ASS:Duda-->

@include('includes.header') <!-- include -->
<link rel="stylesheet" href="{{ url('css/EditarUBS.css')}}">    

<nav class="navbar">
    <div class="navbar-brand">
        <img src="{{ asset('Image/2a.png')}}" alt="Logo" class="logo"> 
    </div>
    <div class="search-container">
        <input type="text" placeholder="Buscar..." class="search-input" style="border-radius: 40px; margin-right: 10px; ">
        <button class="search-button"><i class="fas fa-search" style="color: #fff;"></i></button>
    </div>
</nav>

<div class="container-um">
    <div class="jumbotron-um">
        <h1 style="font-weight: bold;">Editar UBS</h1>
        <p>edite UBS já existentes.</p>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/AdmTrabalhandoSemFundo.png')}}" alt="Cadastro de Medicamentos" class="img-fluid" />
    </div>
</div>


<body>
    <div class="container">
        <div class="form-container">
            <form action="{{ route('ubs.update', $ubs->idUBS) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    @method('PUT')

                    <div class="form-row">
                        <div class="form-col">
                            <label for="nomeUBS">
                                <i class="fas fa-building"></i> Nome UBS:
                            </label>
                            <input type="text" name="nomeUBS" value="{{ $ubs->nomeUBS }}" required>
                        </div>

                        <div class="form-col">
                            <label for="emailUBS">
                                <i class="fas fa-envelope"></i> E-mail:
                            </label>
                            <input type="email" name="emailUBS" value="{{ $ubs->emailUBS }}" required>
                        </div>

                        <div class="form-col">
                            <label for="fotoUBS">
                                <i class="fas fa-camera"></i> Foto:
                            </label>
                            <input type="text" name="fotoUBS" value="{{ $ubs->fotoUBS }}" required>
                        </div>

                        <div class="form-col">
                            <label for="cnpjUBS">
                                <i class="fas fa-id-card"></i> CNPJ:
                            </label>
                            <input type="text" name="cnpjUBS" value="{{ $ubs->cnpjUBS }}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="cepUBS">
                                <i class="fas fa-map-pin"></i> CEP:
                            </label>
                            <input type="text" name="cepUBS" id="cepUBS" value="{{ $ubs->cepUBS }}" required onblur="buscaCep()">
                        </div>

                        <div class="form-col">
                            <label for="logradouroUBS">
                                <i class="fas fa-road"></i> Logradouro:
                            </label>
                            <input type="text" name="logradouroUBS" id="logradouroUBS" value="{{ $ubs->logradouroUBS }}" required>
                        </div>

                        <div class="form-col">
                            <label for="bairroUBS">
                                <i class="fas fa-home"></i> Bairro:
                            </label>
                            <input type="text" name="bairroUBS" id="bairroUBS" value="{{ $ubs->bairroUBS }}" required>
                        </div>

                        <div class="form-col">
                            <label for="cidadeUBS">
                                <i class="fas fa-city"></i> Cidade:
                            </label>
                            <input type="text" name="cidadeUBS" id="cidadeUBS" value="{{ $ubs->cidadeUBS }}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="ufUBS">
                                <i class="fas fa-flag"></i> UF:
                            </label>
                            <input type="text" name="ufUBS" id="ufUBS" value="{{ $ubs->ufUBS }}" required>
                        </div>

                        <div class="form-col">
                            <label for="latitudeUBS">
                                <i class="fas fa-map-marker-alt"></i> Latitude:
                            </label>
                            <input type="text" name="latitudeUBS" id="latitudeUBS" value="{{ $ubs->latitudeUBS }}" required readonly>
                        </div>

                        <div class="form-col">
                            <label for="longitudeUBS">
                                <i class="fas fa-map-marker-alt"></i> Longitude:
                            </label>
                            <input type="text" name="longitudeUBS" id="longitudeUBS" value="{{ $ubs->longitudeUBS }}" required readonly>
                        </div>

                        <div class="form-col">
                            <label for="numeroUBS">
                                <i class="fas fa-hashtag"></i> Número:
                            </label>
                            <input type="text" name="numeroUBS" value="{{ $ubs->numeroUBS }}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="complementoUBS">
                                <i class="fas fa-plus"></i> Complemento:
                            </label>
                            <input type="text" name="complementoUBS" value="{{ $ubs->complementoUBS }}">
                        </div>

                        <div class="form-col">
                            <label for="telefone">
                                <i class="fas fa-phone"></i> Telefone:
                            </label>
                            <input type="text" name="telefone" id="telefone" value="{{ $telefone->numeroTelefoneUBS }}" required>
                        </div>

                        <div class="form-col">
                            <label for="telefone2">
                                <i class="fas fa-phone"></i> Telefone 2:
                            </label>
                            <input type="text" name="telefone2" id="telefone2" value="{{ $telefone->numeroTelefoneUBS2 }}" required>
                        </div>
                    </div>

                    <label for="idRegiao">
                        <i class="fas fa-clipboard-list"></i> Selecione a região:
                    </label>
                    <select id="idRegiao" name="idRegiao" required>
                        <option value="">Selecione a região</option>
                        @foreach($regioes as $r)
                            <option value="{{ $r->idRegiaoUBS }}" {{ $r->idRegiaoUBS == $ubs->idRegiaoUBS ? 'selected' : '' }}>
                                {{ $r->nomeRegiaoUBS }}
                            </option>
                        @endforeach
                    </select>
                <button type="submit" class="btn btn-custom"><i class="fas fa-sync-alt" style="color: #fff;"></i> Atualizar</button>
            </form>
        </div>
    </div>
</body>
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

@include('includes.footer') <!-- include -->
<!--CSS OK (ASS:Duda)-->

@include('includes.header') <!-- Include do Header -->
<link rel="stylesheet" href="{{ url('css/CadastroMedicamento.css')}}">

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
        <h1>Cadastro de Medicamentos</h1>
        <p>Cadastre novos medicamentos.</p>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/medicamento.png') }}" alt="Cadastro de Medicamentos" class="img-fluid" />
    </div>
</div>

<!-- COMEÇO DA TAG MAIN -->
<main>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="container">
        <div class="form-container">
            <form action="/cadastroMed" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-col">
                        <label for="codigoDeBarrasMedicamento">
                            <i class="fas fa-barcode"></i> Código de Barras :
                        </label>
                        <input type="text" class="form-control" id="codigoDeBarrasMedicamento" name="codigoDeBarras" value="{{ old('codigoDeBarras', $formData['codigoDeBarras'] ?? '') }}" required>
                    </div>

                    <div class="form-col">
                        <label for="nomeMedicamento">
                            <i class="fas fa-pills"></i> Nome do Medicamento :
                        </label>
                        <input type="text" class="form-control" id="nomeMedicamento" name="nome" value="{{ old('nome', $formData['nome'] ?? '') }}" required>
                    </div>

                    <div class="form-col">
                        <label for="nomeGenericoMedicamento">
                            <i class="fas fa-capsules"></i> Nome Genérico
                        </label>
                        <input type="text" class="form-control" id="nomeGenericoMedicamento" name="nomeGenerico" value="{{ old('nomeGenerico', $formData['nomeGenerico'] ?? '') }}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label for="registroAnvisaMedicamento">
                            <i class="fas fa-file-medical-alt"></i> Registro ANVISA
                        </label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="registroAnvisa" id="registroSim" value="Deferido" {{ old('registroAnvisa', $formData['registroAnvisa'] ?? '') == 'Deferido' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="registroSim">Deferido</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="registroAnvisa" id="registroNao" value="Indeferido" {{ old('registroAnvisa', $formData['registroAnvisa'] ?? '') == 'Indeferido' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="registroNao">Indeferido</label>
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="fotoMedicamentoOriginal">
                            <i class="fas fa-image"></i> Foto Medicamento Original
                        </label>
                        <input type="file" class="form-control" id="fotoMedicamentoOriginal" name="fotoOriginal" required>
                    </div>
                    <div class="form-col">
                        <label for="fotoMedicamentoGenero">
                            <i class="fas fa-image"></i> Foto Medicamento Genérico
                        </label>
                        <input type="file" class="form-control" id="fotoMedicamentoGenero" name="fotoGenero" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label for="idDetentor">
                            <i class="fas fa-user-tag"></i> Detentor
                        </label>
                        <div class="input-group">
                            <select class="form-control" id="idDetentor" name="idDetentor" required>
                                <option value="">Selecione o Detentor</option>
                                @foreach($detentores as $d)
                                <option value="{{ $d->idDetentor }}" {{ old('idDetentor', $formData['idDetentor'] ?? '') == $d->idDetentor ? 'selected' : '' }}>
                                    {{ $d->nomeDetentor }}
                                </option>
                                @endforeach
                            </select>
                            <a href="{{ route('NewDetentor', ['formData' => old()]) }}" class="btn btn-success">
                                <i class="fas fa-plus icon" style="color: #384081"></i>
                            </a>
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="idTipoMedicamento">
                            <i class="fas fa-pump-medical"></i> Tipo de Medicamento
                        </label>
                        <div class="input-group">
                            <select class="form-control" id="idTipoMedicamento" name="idTipo" required>
                                <option value="">Selecione o Tipo de Medicamento</option>
                                @foreach($tiposMedicamento as $t)
                                <option value="{{ $t->idTipoMedicamento }}" {{ old('idTipo', $formData['idTipo'] ?? '') == $t->idTipoMedicamento ? 'selected' : '' }}>
                                    {{ $t->tipoMedicamento }}
                                </option>
                                @endforeach
                            </select>
                            <a href="{{ route('TipoMedicamento', ['formData' => old()]) }}" class="btn btn-success">
                                <i class="fas fa-plus" style="color: #384081"></i>
                            </a>
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="formaFarmaceuticaMedicamento">
                            <i class="fas fa-prescription-bottle-alt"></i> Forma Farmacêutica
                        </label>
                        <select class="form-control" id="formaFarmaceuticaMedicamento" name="formaFarmaceutica" required>
                            <option value="">Selecione a Forma Farmacêutica</option>
                            <option value="Comprimido" {{ old('formaFarmaceutica', $formData['formaFarmaceutica'] ?? '') == 'Comprimido' ? 'selected' : '' }}>Comprimido</option>
                            <option value="Cápsula" {{ old('formaFarmaceutica', $formData['formaFarmaceutica'] ?? '') == 'Cápsula' ? 'selected' : '' }}>Cápsula</option>
                            <option value="Pomada" {{ old('formaFarmaceutica', $formData['formaFarmaceutica'] ?? '') == 'Pomada' ? 'selected' : '' }}>Pomada</option>
                            <option value="Solução" {{ old('formaFarmaceutica', $formData['formaFarmaceutica'] ?? '') == 'Solução' ? 'selected' : '' }}>Solução</option>
                            <option value="Suspensão" {{ old('formaFarmaceutica', $formData['formaFarmaceutica'] ?? '') == 'Suspensão' ? 'selected' : '' }}>Suspensão</option>
                            <option value="Creme" {{ old('formaFarmaceutica', $formData['formaFarmaceutica'] ?? '') == 'Creme' ? 'selected' : '' }}>Creme</option>
                            <option value="Gel" {{ old('formaFarmaceutica', $formData['formaFarmaceutica'] ?? '') == 'Gel' ? 'selected' : '' }}>Gel</option>
                            <option value="Injeção" {{ old('formaFarmaceutica', $formData['formaFarmaceutica'] ?? '') == 'Injeção' ? 'selected' : '' }}>Injeção</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label for="concentracaoMedicamento">
                            <i class="fas fa-vial"></i> Concentração
                        </label>
                        <input type="text" class="form-control" id="concentracaoMedicamento" name="concentracao" value="{{ old('concentracao', $formData['concentracao'] ?? '') }}" required>
                    </div>
                    <div class="form-col">
                        <label for="composicaoMedicamento">
                            <i class="fas fa-clipboard-list"></i> Composição
                        </label>
                        <textarea class="form-control" id="composicaoMedicamento" name="composicao" required>{{ old('composicao', $formData['composicao'] ?? '') }}</textarea>
                    </div>
                    <div class="form-col">
                        <button type="submit" class="salvar">
                            <i class="fas fa-save"></i> Salvar Medicamento
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@include('includes.footer') <!-- Include do Footer -->
@include('includes.header') <!-- Include do Header -->

<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Cadastro Medicamentos</h1>
        </div>
    </div>
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

    <form action="/cadastroMed" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="codigoDeBarrasMedicamento">Código de Barras</label>
            <input type="text" class="form-control" id="codigoDeBarrasMedicamento" name="codigoDeBarras" value="{{ old('codigoDeBarras', $formData['codigoDeBarras'] ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="nomeMedicamento">Nome do Medicamento</label>
            <input type="text" class="form-control" id="nomeMedicamento" name="nome"
                value="{{ old('nome', $formData['nome'] ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="nomeGenericoMedicamento">Nome Genérico</label>
            <input type="text" class="form-control" id="nomeGenericoMedicamento" name="nomeGenerico"
                value="{{ old('nomeGenerico', $formData['nomeGenerico'] ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="registroAnvisaMedicamento">Registro ANVISA</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="registroAnvisa" id="registroSim" value="Deferido"
                    {{ old('registroAnvisa', $formData['registroAnvisa'] ?? '') == 'Deferido' ? 'checked' : '' }} required>
                <label class="form-check-label" for="registroSim">Deferido</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="registroAnvisa" id="registroNao" value="Indeferido"
                    {{ old('registroAnvisa', $formData['registroAnvisa'] ?? '') == 'Indeferido' ? 'checked' : '' }} required>
                <label class="form-check-label" for="registroNao">Indeferido</label>
            </div>
        </div>

        <div class="form-group">
            <label for="fotoMedicamentoOriginal">Foto Medicamento Original</label>
            <input type="file" class="form-control" id="fotoMedicamentoOriginal" name="fotoOriginal" required>
        </div>

        <div class="form-group">
            <label for="fotoMedicamentoGenero">Foto Medicamento Genérico</label>
            <input type="file" class="form-control" id="fotoMedicamentoGenero" name="fotoGenero" required>
        </div>

        <div class="form-group">
            <label for="idDetentor">Detentor</label>
            <div class="input-group">
                <select class="form-control" id="idDetentor" name="idDetentor" required>
                    <option value="">Selecione o Detentor</option>
                    @foreach($detentores as $d)
                    <option value="{{ $d->idDetentor }}" {{ old('idDetentor', $formData['idDetentor'] ?? '') == $d->idDetentor ? 'selected' : '' }}>
                        {{ $d->nomeDetentor }}
                    </option>
                    @endforeach
                </select>
                <!-- Botão para redirecionar ao cadastro de detentor -->
                <a href="{{ route('NewDetentor', ['formData' => old()]) }}" class="btn btn-success">+</a>
            </div>
        </div>

        <div class="form-group">
            <label for="idTipoMedicamento">Tipo de Medicamento</label>
            <div class="input-group">
                <select class="form-control" id="idTipoMedicamento" name="idTipo" required>
                    <option value="">Selecione o Tipo de Medicamento</option>
                    @foreach($tiposMedicamento as $t)
                    <option value="{{ $t->idTipoMedicamento }}" {{ old('idTipo', $formData['idTipo'] ?? '') == $t->idTipoMedicamento ? 'selected' : '' }}>
                        {{ $t->tipoMedicamento }}
                    </option>
                    @endforeach
                </select>
                <!-- Botão para redirecionar ao cadastro de tipo de medicamento -->
                <a href="{{ route('TipoMedicamento', ['formData' => old()]) }}" class="btn btn-success">+</a>
            </div>
        </div>

        <div class="form-group">
            <label for="formaFarmaceuticaMedicamento">Forma Farmacêutica</label>
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

        <div class="form-group">
            <label for="concentracaoMedicamento">Concentração</label>
            <input type="text" class="form-control" id="concentracaoMedicamento" name="concentracao"
                value="{{ old('concentracao', $formData['concentracao'] ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="composicaoMedicamento">Composição</label>
            <textarea class="form-control" id="composicaoMedicamento" name="composicao" required>{{ old('composicao', $formData['composicao'] ?? '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Medicamento</button>
    </form>

</main>
<!-- END MAIN -->

@include('includes.footer') <!-- Include do Footer -->
<!--CSS OK (ASS:Duda)-->

<!-- AQUI VAI A PAGINA DESTINADA AS FUNCIONALIDADES DO MEDICAMENTO -->
<!-- Essa pagina será para edição, portanto o formulário estará preenchido com os dados do medicamento -->

@include('includes.header') <!-- include do header -->
<link rel="stylesheet" href="{{ url('css/CadastroMedicamento.css') }}">

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
        <h1>Editar Medicamento</h1>
    </div>
</div>

<!-- MAIN -->
<main>
    <div class="container">
        <div class="form-container">
            <form action="{{ route('medicamento.update', $medicamento->idMedicamento) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Primeira linha de campos -->
                <div class="form-row">
                    <div class="form-col">
                        <label for="codigoDeBarrasMedicamento">
                            <i class="fas fa-barcode"></i> Código de Barras
                        </label>
                        <input type="text" class="form-control" id="codigoDeBarrasMedicamento" name="codigoDeBarras" value="{{ $medicamento->codigoDeBarrasMedicamento }}" readonly required>
                    </div>

                    <div class="form-col">
                        <label for="nomeMedicamento">Nome do Medicamento</label>
                        <input type="text" class="form-control" id="nomeMedicamento" name="nome" value="{{ $medicamento->nomeMedicamento }}" required>
                    </div>

                    <div class="form-col">
                        <label for="nomeGenericoMedicamento">Nome Genérico</label>
                        <input type="text" class="form-control" id="nomeGenericoMedicamento" name="nomeGenerico" value="{{ $medicamento->nomeGenericoMedicamento }}" required>
                    </div>
                </div>

                <!-- Segunda linha de campos -->
                <div class="form-row">
                    <div class="form-col">
                        <label for="fotoMedicamentoOriginal">Foto Medicamento Original</label><br>
                        <img id="imgPreviewOriginal" src="{{ asset('storage/' . $medicamento->fotoMedicamentoOriginal) }}" alt="Foto do Medicamento Original" style="max-width: 150px; cursor: pointer;" onclick="document.getElementById('fotoOriginal').click();">
                        <input type="file" id="fotoOriginalMedicamento" name="fotoOriginalMedicamento" style="display: none;" onchange="previewImage(event, 'imgPreviewOriginal')">
                    </div>

                    <div class="form-col">
                        <label for="fotoMedicamentoGenero">Foto Medicamento Genérico</label><br>
                        <img id="imgPreviewGenero" src="{{ asset('storage/' . $medicamento->fotoMedicamentoGenero) }}" alt="Foto do Medicamento Genérico" style="max-width: 150px; cursor: pointer;" onclick="document.getElementById('fotoGenero').click();">
                        <input type="file" id="fotoGenericoMedicamento" name="fotoGenericoMedicamento" style="display: none;" onchange="previewImage(event, 'imgPreviewGenero')">
                    </div>

                    <div class="form-col">
                        <label for="registroAnvisaMedicamento">Registro ANVISA</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="registroAnvisa" id="registroSim" value="Deferido" {{ $medicamento->registroAnvisaMedicamento == 'D' ||  $medicamento->registroAnvisaMedicamento == 'on' ? 'checked' : '' }}>
                            <label class="form-check-label" for="registroSim">Deferido</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="registroAnvisa" id="registroNao" value="Indeferido" {{ $medicamento->registroAnvisaMedicamento == 'I' ||  $medicamento->registroAnvisaMedicamento == 'off'? 'checked' : '' }}>
                            <label class="form-check-label" for="registroNao">Indeferido</label>
                        </div>
                    </div>
                </div>

                <!-- Terceira linha de campos -->
                <div class="form-row">
                    <div class="form-col">
                        <label for="idDetentor">Detentor</label>
                        <select class="form-control" id="idDetentor" name="idDetentor" required>
                            <option value="">Selecione o Detentor</option>
                            @foreach($detentor as $d)
                                <option value="{{ $d->idDetentor }}" {{ $medicamento->idDetentor == $d->idDetentor ? 'selected' : '' }}>
                                    {{ $d->nomeDetentor }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-col">
                        <label for="idTipoMedicamento">Tipo de Medicamento</label>
                        <select class="form-control" id="idTipoMedicamento" name="idTipo" required>
                            <option value="">Selecione o Tipo de Medicamento</option>
                            @foreach($tiposMedicamento as $t)
                                <option value="{{ $t->idTipoMedicamento }}" {{ $medicamento->idTipoMedicamento == $t->idTipoMedicamento ? 'selected' : '' }}>
                                    {{ $t->tipoMedicamento }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-col">
                        <label for="formaFarmaceuticaMedicamento">Forma Farmacêutica</label>
                        <select class="form-control" id="formaFarmaceuticaMedicamento" name="formaFarmaceutica" required>
                            <option value="">Selecione a Forma Farmacêutica</option>
                            <option value="Comprimido" {{ $medicamento->formaFarmaceuticaMedicamento == 'Comprimido' ? 'selected' : '' }}>Comprimido</option>
                            <option value="Cápsula" {{ $medicamento->formaFarmaceuticaMedicamento == 'Cápsula' ? 'selected' : '' }}>Cápsula</option>
                            <option value="Pomada" {{ $medicamento->formaFarmaceuticaMedicamento == 'Pomada' ? 'selected' : '' }}>Pomada</option>
                            <option value="Solução" {{ $medicamento->formaFarmaceuticaMedicamento == 'Solução' ? 'selected' : '' }}>Solução</option>
                            <option value="Suspensão" {{ $medicamento->formaFarmaceuticaMedicamento == 'Suspensão' ? 'selected' : '' }}>Suspensão</option>
                            <option value="Creme" {{ $medicamento->formaFarmaceuticaMedicamento == 'Creme' ? 'selected' : '' }}>Creme</option>
                            <option value="Gel" {{ $medicamento->formaFarmaceuticaMedicamento == 'Gel' ? 'selected' : '' }}>Gel</option>
                            <option value="Injeção" {{ $medicamento->formaFarmaceuticaMedicamento == 'Injeção' ? 'selected' : '' }}>Injeção</option>
                        </select>
                    </div>
                </div>

                <!-- Quarta linha de campos -->
                <div class="form-row">
                    <div class="form-col">
                        <label for="concentracaoMedicamento">Concentração</label>
                        <input type="text" class="form-control" id="concentracaoMedicamento" name="concentracao" value="{{ $medicamento->concentracaoMedicamento }}" required>
                    </div>

                    <div class="form-col">
                        <label for="composicaoMedicamento">Composição</label>
                        <textarea class="form-control" id="composicaoMedicamento" name="composicao" required>{{ $medicamento->composicaoMedicamento }}</textarea>
                    </div>

                    <div class="form-col">
                        <label for="situacaoMedicamento">Situação</label>
                        <select class="form-control" id="situacaoMedicamento" name="situacaoMedicamento">
                            <option value="A" {{ $medicamento->situacaoMedicamento == 'Ativo' ? 'selected' : '' }}>Ativado</option>
                            <option value="D" {{ $medicamento->situacaoMedicamento == 'Inativo' ? 'selected' : '' }}>Desativar</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="salvar">Salvar Alterações</button>
            </form>
        </div>
    </div>
</main>

<!-- JavaScript para pré-visualizar a imagem selecionada -->
<script>
    function previewImage(event, previewId) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById(previewId);
            output.src = reader.result; // Atualiza o src da imagem para a nova imagem
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@include('includes.footer') <!-- include do footer -->

@include('includes.header') <!-- include -->

<!-- AQUI VAI A PAGINA DESTINADA AS FUNCIONALIDADES DO MEDICAMENTO -->
<!-- Essa pagina será para edição, portanto o formulário estará preenchido com os dados do medicamento -->

<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1> Editar Medicamento </h1>
        </div>
    </div>

    <form action="{{ route('medicamento.update', $medicamento->idMedicamento) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="codigoDeBarrasMedicamento">Código de Barras</label>
            <input type="text" class="form-control" id="codigoDeBarrasMedicamento" name="codigoDeBarras" value="{{ $medicamento->codigoDeBarrasMedicamento }}" required>
        </div>

        <div class="form-group">
            <label for="nomeMedicamento">Nome do Medicamento</label>
            <input type="text" class="form-control" id="nomeMedicamento" name="nome" value="{{ $medicamento->nomeMedicamento }}" required>
        </div>

        <div class="form-group">
            <label for="nomeGenericoMedicamento">Nome Genérico</label>
            <input type="text" class="form-control" id="nomeGenericoMedicamento" name="nomeGenerico" value="{{ $medicamento->nomeGenericoMedicamento }}" required>
        </div>

        <div class="form-group">
            <label for="fotoMedicamentoOriginal">Foto Medicamento Original</label>
            <input type="file" class="form-control" id="fotoMedicamentoOriginal" name="fotoOriginal">
        </div>

        <div class="form-group">
            <label for="fotoMedicamentoGenero">Foto Medicamento Genérico</label>
            <input type="file" class="form-control" id="fotoMedicamentoGenero" name="fotoGenero">
        </div>

        <div class="form-group">
            <label for="registroAnvisaMedicamento">Registro ANVISA</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="registroAnvisa" id="registroSim" value="Deferido" {{ $medicamento->registroAnvisaMedicamento == 'Deferido' ? 'checked' : '' }}>
                <label class="form-check-label" for="registroSim">Deferido</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="registroAnvisa" id="registroNao" value="Indeferido" {{ $medicamento->registroAnvisaMedicamento == 'Indeferido' ? 'checked' : '' }}>
                <label class="form-check-label" for="registroNao">Indeferido</label>
            </div>
        </div>

        <div class="form-group">
            <label for="idDetentor">Detentor</label>
            <select class="form-control" id="idDetentor" name="idDetentor" required>
                <option value="">Selecione o Detentor</option>
                @foreach($detentor as $d)
                    <option value="{{ $d->idFDetentor }}" {{ $medicamento->idDetentor == $d->idFDetentor ? 'selected' : '' }}>
                        {{ $d->nomeDetentor }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
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

        <div class="form-group">
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

        <div class="form-group">
            <label for="concentracaoMedicamento">Concentração</label>
            <input type="text" class="form-control" id="concentracaoMedicamento" name="concentracao" value="{{ $medicamento->concentracaoMedicamento }}" required>
        </div>

        <div class="form-group">
            <label for="composicaoMedicamento">Composição</label>
            <textarea class="form-control" id="composicaoMedicamento" name="composicao" required>{{ $medicamento->composicaoMedicamento }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>

    <!-- MAIN -->
</main>
</section>
<!-- CONTENT -->

@include('includes.footer') <!-- include -->

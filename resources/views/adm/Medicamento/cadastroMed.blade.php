@include('includes.header') <!-- include -->

<!--  AQUI VAI A PAGINA DESTINADA AS FUNCIONALIDADES DO MEDICAMENTO-->
<!--  Essa pagina não será de consultar, portanto mudará as dashbord-->
<!--  VOCÊ QUE È BACK crie somente os botoes que irá para pagina das funcionalidade. ex: cadastro medicameento-->

<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1> Cadastro Medicamentos </h1>
        </div>
    </div>

    <form action="/cadastroMed" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="codigoDeBarrasMedicamento">Código de Barras</label>
            <input type="text" class="form-control" id="codigoDeBarrasMedicamento" name="codigoDeBarras" required>
        </div>

        <div class="form-group">
            <label for="nomeMedicamento">Nome do Medicamento</label>
            <input type="text" class="form-control" id="nomeMedicamento" name="nome" required>
        </div>

        <div class="form-group">
            <label for="nomeGenericoMedicamento">Nome Genérico</label>
            <input type="text" class="form-control" id="nomeGenericoMedicamento" name="nomeGenerico" required>
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
                <input class="form-check-input" type="radio" name="registroAnvisa" id="registroSim" value="Deferido">
                <label class="form-check-label" for="registroAP">Deferido</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="registroAnvisa" id="registroNao" value="Indeferido">
                <label class="form-check-label" for="registroNP">Indeferido</label>
            </div>
        </div>

        <div class="form-group">
            <label for="idDetentor">Detentor</label>
            <select class="form-control" id="idDetentor" name="idDetentor" required>
                <option value="">Selecione o Detentor</option>
                @foreach($detentores as $d)
                    <option value="{{ $d->idFDetentor }}">{{ $d->nomeDetentor }}</option>
                @endforeach           
            </select>
        </div>

        <div class="form-group">
            <label for="idTipoMedicamento">Tipo de Medicamento</label>
            <select class="form-control" id="idTipoMedicamento" name="idTipo" required>
                <option value="">Selecione o Tipo de Medicamento</option>
                @foreach($tiposMedicamento as $t)
                    <option value="{{ $t->idTipoMedicamento }}">{{ $t->tipoMedicamento }}</option>
                @endforeach            
            </select>
        </div>

        <div class="form-group">
            <label for="formaFarmaceuticaMedicamento">Forma Farmacêutica</label>
            <select class="form-control" id="formaFarmaceuticaMedicamento" name="formaFarmaceutica" required>
                <option value="">Selecione a Forma Farmacêutica</option>
                <option value="Comprimido">Comprimido</option>
                <option value="Cápsula">Cápsula</option>
                <option value="Pomada">Pomada</option>
                <option value="Solução">Solução</option>
                <option value="Suspensão">Suspensão</option>
                <option value="Creme">Creme</option>
                <option value="Gel">Gel</option>
                <option value="Injeção">Injeção</option>
            </select>
        </div>

        <div class="form-group">
            <label for="concentracaoMedicamento">Concentração</label>
            <input type="text" class="form-control" id="concentracaoMedicamento" name="concentracao" required>
        </div>

        <div class="form-group">
            <label for="composicaoMedicamento">Composição</label>
            <textarea class="form-control" id="composicaoMedicamento" name="composicao" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Medicamento</button>
    </form>



    <!-- MAIN -->
</main>
</section>
<!-- CONTENT -->

@include('includes.footer') <!-- include -->
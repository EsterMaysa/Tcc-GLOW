@include('includes.header') <!-- include -->

<!-- AQUI VAI A PAGINA DESTINADA AS FUNCIONALIDADES DO DETENTOR -->
<!-- Essa página será para edição, portanto o formulário estará preenchido com os dados do detentor -->

<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1> Editar Detentor </h1>
        </div>
    </div>

    <form action="{{ route('detentor.update', $detentor->idFDetentor) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nomeDetentor">Nome do Detentor</label>
            <input type="text" class="form-control" id="nomeDetentor" name="nome" value="{{ $detentor->nomeDetentor }}" required>
        </div>

        <div class="form-group">
            <label for="cnpjDetentor">CNPJ</label>
            <input type="text" class="form-control" id="cnpjDetentor" name="cnpj" value="{{ $detentor->cnpjDetentor }}" required>
        </div>

        <div class="form-group">
            <label for="emailDetentor">Email</label>
            <input type="email" class="form-control" id="emailDetentor" name="email" value="{{ $detentor->emailDetentor }}" required>
        </div>

        <div class="form-group">
            <label for="logradouroDetentor">Logradouro</label>
            <input type="text" class="form-control" id="logradouroDetentor" name="logradouro" value="{{ $detentor->logradouroDetentor }}" required>
        </div>

        <div class="form-group">
            <label for="bairroDetentor">Bairro</label>
            <input type="text" class="form-control" id="bairroDetentor" name="bairro" value="{{ $detentor->bairroDetentor }}" required>
        </div>

        <div class="form-group">
            <label for="estadoDetentor">Estado</label>
            <input type="text" class="form-control" id="estadoDetentor" name="estado" value="{{ $detentor->estadoDetentor }}" required>
        </div>

        <div class="form-group">
            <label for="cidadeDetentor">Cidade</label>
            <input type="text" class="form-control" id="cidadeDetentor" name="cidade" value="{{ $detentor->cidadeDetentor }}" required>
        </div>

        <div class="form-group">
            <label for="numeroDetentor">Número</label>
            <input type="text" class="form-control" id="numeroDetentor" name="numero" value="{{ $detentor->numeroDetentor }}" required>
        </div>

        <div class="form-group">
            <label for="ufDetentor">UF</label>
            <select class="form-control" id="ufDetentor" name="uf" required>
                <option value="">Selecione a UF</option>
                <option value="AC" {{ $detentor->ufDetentor == 'AC' ? 'selected' : '' }}>AC</option>
                <option value="AL" {{ $detentor->ufDetentor == 'AL' ? 'selected' : '' }}>AL</option>
                <option value="AP" {{ $detentor->ufDetentor == 'AP' ? 'selected' : '' }}>AP</option>
                <option value="AM" {{ $detentor->ufDetentor == 'AM' ? 'selected' : '' }}>AM</option>
                <option value="BA" {{ $detentor->ufDetentor == 'BA' ? 'selected' : '' }}>BA</option>
                <option value="CE" {{ $detentor->ufDetentor == 'CE' ? 'selected' : '' }}>CE</option>
                <option value="DF" {{ $detentor->ufDetentor == 'DF' ? 'selected' : '' }}>DF</option>
                <option value="ES" {{ $detentor->ufDetentor == 'ES' ? 'selected' : '' }}>ES</option>
                <option value="GO" {{ $detentor->ufDetentor == 'GO' ? 'selected' : '' }}>GO</option>
                <option value="MA" {{ $detentor->ufDetentor == 'MA' ? 'selected' : '' }}>MA</option>
                <option value="MT" {{ $detentor->ufDetentor == 'MT' ? 'selected' : '' }}>MT</option>
                <option value="MS" {{ $detentor->ufDetentor == 'MS' ? 'selected' : '' }}>MS</option>
                <option value="MG" {{ $detentor->ufDetentor == 'MG' ? 'selected' : '' }}>MG</option>
                <option value="PA" {{ $detentor->ufDetentor == 'PA' ? 'selected' : '' }}>PA</option>
                <option value="PB" {{ $detentor->ufDetentor == 'PB' ? 'selected' : '' }}>PB</option>
                <option value="PR" {{ $detentor->ufDetentor == 'PR' ? 'selected' : '' }}>PR</option>
                <option value="PE" {{ $detentor->ufDetentor == 'PE' ? 'selected' : '' }}>PE</option>
                <option value="PI" {{ $detentor->ufDetentor == 'PI' ? 'selected' : '' }}>PI</option>
                <option value="RJ" {{ $detentor->ufDetentor == 'RJ' ? 'selected' : '' }}>RJ</option>
                <option value="RN" {{ $detentor->ufDetentor == 'RN' ? 'selected' : '' }}>RN</option>
                <option value="RS" {{ $detentor->ufDetentor == 'RS' ? 'selected' : '' }}>RS</option>
                <option value="RO" {{ $detentor->ufDetentor == 'RO' ? 'selected' : '' }}>RO</option>
                <option value="RR" {{ $detentor->ufDetentor == 'RR' ? 'selected' : '' }}>RR</option>
                <option value="SC" {{ $detentor->ufDetentor == 'SC' ? 'selected' : '' }}>SC</option>
                <option value="SP" {{ $detentor->ufDetentor == 'SP' ? 'selected' : '' }}>SP</option>
                <option value="SE" {{ $detentor->ufDetentor == 'SE' ? 'selected' : '' }}>SE</option>
                <option value="TO" {{ $detentor->ufDetentor == 'TO' ? 'selected' : '' }}>TO</option>
            </select>
        </div>

        <div class="form-group">
            <label for="cepDetentor">CEP</label>
            <input type="text" class="form-control" id="cepDetentor" name="cep" value="{{ $detentor->cepDetentor }}" required>
        </div>

        <div class="form-group">
            <label for="complementoDetentor">Complemento</label>
            <input type="text" class="form-control" id="complementoDetentor" name="complemento" value="{{ $detentor->complementoDetentor }}">
        </div>

        <div class="form-group">
            <label for="situacaoDetentor">Situação</label>
            <select class="form-control" id="situacaoDetentor" name="situacao" required>
                <option value="A" {{ $detentor->situacaoDetentor == 'Ativo' ? 'selected' : '' }}>Ativo</option>
                <option value="D" {{ $detentor->situacaoDetentor == 'Inativo' ? 'selected' : '' }}>Inativo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>

    <!-- MAIN -->
</main>
<!-- CONTENT -->

@include('includes.footer') <!-- include -->

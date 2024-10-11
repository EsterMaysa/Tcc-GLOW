@include('includes.header')


<div class="container">
    <h2>Cadastro de Farmácia UBS</h2>
    <form action="{{ route('farmaciaUBS.store') }}" method="POST">
        @csrf
        <!-- Nome da Farmácia -->
        <div class="form-group">
            <label for="nomeFamaciaUBS">Nome da Farmácia</label>
            <input type="text" class="form-control" id="nomeFamaciaUBS" name="nomeFamaciaUBS" required>
        </div>
        
        <!-- Email da Farmácia -->
        <div class="form-group">
            <label for="emailFamaciaUBS">Email</label>
            <input type="email" class="form-control" id="emailFamaciaUBS" name="emailFamaciaUBS" required>
        </div>
        
        <!-- Senha da Farmácia -->
        <div class="form-group">
            <label for="senhaFamaciaUBS">Senha</label>
            <input type="password" class="form-control" id="senhaFamaciaUBS" name="senhaFamaciaUBS" required>
        </div>
        
        <!-- Tipo da Farmácia -->
        <div class="form-group">
            <label for="tipoFamaciaUBS">Tipo da Farmácia</label>
            <input type="text" class="form-control" id="tipoFamaciaUBS" name="tipoFamaciaUBS">
        </div>
        
        <!-- Situação da Farmácia -->
        <div class="form-group">
            <label for="situacaoFamaciaUBS">Situação</label>
            <select class="form-control" id="situacaoFamaciaUBS" name="situacaoFamaciaUBS" required>
                <option value="A">Ativa</option>
                <option value="I">Inativa</option>
            </select>
        </div>
        
        <!-- Data de Cadastro -->
        <div class="form-group">
            <label for="dataCadastroFamaciaUBS">Data de Cadastro</label>
            <input type="date" class="form-control" id="dataCadastroFamaciaUBS" name="dataCadastroFamaciaUBS" required>
        </div>
        
        <!-- Botão de Enviar -->
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>

@include('includes.footer')
@include('includes.header')

@if (session('success'))
    <div class="alert alert-success" id="successMessage">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <h2>Cadastro de Farmácia UBS</h2>
    <form action="/insertFarmaciaUbs" method="POST">
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
        <!-- <div class="form-group">
            <label for="situacaoFamaciaUBS">Situação</label>
            <select class="form-control" id="situacaoFamaciaUBS" name="situacaoFamaciaUBS" required>
                <option value="A">Ativa</option>
                <option value="I">Inativa</option>
            </select>
        </div> -->
        
        <!-- Data de Cadastro -->
        <!-- <div class="form-group">
            <label for="dataCadastroFamaciaUBS">Data de Cadastro</label>
            <input type="date" class="form-control" id="dataCadastroFamaciaUBS" name="dataCadastroFamaciaUBS" required>
        </div> -->
        
        <!-- Botão de Enviar -->
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>

<script>
    // Após 6 segundos (6000 milissegundos), remove a mensagem de sucesso
    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.transition = "opacity 1s ease-out"; // Efeito de transição suave
            successMessage.style.opacity = '0'; // Desvanece a mensagem
            setTimeout(function() {
                successMessage.remove(); // Remove o elemento do DOM
            }, 1000); // Dá mais um segundo para o fade out antes de remover
        }
    }, 6000); // Aguarda 6 segundos
</script>


@include('includes.footer')
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
        
        <!-- Botão de Enviar -->
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

    <!-- Tabela para exibir todas as farmácias cadastradas -->
    <h3 class="mt-5">Todas as Farmácias Cadastradas</h3>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
        @foreach($farmacias as $farmaciaItem) <!-- Altere aqui -->
    <tr>
        <td>{{ $farmaciaItem->idFamaciaUBS }}</td>
        <td>{{ $farmaciaItem->nomeFamaciaUBS }}</td>
        <td>{{ $farmaciaItem->emailFamaciaUBS }}</td>
        <td>{{ $farmaciaItem->tipoFamaciaUBS }}</td>
    </tr>
@endforeach

        </tbody>
    </table>
</div>

<script>
    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.transition = "opacity 1s ease-out";
            successMessage.style.opacity = '0';
            setTimeout(function() {
                successMessage.remove();
            }, 1000);
        }
    }, 6000);
</script>

@include('includes.footer')

@include('includes.header')

@if (session('success'))
    <div class="alert alert-success" id="successMessage">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <h2>Editar Farmácia UBS</h2>
    <form action="{{ route('farmacia.update', $farmacia->idFarmaciaUBS) }}" method="POST">
        @csrf
        <!-- Usando o campo _method para simular o método PUT -->
        <input type="hidden" name="_method" value="POST"> <!-- Corrigido para POST -->
        
        <!-- Nome da Farmácia -->
        <div class="form-group">
            <label for="nomeFamaciaUBS">Nome da Farmácia</label>
            <input type="text" class="form-control" id="nomeFamaciaUBS" name="nomeFarmaciaUBS" value="{{ $farmacia->nomeFarmaciaUBS }}" required>
        </div>
        
        <!-- Email da Farmácia -->
        <div class="form-group">
            <label for="emailFamaciaUBS">Email</label>
            <input type="email" class="form-control" id="emailFamaciaUBS" name="emailFarmaciaUBS" value="{{ $farmacia->emailFarmaciaUBS }}" required>
        </div>
        
        <!-- Tipo da Farmácia -->
        <div class="form-group">
            <label for="tipoFamaciaUBS">Tipo da Farmácia</label>
            <input type="text" class="form-control" id="tipoFamaciaUBS" name="tipoFarmaciaUBS" value="{{ $farmacia->tipoFarmaciaUBS }}">
        </div>
        
        <!-- Botão de Atualizar -->
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
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

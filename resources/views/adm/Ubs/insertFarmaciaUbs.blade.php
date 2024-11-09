<!--CSS finalizado OK (ASS:Duda-->

@include('includes.header')
<link rel="stylesheet" href="{{ url('css/Formularios.css')}}">

<nav class="navbar">
    <div class="navbar-brand">
        <img src="{{ asset('Image/2a.png')}}" alt="Logo" class="logo"> 
    </div>
    <div class="search-container">
        <input type="text" placeholder="Buscar..." class="search-input">
        <button class="search-button"><i class="fas fa-search"></i></button>
    </div>
</nav>

<div class="container-um">
    <div class="jumbotron-um">
        <h1>Cadastrar Farmácia</h1>
        <p>Cadastre uma farmácia nova.</p>
    </div>
</div>

<main>
    @if (session('success'))
    <div class="alert alert-success" id="successMessage">
        {{ session('success') }}
    </div>
    @endif

    <a href="/farmacia" class="btn btn-secondary mt-3">
        <i class="fas fa-list"></i> Ver Farmácias Cadastradas
    </a>

    <form action="/insertFarmacia" method="POST" class="formulario"> 
        @csrf

        <div class="input-container">
            <label for="nomeFamaciaUBS">
                <i class="fas fa-building icon"></i>
                Nome da Farmácia :
            </label>
            <input type="text" class="form-control" id="nomeFamaciaUBS" name="nomeFamaciaUBS" required>
        </div>
        <div class="input-container">
            <label for="emailFamaciaUBS">
                <i class="fas fa-envelope icon"></i>
                Email :
            </label>
            <input type="email" class="form-control" id="emailFamaciaUBS" name="emailFamaciaUBS" required>
        </div>
        <div class="input-container">
            <label for="senhaFamaciaUBS">
                <i class="fas fa-lock icon"></i>
                Senha :
            </label>
            <input type="password" class="form-control" id="senhaFamaciaUBS" name="senhaFamaciaUBS" required>
        </div>
        <div class="input-container">
            <label for="tipoFamaciaUBS">
                <i class="fas fa-tag icon"></i>
                Tipo da Farmácia :
            </label>
            <input type="text" class="form-control" id="tipoFamaciaUBS" name="tipoFamaciaUBS">
        </div>
        <button type="submit" class="botaozinho">Cadastrar Farmácia</button>
    </form>
</main>
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
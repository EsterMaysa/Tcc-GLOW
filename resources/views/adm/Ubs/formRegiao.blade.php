<!--CSS incluido aqui (ASS:Duda)-->

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
        <h1>Cadastrar Região</h1>
        <p>Cadastre uma Região nova.</p>
    </div>
</div>

<main>
    <form action="{{ route('insertRegiao') }}" method="POST" class="formulario">
        @csrf <!-- Proteção contra CSRF vini -->
        <div class="input-container">
            <label for="regiao">
                <i class="fas fa-map-marker-alt icon"></i>
                Nome da Região :
            </label>
            <input type="text" name="regiao" id="regiao" placeholder="Digite o nome da região" style="background-color: #F7F7F7;">
        </div>
        <div class="input-container">
            <label for="situacao">
                <i class="fas fa-info-circle icon"></i> 
                Situação :
            </label>
            <input type="text" name="situacao" id="situacao" placeholder="Digite a situação" style="background-color: #F7F7F7;">
        </div>
        <button type="submit" class="botaozinho">Cadastrar Região</button>
    </form>
</main>




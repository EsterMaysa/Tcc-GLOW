@include('includes.header')
<link rel="stylesheet" href="{{('css/Formularios.css')}}">

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
        <h1>Tipo Medicamento</h1>
        <p>Adicione um novo tipo de medicamento.</p>
    </div>
</div>

<main>
    <form action="/TipoMedicamento" method="POST" class="formulario">
        @csrf

            <div class="input-container">
                <label for="tipoMedicamento">Tipo de Medicamento</label>
                <input type="text" class="form-control" id="tipoMedicamento" name="tipo" 
                    value="{{ old('tipo') }}" required>
            </div>

            <div class="input-container">
                <label for="formaMedicamento">Forma Farmacêutica</label>
                <select class="form-control" id="formaMedicamento" name="forma" required>
                    <option value="">Selecione a Forma Farmacêutica</option>
                    <option value="Comprimido" {{ old('forma') == 'Comprimido' ? 'selected' : '' }}>Comprimido</option>
                    <option value="Cápsula" {{ old('forma') == 'Cápsula' ? 'selected' : '' }}>Cápsula</option>
                    <option value="Pomada" {{ old('forma') == 'Pomada' ? 'selected' : '' }}>Pomada</option>
                    <option value="Solução" {{ old('forma') == 'Solução' ? 'selected' : '' }}>Solução</option>
                    <option value="Suspensão" {{ old('forma') == 'Suspensão' ? 'selected' : '' }}>Suspensão</option>
                    <option value="Creme" {{ old('forma') == 'Creme' ? 'selected' : '' }}>Creme</option>
                    <option value="Gel" {{ old('forma') == 'Gel' ? 'selected' : '' }}>Gel</option>
                    <option value="Injeção" {{ old('forma') == 'Injeção' ? 'selected' : '' }}>Injeção</option>
                </select>
            </div>

            <button type="submit" class="botaozinho">Salvar</button>
    </form>
</main>

@include('includes.footer')
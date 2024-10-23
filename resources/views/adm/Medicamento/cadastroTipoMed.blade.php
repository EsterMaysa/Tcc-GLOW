@include('includes.header')
<main>
    <div class="head-title">
        <div class="left">
            <h1> Novo Tipo de Medicamento?</h1>
        </div>
    </div>


    <div class="container">

    <form action="/TipoMedicamento" method="POST">
        @csrf

        <div class="form-group">
            <label for="tipoMedicamento">Tipo de Medicamento</label>
            <input type="text" class="form-control" id="tipoMedicamento" name="tipo" 
                value="{{ old('tipo') }}" required>
        </div>

        <div class="form-group">
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

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
    </div>
</main>
</section>
@include('includes.footer')
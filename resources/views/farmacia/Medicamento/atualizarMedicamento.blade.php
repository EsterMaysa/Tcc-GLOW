    @include('includes.headerFarmacia')


    <!-- Main content -->
    <div class="col-md-9 col-lg-10 main-content">
        <div class="head-title">
            <div class="left">
                <h1>Editar Medicamento Farmacia</h1>
            </div>
        </div>

        <div class="container">

            <form action="{{ route('medicamentosFarma.update', $medicamento->idMedicamento) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nomeMedicamento">Nome Medicamento</label>
                    <input type="text" class="form-control" name="nomeMedicamento" value="{{ $medicamento->nomeMedicamento }}" required>
                </div>

                <div class="form-group">
                    <label for="nomeGenericoMedicamento">Nome Genérico</label>
                    <input type="text" class="form-control" name="nomeGenericoMedicamento" value="{{ $medicamento->nomeGenericoMedicamento }}" required>
                </div>

                <div class="form-group">
                    <label for="codigoDeBarrasMedicamento">Código de Barras</label>
                    <input type="text" class="form-control" name="codigoDeBarrasMedicamento" value="{{ $medicamento->codigoDeBarrasMedicamento }}" required>
                </div>

                <div class="form-group">
                    <label for="validadeMedicamento">Validade</label>
                    <input type="date" class="form-control" name="validadeMedicamento" value="{{ $medicamento->validadeMedicamento }}" required>
                </div>

                <div class="form-group">
                    <label for="loteMedicamento">Lote</label>
                    <input type="text" class="form-control" name="loteMedicamento" value="{{ $medicamento->loteMedicamento }}" required>
                </div>

                <div class="form-group">
                    <label for="dosagemMedicamento">Dosagem</label>
                    <input type="text" class="form-control" name="dosagemMedicamento" value="{{ $medicamento->dosagemMedicamento }}" required>
                </div>

                <div class="form-group">
                    <label for="formaFarmaceuticaMedicamento">Forma Farmacêutica</label>
                    <input type="text" class="form-control" name="formaFarmaceuticaMedicamento" value="{{ $medicamento->formaFarmaceuticaMedicamento }}" required>
                </div>

                <div class="form-group">
                    <label for="composicaoMedicamento">Composição</label>
                    <textarea class="form-control" name="composicaoMedicamento" required>{{ $medicamento->composicaoMedicamento }}</textarea>
                </div>

                <div class="form-group">
                    <label for="situacaoMedicamento">Situação</label>
                    <select name="situacaoMedicamento" class="form-control" required>
                        <option value="A" {{ $medicamento->situacaoMedicamento == 'A' ? 'selected' : '' }}>Ativo</option>
                        <option value="I" {{ $medicamento->situacaoMedicamento == 'I' ? 'selected' : '' }}>Inativo</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="/MedicamentoHome" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>

        @include('includes.footer')
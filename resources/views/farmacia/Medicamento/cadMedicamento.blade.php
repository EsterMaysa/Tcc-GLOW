@include('includes.headerFarmacia')
<div class="container" style="margin: 20px;">

    <form action="/CadMedFarma" method="POST">
        @csrf

        <!-- Código de Barras do Medicamento -->
        <div class="form-group">
            <label for="codigoDeBarrasMedicamento">Código de Barras</label>
            <input type="text" class="form-control" id="codigoDeBarrasMedicamento" name="codigoDeBarrasMedicamento" value="{{ old('codigoDeBarrasMedicamento') }}" required onblur="buscarMedicamento()">
        </div>

        <!-- Nome do Medicamento -->
        <div class="form-group">
            <label for="nomeMedicamento">Nome do Medicamento</label>
            <input type="text" class="form-control" id="nomeMedicamento" name="nomeMedicamento" value="{{ old('nomeMedicamento') }}" required>
        </div>

        <!-- Nome Genérico do Medicamento -->
        <div class="form-group">
            <label for="nomeGenericoMedicamento">Nome Genérico do Medicamento</label>
            <input type="text" class="form-control" id="nomeGenericoMedicamento" name="nomeGenericoMedicamento" value="{{ old('nomeGenericoMedicamento') }}" required>
        </div>

        <!-- Validade do Medicamento -->
        <div class="form-group">
            <label for="validadeMedicamento">Data de Validade</label>
            <input type="date" class="form-control" id="validadeMedicamento" name="validadeMedicamento" required>
        </div>

        <!-- Lote do Medicamento -->
        <div class="form-group">
            <label for="loteMedicamento">Lote</label>
            <input type="text" class="form-control" id="loteMedicamento" name="loteMedicamento" required>
        </div>

        <!-- Forma Farmacêutica do Medicamento -->
        <div class="form-group">
            <label for="formaMedicamento">Forma Farmacêutica</label>
            <select class="form-control" id="formaMedicamento" name="forma" required>
                <option value="">Selecione a Forma Farmacêutica</option>
                <option value="Comprimido">Comprimido</option>
                <option value="Cápsula">Cápsula</option>
                <option value="Pomada">Pomada</option>
                <option value="Solução">Solução</option>
                <option value="Suspensão">Suspensão</option>
                <option value="Creme">Creme</option>
                <option value="Gel">Gel</option>
                <option value="Injeção">Injeção</option>
            </select>
        </div>

        <!-- Dosagem do Medicamento -->
        <div class="form-group">
            <label for="dosagemMedicamento">Dosagem</label>
            <input type="text" class="form-control" id="dosagemMedicamento" name="dosagemMedicamento" required>
        </div>

        <!-- Composição do Medicamento -->
        <div class="form-group">
            <label for="composicaoMedicamento">Composição</label>
            <textarea class="form-control" id="composicaoMedicamento" name="composicaoMedicamento" required></textarea>
        </div>
        <!-- Botão de Enviar -->
        <button type="submit" class="btn btn-primary">Cadastrar Medicamento</button>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function buscarMedicamento() {
        const codigoDeBarras = $('#codigoDeBarrasMedicamento').val();

        if (codigoDeBarras) {
            $.ajax({
                url: `/CodMed/${codigoDeBarras}`,
                type: 'GET',
                success: function(data) {
                    console.log(data); // Veja o que está sendo retornado

                    if (data) {
                        // Atualiza os inputs visíveis com os valores recebidos
                        $('#nomeMedicamento').val(data.nomeMedicamento);
                        $('#nomeGenericoMedicamento').val(data.nomeGenericoMedicamento);
                        $('#composicaoMedicamento').val(data.composicaoMedicamento);
                    } else {
                        alert('Código de barras não encontrado!');
                    }
                },
                error: function(jqXHR) {
                    alert('Erro ao buscar o medicamento!');
                    console.error(jqXHR.responseText); // Exibe detalhes do erro no console
                }
            });
        }
    }

</script>

@include('includes.footer')
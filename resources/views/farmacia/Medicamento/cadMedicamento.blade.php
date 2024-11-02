@include('includes.headerFarmacia')

<form action="/CadMedFarma" method="POST">
    @csrf

    <!-- Código de Barras do Medicamento -->
    <div class="form-group">
        <label for="codigoDeBarrasMedicamento">Código de Barras</label>
        <input type="text" class="form-control" id="codigoDeBarrasMedicamento" name="codigoDeBarrasMedicamento" required onblur="buscarMedicamento()">
    </div>

    <!-- Nome do Medicamento -->
    <div class="form-group">
        <label for="nomeMedicamento">Nome do Medicamento</label>
        <input type="text" class="form-control" id="nomeMedicamento" name="nomeMedicamento" required>
    </div>

    <!-- Nome Genérico do Medicamento -->
    <div class="form-group">
        <label for="nomeGenericoMedicamento">Nome Genérico do Medicamento</label>
        <input type="text" class="form-control" id="nomeGenericoMedicamento" name="nomeGenericoMedicamento" required>
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

    <!-- Dosagem do Medicamento -->
    <div class="form-group">
        <label for="dosagemMedicamento">Dosagem</label>
        <input type="text" class="form-control" id="dosagemMedicamento" name="dosagemMedicamento" required>
    </div>

    <!-- Forma Farmacêutica do Medicamento -->
    <div class="form-group">
        <label for="formaFarmaceuticaMedicamento">Forma Farmacêutica</label>
        <input type="text" class="form-control" id="formaFarmaceuticaMedicamento" name="formaFarmaceuticaMedicamento" required>
    </div>

    <!-- Composição do Medicamento -->
    <div class="form-group">
        <label for="composicaoMedicamento">Composição</label>
        <textarea class="form-control" id="composicaoMedicamento" name="composicaoMedicamento" required></textarea>
    </div>
    

    <!-- Botão de Enviar -->
    <button type="submit" class="btn btn-primary">Cadastrar Medicamento</button>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function buscarMedicamento() {
        const codigoDeBarras = $('#codigoDeBarrasMedicamento').val();

        if (codigoDeBarras) {
            $.ajax({
                url: `/CodMed/${codigoDeBarras}`,
                type: 'GET',
                success: function(data) {
                    if (data) {
                        $('#nomeMedicamento').val(data.nomeMedicamento);
                        $('#nomeGenericoMedicamento').val(data.nomeGenericoMedicamento);
                        $('#composicaoMedicamento').val(data.composicaoMedicamento);

                        // Bloqueia o campo de código de barras
                        $('#codigoDeBarrasMedicamento').prop('disabled', true);
                        $('#nomeMedicamento').prop('disabled', true);
                        $('#nomeGenericoMedicamento').prop('disabled', true);
                        $('#composicaoMedicamento').prop('disabled', true);


                    } else {
                        alert('Código de barras não encontrado!');
                    }
                },
                error: function() {
                    alert('Erro ao buscar o medicamento!');
                }
            });
        }
    }
</script>

@include('includes.footer')

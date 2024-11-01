<!-- 
AQUI VAI A PAGINA DO MEDICAMENTO - A HOME MEDICAMENTO - QUE TERÁ O BOTÃO DE CADASTRAR 
O MEDICAMENTO QUE CHEGOU, ATUALIZAR E DESATIVAR, E PODERÁ VER OS MEDICAMENTOS DESSA FARMÁCIA. 
-->
@include('includes.headerFarmacia')

<div class="col-md-9 col-lg-10 main-content">
    <div class="head-title">
        <div class="left">
            <h1>Entrada de Medicamentos</h1>
        </div>
    </div>

    <!-- Formulário de Cadastro de Entrada de Medicamentos -->
    <div class="container">
        <h2>Cadastrar Entrada de Medicamento</h2>
        <form action="{{ route('entradaMedStore') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nomeMedicamento">Nome do Medicamento:</label>
                <input type="text" name="nomeMedicamento" class="form-control" id="nomeMedicamento" required placeholder="Digite o nome do medicamento">
                <input type="hidden" name="idMedicamento" id="idMedicamento"> <!-- Campo oculto para armazenar o ID do medicamento -->
                <small id="medicamentoError" style="color: red; display: none;">Medicamento não cadastrado.</small>
            </div>
            <div class="form-group">
                <label for="dataEntrada">Data de Entrada:</label>
                <input type="date" name="dataEntrada" class="form-control" value="{{ date('Y-m-d') }}" required>
            </div>

            <div class="form-group">
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="lote">Lote:</label>
                <input type="text" name="lote" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="validade">Validade:</label>
                <input type="date" name="validade" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="motivoEntrada">Motivo da Entrada:</label>
                <input type="text" name="motivoEntrada" class="form-control" id="motivoEntrada" required placeholder="Digite o motivo da entrada">
                <input type="hidden" name="idMotivoEntrada" id="idMotivoEntrada"> <!-- Campo oculto para armazenar o ID -->
            </div>
            
            <div class="form-group">
                <label for="nomeFuncionario">Funcionário Responsável:</label>
                <input type="text" name="nomeFuncionario" class="form-control" id="nomeFuncionario" required placeholder="Digite o nome do funcionário">
                <input type="hidden" name="idFuncionario" id="idFuncionario"> <!-- Campo oculto para armazenar o ID do funcionário -->
            </div>


            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

</div>

@include('includes.footer')

<script>
    // busca o funcionario pelo nome
    document.getElementById('nomeFuncionario').addEventListener('input', function() {
        const nomeFuncionario = this.value;
        
        // Faz a requisição AJAX para buscar o ID do funcionário
        if (nomeFuncionario) {
            fetch(`/funcionario/buscar?nomeFuncionario=${nomeFuncionario}`)
                .then(response => response.json())
                .then(data => {
                    // Se o ID for encontrado, atribui ao campo oculto; se não, limpa o campo
                    document.getElementById('idFuncionario').value = data.idFuncionario || '';
                })
                .catch(error => console.error('Erro ao buscar funcionário:', error));
        } else {
            // Limpa o campo de ID caso o nome esteja vazio
            document.getElementById('idFuncionario').value = '';
        }
    });
</script>

<script>
   // motivo entrada cadastra automatico
document.getElementById('motivoEntrada').addEventListener('blur', function() {
    const motivoEntrada = this.value;

    if (motivoEntrada) {
        fetch('/motivoEntrada/buscarOuCriar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ motivoEntrada: motivoEntrada })
        })
        .then(response => response.json())
        .then(data => {
            // Atribui o ID do motivo ao campo oculto
            document.getElementById('idMotivoEntrada').value = data.idMotivoEntrada;
        })
        .catch(error => console.error('Erro ao buscar/criar motivo de entrada:', error));
    }
});

</script>

<script>
// Busca o medicamento pelo nome
document.getElementById('nomeMedicamento').addEventListener('blur', function() {
    const nomeMedicamento = this.value;

    if (nomeMedicamento) {
        fetch(`/medicamento/buscar?nomeMedicamento=${nomeMedicamento}`)
            .then(response => response.json())
            .then(data => {
                if (data.idMedicamento) {
                    // Se o ID for encontrado, atribui ao campo oculto
                    document.getElementById('idMedicamento').value = data.idMedicamento;
                } else {
                    // Caso o medicamento não esteja cadastrado, exibe o alerta e limpa o campo oculto
                    alert('Erro: Medicamento não cadastrado.');
                    document.getElementById('idMedicamento').value = '';
                }
            })
            .catch(error => console.error('Erro ao buscar medicamento:', error));
    } else {
        // Limpa o campo de ID caso o nome esteja vazio
        document.getElementById('idMedicamento').value = '';
    }
});

</script>

<style>
    .table {
        margin: 20px 0;
        width: 100%;
        background-color: #14213D;
        color: #fff;
    }

    .table thead {
        background-color: #57b8ff;
    }

    .table tbody tr:hover {
        background-color: #4b89f5;
    }
</style>

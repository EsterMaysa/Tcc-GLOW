@include('includes.headerFarmacia')

<!-- PAGINA PRINCIPAL DO ESTOQUE A HOME DO ESTOQUE -->

<div class="container mt-4">

  <!-- Seção com botões e imagem -->
<div class="d-flex align-items-center justify-content-between mb-4 p-3 border rounded shadow-sm bg-light">
    <!-- Botão Entrada de Medicamento -->
    <div class="d-flex flex-column align-items-center me-4">
        <button class="btn btn-success btn-lg mb-2">
            <i class="bi bi-box-arrow-in-down me-2"></i> <!-- Ícone de entrada -->
            Entrada de Medicamento
        </button>
        <small class="text-muted">Registrar novo lote no estoque</small>
    </div>

    <!-- Botão Saída de Medicamento -->
    <div class="d-flex flex-column align-items-center me-4">
        <button class="btn btn-danger btn-lg mb-2">
            <i class="bi bi-box-arrow-up me-2"></i> <!-- Ícone de saída -->
            Saída de Medicamento
        </button>
        <small class="text-muted">Registrar retirada de medicamentos</small>
    </div>

    <!-- Imagem do estoque -->
    <div class="d-flex align-items-center">
        <img  src="" alt="Imagem de estoque" class="img-thumbnail style="width: 60px; height: 60px;">
        <div class="ms-3">
            <h6 class="mb-0">Estoque Atual</h6>
            <p class="text-muted mb-0">Status: Médio</p> <!-- Exemplo de status -->
        </div>
    </div>
</div>


    <!-- Tabela e status do estoque -->
    <div class="row">
        <!-- Tabela de dados do estoque -->
        <div class="col-lg-9 mb-4">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nome do Medicamento</th>
                            <th>Quantidade</th>
                            <th>Data de Validade</th>
                            <!-- Adicione mais colunas conforme necessário -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Exemplo de dados da tabela -->
                        <tr>
                            <td>1</td>
                            <td>Paracetamol</td>
                            <td>200</td>
                            <td>12/2025</td>
                        </tr>
                        <!-- Coloque um loop para exibir dados reais -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Status do estoque ao lado da tabela -->
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Status do Estoque</h5>
                </div>
                <div class="card-body">
                    <p><strong>Nível:</strong> Alto / Médio / Baixo</p>
                    <p><strong>Última atualização:</strong> 01/11/2024</p>
                    <!-- Outros detalhes que forem relevantes -->
                </div>
            </div>
        </div>
    </div>
</div>

@include('includes.footer')

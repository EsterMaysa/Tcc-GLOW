@include('includes.headerFarmacia')

<!-- PAGINA PRINCIPAL DO ESTOQUE A HOME DO ESTOQUE -->

<div class="container mt-4">

    <!-- Seção com botões e imagem -->
    <div class="d-flex align-items-center justify-content-between mb-4 p-3 border rounded shadow-sm bg-light">
        <div class="d-flex flex-column align-items-center me-4">
            <button class="btn btn-success btn-lg mb-2">
                <i class="bi bi-box-arrow-in-down me-2"></i> 
                Entrada de Medicamento
            </button>
            <small class="text-muted">Registrar novo lote no estoque</small>
        </div>

        <div class="d-flex flex-column align-items-center me-4">
            <button class="btn btn-danger btn-lg mb-2">
                <i class="bi bi-box-arrow-up me-2"></i>
                Saída de Medicamento
            </button>
            <small class="text-muted">Registrar retirada de medicamentos</small>
        </div>

        <div class="d-flex align-items-center">
            <img src="path/to/imagem.jpg" alt="Imagem de estoque" class="img-thumbnail rounded-circle" style="width: 60px; height: 60px;">
            <div class="ms-3">
                <h6 class="mb-0">Estoque Atual</h6>
                <p class="text-muted mb-0">Status: Médio</p>
            </div>
        </div>
    </div>

    <!-- Tabela e status do estoque -->
    <div class="row">
        <div class="col-lg-9 mb-4">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Medicamento</th>
                            <th>Funcionario</th>
                            <th>Movimentação</th>
                            <th>Quantidade</th>
                            <th>Data de Validade</th>
                            <th>Ações</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Paracetamol</td>
                            <td>cleyto</td>
                            <td>entrada</td>
                            <td>200</td>
                            <td>12/2025</td>
                            <td>editar</td>
                            <td>excluir</td>



                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Status do Estoque</h5>
                </div>
                <div class="card-body">
                    <p><strong>Nível:</strong> Alto / Médio / Baixo</p>
                    <p><strong>Última atualização:</strong> 01/11/2024</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulário de Movimentação do Estoque -->
    <div class="card mt-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Registrar Movimentação no Estoque</h5>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="row g-3">
                    <!-- Campo para selecionar Medicamento -->
                    <div  class="form-group">
                        <label for="idMedicamento" class="form-label">Nome do Medicamento</label>
                        <select  class="form-control" id="idMedicamento" name="idMedicamento" required>
                            <option value="">Medicamentos </option>
                            <option value="1">nome </option>

                        </select>
                    </div>
                    

                    <!-- Campo para informar o Funcionário -->
                    <div  class="form-group">
                        <label for="idFuncionario" class="form-label">Funcionário</label>
                        <select  class="form-control" id="idFuncionario" name="idFuncionario" required>
                            <option value="">Funcionario </option>
                            <option value="1">nome </option>

                        </select>
                    </div>

                    <!-- Tipo de Movimentação (Entrada ou Saída) -->
                    <div  class="form-group">
                        <label for="idTipoMovimentacao" class="form-label">Tipo de Movimentação</label>
                        <select  class="form-control" id="idTipoMovimentacao" name="idTipoMovimentacao" required>
                            <option value="1">Entrada</option>
                            <option value="2">Saída</option>
                        </select>
                    </div>

                    <!-- Quantidade no Estoque -->
                    <div  class="form-group">
                        <label for="quantEstoque" class="form-label">Quantidade Movimentada</label>
                        <input type="number" class="form-control" id="quantEstoque" name="quantEstoque" required>
                    </div>

                    <!-- Data da Movimentação -->
                    <div class="form-group">
                        <label for="dataMovimentacao" class="form-label">Data da Movimentação</label>
                        <input type="date" class="form-control" id="dataMovimentacao" name="dataMovimentacao" required>
                    </div>
                    <div class="form-group">

                    </div>

                    <div class="form-group">
                        <!-- Botão de submissão -->
                        <button type="submit" class="btn btn-success ">Registrar Estoque</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

@include('includes.footer')

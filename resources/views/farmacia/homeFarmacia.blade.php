@include('includes.headerFarmacia')

@if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
        <!-- Main content -->
        <div class="col-md-9 col-lg-10 main-content">
                <!-- Alertas de Estoque Baixo -->
                <div class="alerta-estoque">
                    <span class="icone-alerta"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
                    Atenção: O estoque do medicamento "Nome do Medicamento" está baixo. Por favor, reabasteça o mais rápido possível.
                </div>

                <!-- Relatórios de Estoque -->
                <div class="card">
                    <div class="card-header">
                        Relatório de Estoque Crítico
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nome do Medicamento</th>
                                    <th>Quantidade em Estoque</th>
                                    <th>Nível Mínimo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Preencha com dados reais -->
                                <tr>
                                    <td>Medicamento A</td>
                                    <td>5</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>Medicamento B</td>
                                    <td>2</td>
                                    <td>8</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Visão Geral do Estoque -->
                <div class="card mt-4">
                    <div class="card-header">
                        Visão Geral do Estoque
                    </div>
                    <div class="card-body">
                        <div id="grafico-estoque">
                           Grafico aqui
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Adicione aqui os scripts necessários para os gráficos -->

    <!-- menssagens boa vindas -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
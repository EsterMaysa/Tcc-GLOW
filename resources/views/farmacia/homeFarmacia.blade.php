<!--CSS OK, SEM BACK-END (ASS: DUDA)-->

@include('includes.headerFarmacia')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/Farmacia-CSS/DashboardFarmacia.css')}}">

<div class="navbar">
    <div class="search-container">
        <input type="text" class="search-input" placeholder="Pesquisar...">
        <button class="search-button"><i class="fas fa-search"></i></button>
    </div>
    
    <div class="welcome-message">
        <p><i class="fas fa-store"></i> Bem-vinda, <span class="farmacia-name">Farmácia XYZ</span>!</p> <!--AQUI VEM O BACK PUXANDO O NOME DO LOGIN (ASS: DUDA)-->
    </div>
</div>


<main>
    @if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="stats-cards">
        <div class="card">
            <h3>Medicamentos no Estoque</h3>
            <i class="fas fa-box-open fa-3x"></i>
            <a href="/homeEstoque" class="btn btn-info">Ver Estoque</a> 
        </div>
        <div class="card">
            <h3>Entradas de Medicamentos</h3>
            <i class="fas fa-arrow-down fa-3x"></i>
            <a href="#" class="btn btn-info ">Ver Entradas</a> 
        </div>
        <div class="card">
            <h3>Saídas de Medicamentos</h3>
            <i class="fas fa-arrow-up fa-3x"></i>
            <a href="#" class="btn btn-info">Ver Saídas</a> 
        </div>
        <div class="card">
            <h3>Tipos de Movimentação</h3>
            <i class="fas fa-cogs fa-3x"></i>
            <a href="#" class="btn btn-info">Ver Tipos</a>
        </div>
    </div>

        <!-- aqui vem back-end -->
        <div class="indicators-summary">
        <h2>Resumo de Indicadores Principais</h2>
            <div class="indicator-cards">
                <div class="indicator-card">
                    <h4>Número Total de Medicamentos</h4>
                    <span id="totalMedicamentos" class="indicator-value">1500</span>
            </div>
            <div class="indicator-card">
                <h4>Taxa de Consumo Semanal</h4>
                <span id="taxaConsumoSemanal" class="indicator-value">250</span> 
            </div>
            <div class="indicator-card">
                <h4>Medicamentos em Baixa</h4>
                <span id="medicamentosBaixa" class="indicator-value">20</span> 
            </div>
            <div class="indicator-card">
                <h4>Última Movimentação</h4>
                <span id="ultimaMovimentacao" class="indicator-value">11/11/2024 - Entrada</span> <!-- valor dinâmico -->
            </div>
        </div>
    </div>

    <!-- aqui vem back-end -->
    <div class="recent-activities">
        <img src="{{ asset('Image/verdeAdm (1).png')}}" alt="Imagem representativa" class="activity-section-image">
            <div class="content">
                <h2>Atividades Recentes</h2>
                <ul class="recent-activities-list">
                    <li>
                        <span class="activity-date">11/11/2024</span>
                        <span class="activity-desc">Entrada de medicamento A - Responsável: Dr. Silva</span>
                    </li>
                    <li>
                        <span class="activity-date">10/11/2024</span>
                        <span class="activity-desc">Saída de medicamento B - Responsável: Enf. Souza</span>
                    </li>
                    <li>
                        <span class="activity-date">09/11/2024</span>
                        <span class="activity-desc">Entrada de medicamento C - Responsável: Dra. Lima</span>
                    </li>
                    <li>
                        <span class="activity-date">08/11/2024</span>
                        <span class="activity-desc">Saída de medicamento D - Responsável: Enf. Gonçalves</span>
                    </li>
                </ul>
            </div>
    </div>


    <!-- aqui vem back-end -->
    <div class="charts-container">
        <div class="chart">
            <h3>Movimentação de Estoque (Entradas e Saídas)</h3>
            <canvas id="inventoryMovementChart"></canvas>
        </div>
        <div class="chart">
            <h3>Medicamentos Ativos e Inativos</h3>
            <canvas id="activeInactiveChart"></canvas>
        </div>
    </div>

    <div class="quick-actions">
        <h3>Ações Rápidas</h3>
        <ul>
            <li><a href="/EntradaMedicamentoHome">Registrar Entrada de Medicamento</a></li>
            <li><a href="/saidaLista">Registrar Saída de Medicamento</a></li>
            <li><a href="/estoqueHome">Verificar Estoque</a></li>
            <li><a href="/MedicamentoHome">Adicionar Novo Medicamento</a></li>
        </ul>
    </div>

    <br>
</main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Dados de exemplo para o gráfico de Movimentação de Estoque (Entradas e Saídas)
        const inventoryMovementData = {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio'],  // Exemplo de meses
            datasets: [{
                label: 'Entradas',
                data: [1200, 1500, 1800, 1100, 1300],  // Dados das entradas
                backgroundColor: 'rgba(76, 175, 80, 0.2)',  // Cor de fundo
                borderColor: 'rgba(76, 175, 80, 1)',  // Cor da borda
                borderWidth: 1
            }, {
                label: 'Saídas',
                data: [1000, 1200, 1100, 900, 1100],  // Dados das saídas
                backgroundColor: 'rgba(255, 99, 132, 0.2)',  // Cor de fundo
                borderColor: 'rgba(255, 99, 132, 1)',  // Cor da borda
                borderWidth: 1
            }]
        };

        // Configuração do gráfico de Movimentação de Estoque (Entradas e Saídas)
        const inventoryMovementConfig = {
            type: 'bar',
            data: inventoryMovementData,
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Inicialização do gráfico de Movimentação de Estoque
        const inventoryMovementChart = new Chart(
            document.getElementById('inventoryMovementChart'),
            inventoryMovementConfig
        );

        // Definindo um tamanho específico para o canvas do gráfico
        document.getElementById('inventoryMovementChart').style.height = '100px';  // Menor altura
        document.getElementById('inventoryMovementChart').style.width = '100%';  // Largura responsiva

    // Dados de exemplo para o gráfico de Medicamentos Ativos e Inativos (Gráfico de Donut)
    const activeInactiveData = {
            labels: ['Ativos', 'Inativos'],  // Classificação de medicamentos
            datasets: [{
                label: 'Medicamentos',
                data: [450, 150],  // Quantidade de medicamentos ativos e inativos
                backgroundColor: [
                    'rgba(76, 175, 80, 0.7)',  // Cor para medicamentos ativos
                    'rgba(255, 99, 132, 0.7)'   // Cor para medicamentos inativos
                ],
                borderColor: [
                    'rgba(76, 175, 80, 1)',  // Cor para medicamentos ativos
                    'rgba(255, 99, 132, 1)'   // Cor para medicamentos inativos
                ],
                borderWidth: 1
            }]
        };

        // Configuração do gráfico de Medicamentos Ativos e Inativos (Gráfico de Donut)
        const activeInactiveConfig = {
            type: 'doughnut',  // Mudando para gráfico de donut
            data: activeInactiveData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' unidades';
                            }
                        }
                    }
                }
            }
        };

        // Inicialização do gráfico de Medicamentos Ativos e Inativos (Donut)
        const activeInactiveChart = new Chart(
            document.getElementById('activeInactiveChart'),
            activeInactiveConfig
        );

    // Ajustando o tamanho do gráfico para ele ficar menor, mas sem alterar o layout
    document.getElementById('activeInactiveChart').style.height = '200px';  
    document.getElementById('activeInactiveChart').style.width = '100%';  // Largura responsiva
    document.getElementById('activeInactiveChart').style.marginLeft = '80px';  // Ajuste a margem esquerda aqui


    </script>
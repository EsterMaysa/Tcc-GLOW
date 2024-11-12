<!--CSS OK (ASS: Duda)-->

@include('includes.headerFarmacia')
<link rel="stylesheet" href="{{ asset('css/Farmacia-CSS/DashboardFarmacia.css')}}">

<nav class="navbar">
    <div class="navbar-brand">
        <img src="{{ asset('Image/3a.png')}}" alt="Logo" class="logo">
    </div>
    <div class="search-container">
        <input type="text" placeholder="Buscar..." class="search-input">
        <button class="search-button"><i class="fas fa-search"></i></button>
    </div>
</nav>

<div class="container-um">
    <div class="jumbotron-um">
        <h1>Bem-vinda, Farmácia!</h1>
        <p>Estamos felizes em tê-lo aqui. Você pode gerenciar medicamentos e muito mais.</p>
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

    <div class="container-dois">
        <div class="stat-card">
            <span class="icon"><i class="fas fa-arrow-down"></i></span>
            <h3>Entrada de Medicamentos</h3>
            <a href="/EntradaMedicamentoHome" class="stat-btn">Conferir</a>
        </div>
        <div class="stat-card">
            <span class="icon"><i class="fas fa-arrow-up"></i></span>
            <h3>Saída de Medicamentos</h3>
            <a href="/saidaLista" class="stat-btn">Conferir</a>
        </div>
        <div class="stat-card">
            <span class="icon"><i class="fas fa-capsules"></i></span>
            <h3>Medicamentos em Falta</h3>
            <a href="/MedicamentoHome" class="stat-btn">Conferir</a>
        </div>
    </div>

    <div class="container-tres">
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
                        @foreach ($estoquetabela as $e)

                        <!-- Preencha com dados reais -->
                        <tr>
                            <td>{{ $e->medicamento->nomeMedicamento }}</td>
                            <td>{{ $e->quantEstoque }}</td>
                            <td>10</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container-quatro">
        <!-- Gráfico de Barras (Agora para Entradas e Saídas) -->
        <div class="card-4">
            <div class="card-he">
                Entradas e Saídas do Estoque
            </div>
            <div class="card-bo">
                <div id="grafico-estoque">
                    <canvas id="graficoEstoque"></canvas>
                </div>
            </div>
        </div>

        <!-- Gráfico de Pizza (Agora para Quantidade de Medicamento) -->
        <div class="card-4">
            <div class="card-he">
                Distribuição do Estoque
            </div>
            <div class="card-bo">
                <div id="grafico-pizza">
                    <canvas id="graficoPizza"></canvas>
                </div>
            </div>
        </div>
    </div>


</main>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Dados passados do Laravel para o JavaScript
        var nomesMedicamentos = @json($nomes); // Recebe os nomes dos medicamentos
        var quantidadesMedicamentos = @json($quantidades); // Recebe as quantidades
        var datas = @json($datas); // Recebe as datas
        var entradas = @json($quantidadeEntradas); // Recebe as quantidades de entradas
        var saidas = @json($quantidadeSaidas); // Recebe as quantidades de saídas

        // Gráfico de Pizza - Quantidade de Medicamento
        var ctxPizza = document.getElementById('graficoPizza').getContext('2d');
        var graficoPizza = new Chart(ctxPizza, {
            type: 'pie', // Tipo de gráfico: pizza
            data: {
                labels: nomesMedicamentos, // Usando os nomes dos medicamentos passados
                datasets: [{
                    label: 'Quantidade de Medicamentos',
                    data: quantidadesMedicamentos, // Usando as quantidades passadas
                    backgroundColor: ['#2c6e49', '#228B22', '#98FF98'], // As cores podem ser personalizadas
                    borderColor: ['#2c6e49', '#228B22', '#98FF98'],
                    borderWidth: 1
                }]
            },
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
        });

        // Gráfico de Barras - Entradas vs Saídas
        var ctxBarra = document.getElementById('graficoEstoque').getContext('2d');
        var graficoEstoque = new Chart(ctxBarra, {
            type: 'bar',
            data: {
                labels: datas, // Usando as datas de entrada e saída
                datasets: [{
                    label: 'Entradas',
                    data: entradas, // Usando as quantidades de entradas
                    backgroundColor: '#2c6e49', // Cor para entradas
                    borderColor: '#2c6e49',
                    borderWidth: 1
                }, {
                    label: 'Saídas',
                    data: saidas, // Usando as quantidades de saídas
                    backgroundColor: '#e74c3c', // Cor para saídas
                    borderColor: '#e74c3c',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- menssagens boa vindas -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
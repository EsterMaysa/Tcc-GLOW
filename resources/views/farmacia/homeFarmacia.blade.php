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
            <a href="/entrada-medicamentos" class="stat-btn">Conferir</a>
        </div>
        <div class="stat-card">
            <span class="icon"><i class="fas fa-arrow-up"></i></span>
            <h3>Saída de Medicamentos</h3>
            <a href="/saida-medicamentos" class="stat-btn">Conferir</a>
        </div>
        <div class="stat-card">
            <span class="icon"><i class="fas fa-capsules"></i></span>
            <h3>Medicamentos em Falta</h3>
            <a href="/medicamentos-falta" class="stat-btn">Conferir</a>
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
    </div>

    <div class="container-quatro">
        <!-- Visão Geral do Estoque -->
        <div class="card-4">
            <div class="card-he">
                 Visão Geral do Estoque
            </div>
            <div class="card-bo">
                <div id="grafico-estoque">
                    <canvas id="graficoEstoque"></canvas>
                </div>
            </div>
        </div>

        <!-- Gráfico de Pizza -->
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
            // Gráfico de Barras
            var ctxBarra = document.getElementById('graficoEstoque').getContext('2d');
            var graficoEstoque = new Chart(ctxBarra, {
                type: 'bar',  // Tipo do gráfico: 'bar', 'line', 'pie', etc.
                data: {
                    labels: ['Medicamento A', 'Medicamento B', 'Medicamento C'],  
                    datasets: [{
                        label: 'Quantidade em Estoque',
                        data: [10, 5, 8], 
                        backgroundColor: ['#2c6e49', '#228B22', '#98FF98'],  
                        borderColor: ['#2c6e49', '#228B22', '#98FF98'],  
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

            // Gráfico de Pizza
            var ctxPizza = document.getElementById('graficoPizza').getContext('2d');
            var graficoPizza = new Chart(ctxPizza, {
                type: 'pie',  // Tipo do gráfico: 'pie' para pizza
                data: {
                    labels: ['Medicamento A', 'Medicamento B', 'Medicamento C'],  
                    datasets: [{
                        label: 'Distribuição do Estoque',
                        data: [10, 5, 8], 
                        backgroundColor: ['#2c6e49', '#228B22', '#006400'], 
                        borderColor: ['#2c6e49', '#228B22', '#006400'],  
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
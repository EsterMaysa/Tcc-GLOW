<!--CSS finalizado também (ASS:Duda-->

@include('includes.header')
<link rel="stylesheet" href="{{ url('css/DashboardAdm.css')}}"> <!--CSS DESSA PÁGINA É SOMENTE ESSE-->

<!-- @if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif -->

@if (session('message'))
    <script>
        alert("{{ session('message') }}");
    </script>
@endif
<body>


    <nav class="navbar">
        <div class="navbar-brand">
            <img src="{{ asset('Image/2a.png')}}" alt="Logo" class="logo">
        </div>
        <div class="search-container">
            <input type="text" placeholder="Buscar..." class="search-input">
            <button class="search-button"><i class="fas fa-search"></i></button>
        </div>
    </nav>

    <div class="container-um">
        <div class="jumbotron-um">
            <h1>Bem-vindo, Administrador!</h1>
            <p>Estamos felizes em tê-lo aqui. Você pode gerenciar usuários, visualizar relatórios e muito mais.</p>
        </div>
    </div>


    <div class="container-dois">
        <div class="stat-card">
            <span class="icon"><i class="fas fa-pills"></i></span> 
            <h3>Novos Medicamentos</h3>
            <p>10</p>
        </div>
        <div class="stat-card">
            <span class="icon"><i class="fas fa-file-alt"></i></span> 
            <h3>Medicamentos Cadastrados</h3>
            <p>150</p>
        </div>
        <div class="stat-card">
            <span class="icon"><i class="fas fa-hospital"></i></span> 
            <h3>Unidades Básicas de Saúde</h3>
            <p>5</p>
        </div>
        <div class="stat-card">
            <span class="icon"><i class="fas fa-users"></i></span>
            <h3>Usuários Registrados</h3>
            <p>200</p>
        </div>
    </div>

    <div class="container-tres">
        <div class="card">
            <div class="card-content">
                <h3>Cadastrar Medicamento</h3>
                <p>Gerencie o cadastro de novos medicamentos no sistema.</p>
                <a href="/medicamentoForm" class="card-button">Cadastrar</a>
            </div>
            <img src="{{ asset('Image/medicamento.png')}}" alt="Imagem de Medicamento">
        </div>

        <div class="card">
            <div class="card-content">
                <h3>Consultar Usuários</h3>
                <p>Veja e gerencie os usuários cadastrados no sistema.</p>
                <a href="#" class="card-button">Consultar</a>
            </div>
            <img src="{{ asset('Image/admAlterandoSemFundo.png')}}" alt="Imagem de Usuários">
        </div>
    </div>

    <div class="container-quatro">
    <!-- Gráfico de Medicamentos -->
    <div class="chart-card">
        <h3>Medicamentos Cadastrados por Tipo</h3>
        <canvas id="medicamentosChart" class="grafico"></canvas>
    </div>

    <!-- Gráfico de Clientes -->
    <div class="chart-card">
        <h3>Quantidade de Usuários Cadastrados</h3>
        <canvas id="clientesChart" class="grafico"></canvas>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Gráfico de Barras - Medicamentos Cadastrados por Tipo
    var ctxMedicamentos = document.getElementById('medicamentosChart').getContext('2d');
    var medicamentosChart = new Chart(ctxMedicamentos, {
        type: 'bar', // Tipo de gráfico
        data: {
            labels: ['Antialérgico', 'Antibiótico', 'Analgésico'], // Tipos de medicamentos
            datasets: [{
                label: 'Quantidade de Medicamentos', // Legenda
                data: [15, 25, 40], // Quantidade de medicamentos cadastrados por tipo
                backgroundColor: ['#1F2B5B', '#243f8a', '#46b2e0'], // Cores das barras
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Medicamentos Cadastrados por Tipo'
                }
            }
        }
    });

    // Gráfico de Barras - Quantidade Total de Clientes Cadastrados
    var ctxClientes = document.getElementById('clientesChart').getContext('2d');
    var clientesChart = new Chart(ctxClientes, {
        type: 'bar', // Tipo de gráfico
        data: {
            labels: ['Total de Usuários'], // Apenas uma barra
            datasets: [{
                label: 'Quantidade de Usuários Cadastrados', // Legenda
                data: [120], // Quantidade total de clientes cadastrados
                backgroundColor: '#46b2e0', // Cor da barra
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Quantidade Total de Usuários Cadastrados'
                }
            }
        }
    });
</script>





@include('includes.footer') 

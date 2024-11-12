@include('includes.header')
<link rel="stylesheet" href="{{ url('css/DashboardAdm.css')}}">

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
            <p>{{ $medicamentosHoje }}</p>
        </div>
        <div class="stat-card">
            <span class="icon"><i class="fas fa-file-alt"></i></span>
            <h3>Medicamentos Cadastrados</h3>
            <p>{{ $totalMedicamentos }}</p>
        </div>
        <div class="stat-card">
            <span class="icon"><i class="fas fa-hospital"></i></span>
            <h3>Unidades Básicas de Saúde</h3>
            <p>{{ $totalUbs }}</p>
        </div>
        <div class="stat-card">
            <span class="icon"><i class="fas fa-users"></i></span>
            <h3>Usuários Registrados</h3>
            <p>{{ $totalUser }}</p>
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
                <a href="/Cliente" class="card-button">Consultar</a>
            </div>
            <img src="{{ asset('Image/admAlterandoSemFundo.png')}}" alt="Imagem de Usuários">
        </div>
    </div>

    <div class="container-quatro">
    <div class="chart-card" style="width: 500px; margin: auto;height:400px">
        <h3>Medicamentos Cadastrados por Tipo</h3>
        <canvas id="medicamentosChart" class="grafico"></canvas>
    </div>

    <div class="chart-card">
        <h3>Usuários Cadastrados por Dia</h3>
        <canvas id="usuariosPorDiaChart" class="grafico"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Dados dinâmicos para o gráfico de medicamentos
    var medicamentosData = @json($medicamentosPorTipo->pluck('medicamentos_count'));
    var medicamentosLabels = @json($medicamentosPorTipo->pluck('tipoMedicamento'));
    var totalClientes = @json($totalUser);

    // Gráfico de Pizza - Medicamentos por Tipo com tons de azul
    var ctxMedicamentos = document.getElementById('medicamentosChart').getContext('2d');
    var medicamentosChart = new Chart(ctxMedicamentos, {
        type: 'pie',  
        data: {
            labels: medicamentosLabels,
            datasets: [{
                label: 'Quantidade de Medicamentos',
                data: medicamentosData,
                backgroundColor: ['#1E3A5F', '#3C6D99', '#5C92CC', '#A1C0E8', '#B9D9F4'],
                hoverBackgroundColor: ['#16304A', '#2F5473', '#487CB3', '#7CA7D3', '#A8CAE6']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Medicamentos Cadastrados por Tipo'
                },
                legend: {
                    position: 'right'
                }
            }
        }
    });

    // Gráfico de Barras - Usuários Cadastrados por Dia
    var usuariosPorDiaData = @json($usuariosPorDia->pluck('usuarios_count'));
    var usuariosPorDiaLabels = @json($usuariosPorDia->pluck('dia'));
    
    var ctxUsuariosPorDia = document.getElementById('usuariosPorDiaChart').getContext('2d');
    var usuariosPorDiaChart = new Chart(ctxUsuariosPorDia, {
        type: 'line',  // Usando gráfico de linha para mostrar a tendência diária
        data: {
            labels: usuariosPorDiaLabels,
            datasets: [{
                label: 'Usuários Cadastrados por Dia',
                data: usuariosPorDiaData,
                borderColor: '#1F2B5B',
                backgroundColor: 'rgba(31, 43, 91, 0.2)',                
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Usuários Cadastrados por Dia'
                }
            }
        }
    });
</script>

@include('includes.footer')

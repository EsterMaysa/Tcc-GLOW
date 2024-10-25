@include('includes.header')

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


<main>
	<div class="dashboard">
        <section class="rating-chart-section">
            <div class="chart-wrapper">
                <!-- Gráfico de Acesso -->
                <div class="chart-container">
                    <h1> Acesso ao BuscaSus </h1>
                    <canvas id="salesChart"></canvas>
                </div>
                <!-- Gráfico de Avaliação -->
                <div class="chart-container">
                    <h1>Avaliação do Aplicativo</h1>
                    <canvas id="ratingChart"></canvas>
                </div>
            </div>
        </section>

        <section class="notifications-section">
    <div class="head-title">
        <h1>Notificações</h1>
    </div>

    <div class="notifications-content">
        <div class="notification-card">
            <div class="notification-icon">
                <i class='bx bxs-bell' style="color: #72D9FF;"></i>
            </div>
            <div class="notification-text">
                <p><strong>Nova Atualização:</strong> A versão 2.1 foi lançada!</p>
                <small>10 minutos atrás</small>
            </div>
        </div>
    </div>
</section>
    </div>
</main>
</section> <!-- comeco dessa tag esta do header-->

<!-- Scripts do Bootstrap (opcional, para o funcionamento do botão de boas vindas apos login) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@include('includes.footer') 

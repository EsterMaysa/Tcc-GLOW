@include('includes.header')

<!-- Seção Principal -->
<section id="sidebar">
    <a href="/" class="brand">
        <span class="text1" style="margin-left: 50px;">
            <img src="{{ asset('/Image/busca.png') }}" width="70%">
        </span>
    </a>
    <ul class="side-menu top">
        <li><a href="/">
            <i class='bx bxs-dashboard'></i>
            <span class="text">Início</span>
        </a></li>
        <li><a href="/consultar">
            <i class='bx bxs-doughnut-chart'></i>
            <span class="text">Consultar</span>
        </a></li>
        <li><a href="/alterar">
            <i class='bx bxs-edit bx-flip-horizontal' style='color:#3f3e3e'></i>
            <span class="text">Alterar</span>
        </a></li>
        <li class="active">
            <a href="/create"><i class='bx bxs-plus-circle'></i>
            <span class="text">Criar</span>
        </a></li>
        <li><a href="/mensagem"><i class='bx bxs-message-dots'></i><span class="text">Mensagens</span></a></li>
        <li><a href="/delete" class="logoutTrash"><i class='bx bxs-trash'></i><span class="text">Deletar</span></a></li>
    </ul>
    <ul class="boto">
        <li><a href="/configuracoes" class="boto2"><i class='bx bxs-cog'></i><span class="text">Configurações</span></a></li>
        <li><a href="/perfil" class="boto2"><i class='bx bxs-user'></i><span class="text">Perfil</span></a></li>
        <li><a href="#" class="boto2"><i class='bx bxs-log-out-circle' id="logout-icon"></i><span class="text">Sair</span></a></li>
    </ul>
</section>

<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Criar Contato</h1>
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li><a class="active" href="/">Criar Contato</a></li>
            </ul>
        </div>
    </div>

    <!-- Contêiner para centralizar o formulário -->
    <div class="form-wrapper">
        <form action="/criarContato" method="POST" class="styled-form">
            @csrf <!-- Token de segurança do Laravel -->

            <div class="form-group">
                <label for="idFarmacia">ID Farmácia</label>
                <input type="text" id="idFarmacia" name="idFarmacia" required>
            </div>

            <div class="form-group">
                <label for="idTelefone">ID Telefone</label>
                <input type="text" id="idTelefone" name="idTelefone" required>
            </div>

            <div class="form-group button-wrapper">
                <button type="submit" class="submit-btn">Criar Contato</button>
            </div>
        </form>
    </div>
</main>

@include('includes.footer')

<!-- Estilos CSS -->
<style>
    /* Estilo para a página principal */
    main {
        padding: 20px;
    }

    /* Estilo para manter o título e breadcrumb no topo */
    .head-title {
        margin-bottom: 40px;
        text-align: center;
    }

    /* Form-wrapper centraliza o formulário */
    .form-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 60vh;
    }

    /* Estilo moderno e delicado para o formulário */
    .styled-form {
        background-color: #1f2b5b; /* Azul escuro */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px; /* Ajustado para ser um pouco mais largo */
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 6px;
        color: #fff; /* Cor branca para contraste com o fundo azul escuro */
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #ddd;
        font-size: 14px;
        background-color: #eaf4f4; /* Azul claro para o fundo dos campos */
    }

    .form-group input:focus {
        outline: none;
        border-color: #57b8ff; /* Azul claro para foco */
        box-shadow: 0 0 4px rgba(87, 184, 255, 0.3); /* Sombra azul claro suave */
    }

    /* Botão de envio */
    .button-wrapper {
        text-align: center; /* Centraliza o botão */
    }

    .submit-btn {
        padding: 12px 25px;
        background-color: #57b8ff; /* Azul suave */
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 4px; /* Bordas mais sutis */
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #4b89f5; /* Tom mais escuro para hover */
    }
</style>

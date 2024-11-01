@include('includes.headerFarmacia')

<!-- Aqui vai o forms do motivo entrada -->

<!-- Main content -->
<div class="col-md-9 col-lg-10 main-content">
    <div class="head-title">
        <div class="left">
            <h1>Verificação</h1>
        </div>
    </div>

    <!-- Mensagem de sucesso ou erro -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulário para entrada do email e senha -->
    <form id="formCadastrar" action="{{ route('verificar.email') }}" method="POST">
        @csrf
        <div id="formEmail">
            <label for="email">Digite seu e-mail:</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="seuemail@exemplo.com" required>
            <button type="button" id="btnAvancar" class="btn-acao">Avançar</button>
        </div>

        <!-- Formulário para entrada da senha (oculto inicialmente) -->
        <div id="formSenha" style="display: none; margin-top: 20px;">
            <label for="senha">Digite sua senha:</label>
            <input type="password" name="senha" id="senha" class="form-control" placeholder="********" required>
            <button type="submit" id="btnCadastrar" class="btn-acao">Cadastrar</button>
        </div>
    </form>
</div>

@include('includes.footer')

<script>
    // Mostrar o campo de senha quando o botão "Avançar" for clicado
    document.getElementById('btnAvancar').addEventListener('click', function() {
        document.getElementById('formEmail').style.display = 'none'; // Esconde o formulário de email
        document.getElementById('formSenha').style.display = 'block'; // Mostra o formulário de senha
        this.style.display = 'none'; // Esconde o botão "Avançar"
    });
</script>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Adm-CSS/Verificacao.css')}}">

    <title>Login Administrador | FarmaSUS</title>
	<link rel="shortcut icon" href="{{ asset('Image/favicon.ico')}}" type="image/x-icon">
</head>
<body>
    <div class="login-container">
        <!-- Imagem do lado esquerdo -->
        <div class="login-image">
            <img src="{{ asset('Image/loginAdm2.gif') }}" alt="Ilustração de login">
        </div>

        <!-- Lado do formulário -->
        <div class="login-form">
            <h1>Login Administrador</h1>
            <form id="formLogin" action="/admLogin" method="POST">
                @csrf
                <label for="email"></label>
                <input type="email" name="email" id="email" placeholder="Digite seu email" required>

                <label for="senha"></label>
                <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite sua senha" required>

                <!-- Mensagem de erro -->
                @if (session('error'))
                    <p class="error-message">{{ session('error') }}</p>
                @endif

                <button type="submit" class="btn-login">LOGIN</button>
                <p class="signup-link">
                    Não é Administrador? <a href="/verificacao">Clique aqui</a>
                </p>
				<p class="signup-link">
                    Não possui cadastro? <a href="/formsAdm">Clique aqui</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>

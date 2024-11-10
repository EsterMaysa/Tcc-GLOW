<!-- Tela de login com CSS embutido -->
<div class="login-container">
    <div class="login-box">
        <img src="logo.png" alt="Logo" class="logo">
        <h2>Farmácia | Login</h2>

        <!-- Formulário de Login -->
        <form id="formCadastrar" action="{{ route('verificar.email') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="email"></label>
                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
            </div>
            <div class="input-group">
                <label for="senha"></label>
                <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required>
            </div>
            <button type="submit" class="btn-login">LOGIN</button>
        </form>

        <div class="links">
            <a href="/login">Não é Farmácia? ➔</a>
        </div>
    </div>
</div>

<!-- Estilos CSS embutidos -->
<style>
    /* Background */
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        background: linear-gradient(135deg, #1D8D74, #3A9F85);
        font-family: Arial, sans-serif;
    }

    /* Container principal */
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    /* Caixa de login */
    .login-box {
        background: #fff;
        border-radius: 10px;
        padding: 40px;
        max-width: 400px;
        width: 100%;
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    /* Logo */
    .logo {
        max-width: 80px;
        margin-bottom: 20px;
    }

    /* Título */
    .login-box h2 {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
        font-weight: bold;
    }

    /* Estilos dos campos de entrada */
    .input-group {
        position: relative;
        margin-bottom: 20px;
    }

    .form-control {
        width: 100%;
        padding: 15px;
        font-size: 14px;
        background: #f2f2f2;
        border: none;
        border-radius: 25px;
        outline: none;
        color: #555;
    }

    .form-control::placeholder {
        color: #888;
    }

    /* Estilos do botão de login */
    .btn-login {
        width: 100%;
        padding: 15px;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        background-color: #1D8D74;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-login:hover {
        background-color: #166e5a;
    }

    /* Links adicionais */
    .links {
        margin-top: 15px;
        font-size: 14px;
    }

    .links a {
        color: #555;
        text-decoration: none;
        display: block;
        margin-top: 5px;
    }

    .links a:hover {
        text-decoration: underline;
    }
</style>

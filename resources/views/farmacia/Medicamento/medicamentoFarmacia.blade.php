<!-- 
AQUI VAI A PAGINA DO MEDICAMENTO - A HOME MEDICAMENTO - QUE TERÁ O BOTÃO DE CADASTRAR 
O MEDICAMENTO QUE CHEGOU, ATUALIZAR E DESATIVAR, E PODERÁ VER OS MEDICAMENTOS DESSA FARMÁCIA. 
-->
@include('includes.headerFarmacia')

<div class="col-md-9 col-lg-10 main-content">
    <div class="head-title">
        <div class="left">
            <h1>Medicamento Disponiveis</h1>
        </div>
    </div>

    
</div>

<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

@include('includes.footer')
<!-- Estilos CSS Atualizados -->
<style>
    .form-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .form-group {
        flex: 1;
        margin-right: 10px;
    }

    .form-group:last-child {
        margin-right: 0;
    }

    .form-group select,
    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
        font-size: 14px;
    }

    .messages {
        margin-bottom: 20px;
        text-align: center;
    }

    .alert {
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
        display: inline-block;
        width: 100%;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }

    .alert-success {
        background-color: #4CAF50;
        color: #155724;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .styled-form {
        background-color: #14213D; /* Cor do formulário alterada */
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
    }

    .form-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        min-height: 80vh;
        margin-left: 160px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: white; /* Mantém o texto branco para contraste */
    }

    .submit-btn {
        padding: 9px 320px;
        background-color: #57b8ff; /* Tom suave de azul */
        border: none;
        border-radius: 5px;
        color: black;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-left: 250px;
    }

    .submit-btn:hover {
        background-color: #4b89f5; /* Tom mais escuro ao passar o mouse */
    }

    .button-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn-secondary {
        background-color: #57b8ff; /* Botão suave de azul */
        padding: 9px 15px;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        margin: 0 auto;
    }

    .btn-secondary:hover {
        background-color: #4b89f5; /* Tom mais escuro ao passar o mouse */
    }
</style>

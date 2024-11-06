<!--CSS finalizado OK (ASS:Duda-->

@include('includes.header')
<link rel="stylesheet" href="{{('css/Formularios.css')}}">

<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Criar Região</h1>
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li><a class="active" href="/">Criar Região</a></li>
            </ul>
        </div>
    </div>
    <div class="form-wrapper">
        <form action="/criarRegiao" method="POST" class="styled-form">
            @csrf <!-- Token de segurança do Laravel -->

            <div class="form-group">
                <label for="nomeRegiao">Nome da Região:</label>
                <input type="text" id="nomeRegiao" name="nomeRegiao" required>
            </div>

            <div class="form-group button-wrapper">
                <button type="submit" class="submit-btn">Cadastrar Região</button>
            </div>
        </form>
    </div>
</main>

@include('includes.footer')

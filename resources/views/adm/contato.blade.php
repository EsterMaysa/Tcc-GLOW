@include('includes.header')
<!-- Página de Contatos -->
<main>
    <div class="head-title">
        <div class="left">
            <h1> CONTATO </h1>
            <ul class="breadcrumb">
                <li>
                    <a href="">Home</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="/"> Contato </a>
                </li>
            </ul>
        </div>
    </div>

    <div id="mensagens-lista">
        @foreach($contatos as $c)
            <div class="mensagem" id="mensagem-{{ $c->idContato }}">
                <p><strong>De:</strong> <span class="remetente">{{ $c->usuario->nomeUsuario ?? 'Usuário não encontrado' }}</span></p>
                <p><strong>E-mail:</strong> <span class="email">{{ $c->usuario->emailUsuario ?? 'E-mail não disponível' }}</span></p>
                <p><strong>Mensagem:</strong> <span class="texto">{{ $c->mensagemContato }}</span></p>
                <p><strong>Data:</strong> <span class="data">{{ $c->dataCadastroContato }}</span></p>
                
                <div class="responder-form">
                    <textarea placeholder="Digite sua resposta aqui..." rows="4" cols="50"></textarea>
                    <button id="submit-btn" onclick="enviarResposta()">Enviar Resposta</button>
                </div>
                
                <!-- Botão de exclusão -->
                <form action="{{ route('contato.excluir', $c->idContato) }}" method="POST" style="display:inline;" onsubmit="return confirm('Você tem certeza que deseja excluir esta mensagem?');">
                    @csrf
                    @method('DELETE') <!-- Simula o método DELETE -->
                    <button type="submit" class="btn btn-danger btn-sm" style="margin-top: 10px;">
                        <i class="fas fa-trash-alt"></i> Excluir
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</main>
@include('includes.footer')

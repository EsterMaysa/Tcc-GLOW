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
                    @if($c->respostaContato) <!-- Verifica se já existe uma resposta -->
                        <div style="color: green;">Resposta: {{ $c->respostaContato }}</div>
                    @else
                        <form action="{{ route('contato.resposta', $c->idContato) }}" method="POST" class="resposta-form" onsubmit="return enviarResposta(event, '{{ $c->idContato }}')">
                            @csrf
                            <textarea name="resposta" placeholder="Digite sua resposta aqui..." rows="4" cols="50" required></textarea>
                            <button type="submit" class="btn-enviar">Enviar Resposta</button>
                        </form>
                        <div class="resposta-enviada-{{ $c->idContato }}" style="display: none; color: green;">
                            Resposta enviada!
                        </div>
                    @endif
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

<script>
    function enviarResposta(event, contatoId) {
        event.preventDefault(); // Impede o envio padrão do formulário

        var form = event.target; // Obtém o formulário que foi enviado
        var formData = new FormData(form); // Cria um objeto FormData para enviar os dados do formulário

        // Faz a requisição AJAX para enviar a resposta
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (response.ok) {
                // Se a resposta for bem-sucedida, oculta o formulário e mostra a mensagem
                form.querySelector('textarea').style.display = 'none'; // Esconde a caixa de texto
                form.querySelector('.btn-enviar').style.display = 'none'; // Esconde o botão
                document.querySelector('.resposta-enviada-' + contatoId).style.display = 'block'; // Mostra a mensagem de confirmação
            } else {
                // Lida com erros de validação
                return response.json().then(data => {
                    alert(data.message || 'Erro ao enviar a resposta.'); // Exibe uma mensagem de erro
                });
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao enviar a resposta.');
        });
    }
</script>

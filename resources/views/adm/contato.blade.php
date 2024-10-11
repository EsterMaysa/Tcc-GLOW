@include('includes.header') 
<!-- antiga pagina menssagem, AGORA È MENSSAgem de CONTATOs -->
<!-- AQUI TERÀ SÒ UM SELECT -->
<main>
    <div class="head-title">
		<div class="left">
			<h1> CONTATO </h1>
			    <ul class="breadcrumb">
					<li>
						<a href="">Home</a>
					</li>
					<li><i class='bx bx-chevron-right' ></i></li>
					<li>
						<a class="active" href="/"> contato </a>
					</li>
				</ul>
		</div>
	</div>
    <div id="mensagens-lista">
        <div class="mensagem">
            <p><strong>De:</strong> <span class="remetente">Nome do Remetente</span></p>
            <p><strong>Mensagem:</strong> <span class="texto">Texto da Mensagem</span></p>
            <p><strong>Data:</strong> <span class="data">Data e Hora</span></p>
            <div class="responder-form">
                <textarea placeholder="Digite sua resposta aqui..." rows="4" cols="50"></textarea>
                <button onclick="enviarResposta()">Enviar Resposta</button>
            </div>
        </div>
		<div class="mensagem">
            <p><strong>De:</strong> <span class="remetente">Nome do Remetente</span></p>
            <p><strong>Mensagem:</strong> <span class="texto">Texto da Mensagem</span></p>
            <p><strong>Data:</strong> <span class="data">Data e Hora</span></p>
            <div class="responder-form">
                <textarea placeholder="Digite sua resposta aqui..." rows="4" cols="50"></textarea>
                <button onclick="enviarResposta()">Enviar Resposta</button>
            </div>
        </div>
    </div>
</section>
@include('includes.footer')

@include('includes.header') 
<!-- <section id="sidebar">
		<a href="/" class="brand">
			<span class="text1" style="margin-left: 50px;"><img src="{{ asset('/Image/busca.png')}}" width="70%"></span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="/">
					<i class='bx bxs-dashboard'></i>
					<span class="text"> Início </span>
				</a>
			</li>
			<li>
				<a href="/consultar">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text"> Consultar </span>
				</a>
			</li>
			<li >
				<a href="/alterar">
					<i class='bx bxs-edit bx-flip-horizontal' style='color:#3f3e3e' ></i>
					<span class="text"> Alterar </span>
				</a>
			</li>
			
			<li>
				<a href="/create">
					<i class='bx bxs-plus-circle'></i>
					<span class="text"> Criar </span>
				</a>
			</li>
			<li class="active">
				<a href="/mensagem">
					<i class='bx bxs-message-dots'></i>
					<span class="text"> Mensagens </span>
				</a>
			</li>
			<li>
				<a href="/delete" class="logoutTrash">
					<i class='bx bxs-trash'></i>
					<span class="text"> Deletar </span>				
				</a>
			</li>

		</ul>
		<ul class="boto">
    		<li>
				<a href="/configuracoes" class="boto2">
					<i class='bx bxs-cog'></i>
					<span class="text"> Configurações </span>
				</a>
    		</li>
			<li>
				<a href="/perfil" class="boto2">
					<i class='bx bxs-user'></i>
					<span class="text"> Perfil </span>
				</a>
    		</li>
    		<li>
				<a href="#" class="boto2">
				<i class='bx bxs-log-out-circle' id="logout-icon"></i>
					<span class="text"> Sair </span>
				</a>
    		</li>
		</ul>

	</section> -->
<main>
    <div class="head-title">
		<div class="left">
			<h1> Mensagem </h1>
			    <ul class="breadcrumb">
					<li>
						<a href="">Home</a>
					</li>
					<li><i class='bx bx-chevron-right' ></i></li>
					<li>
						<a class="active" href="/"> Mensagem </a>
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

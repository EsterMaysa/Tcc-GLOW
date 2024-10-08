@include('includes.header') <!-- include -->
<!--  AQUI VAI O SELECT  -->
<section id="sidebar">
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
			<li class="active">
				<a href="/consultar">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text"> Consultar </span>
				</a>
			</li>
			<li>
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
			<li>
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

	</section>
<!-- MAIN -->
<main>
	<div class="head-title">
		<div class="left">
			<h1> CLiente </h1>
			<ul class="breadcrumb">
				<li>
					<a href="/"> Home </a>
				</li>
				<li><i class='bx bx-chevron-right'></i></li>
				<li>
					<a class="active" href="/consultar"> Consultar </a>
				</li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
					<a class="active" href="/clienteConsulta"> Cliente </a>
				</li>
			</ul>
		</div>
	</div>
	<!--Aqui esta as tabelas para o select-->
	<!--Depois colocar uma barra de rolagem dentro dessa div-->

    <table class="table">
    <thead>
    <tr class="tituloTB">
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Cpf</th>
        <th scope="col">Cns</th>
        <th scope="col">Rg</th>
        <th scope="col">Email</th>
        <th scope="col">User</th>
        <th scope="col">Cep</th>
        <th scope="col">Cidade</th>

    </tr>
    </thead>

    @foreach($cliente as $cliente)
        <tr class="ctdTB">
            <td class="dado2">{{$cliente->idCliente}}</td>
            <td class="dado">{{$cliente->nomeCliente}}</td>
            <td class="dado1">{{$cliente->cpfCliente}}</td>
            <td class="dado1">{{$cliente->cnsCliente}}</td>
            <td class="dado1">{{$cliente->rgCliente}}</td>
            <td class="dado1">{{$cliente->emailCliente}}</td>
            <td class="dado">{{$cliente->userCliente}}</td>
            <td class="dado">{{$cliente->cepCliente}}</td>
            <td class="dado">{{$cliente->cidadeCliente}}</td>
        </tr>
    @endforeach

</main>
</section>
<!-- CONTENT -->

@include('includes.footer') <!-- include -->
@include('includes.header') <!-- include -->

<!-- MAIN -->
<main>
	<div class="table-data">
		<div class="order">
			<div class="head">
				<h3>Cadastros</h3>
				<i class='bx bx-search'></i>
				<i class='bx bx-filter'></i>
			</div>
			<table>
				<thead>
					<tr>
						<th>Campo</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<p>Medicamento</p>
						</td>
						<td>
							<a href="/medicamentoForm">
								<span class="status busca">Cadastrar</span>
							</a>
						</td>
					</tr>
					<tr>
						<td>
							<p>Detentor</p>
						</td>
						<td>
							<a href="/detentor">
								<span class="status busca">Cadastrar</span>
							</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="table-data">
		<div class="order">
			<div class="head">
				<h3>Medicamentos</h3>
				<i class='bx bx-search'></i>
				<i class='bx bx-filter'></i>
			</div>
			<table>
				<thead>
					<tr>
						<th>Código de Barras</th>
						<th>Nome</th>
						<th>Nome Genérico</th>
						<th>Registro ANVISA</th>
						<th>Situação</th>
						<th>Data de Cadastro</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($medicamento as $med)
					<tr>
						<td style="padding: 10px;">{{ $med->codigoDeBarrasMedicamento }}</td>
						<td>{{ $med->nomeMedicamento }}</td>
						<td>{{ $med->nomeGenericoMedicamento }}</td>
						<td>{{ $med->registroAnvisaMedicamento }}</td>
						<td>{{ $med->situacaoMedicamento }}</td>
						<td>{{ \Carbon\Carbon::parse($med->dataCadastroMedicamento)->format('d/m/Y') }}</td>

						<!-- Botão para abrir o modal -->
						<td>
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetalhes{{ $med->idMedicamento }}">
								Ver mais
							</button>
						</td>
					</tr>

					<!-- Modal para os detalhes do medicamento -->
					<div class="modal fade" id="modalDetalhes{{ $med->idMedicamento }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Detalhes do Medicamento</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<p><strong>Código de Barras:</strong> {{ $med->codigoDeBarrasMedicamento }}</p>
									<p><strong>Nome:</strong> {{ $med->nomeMedicamento }}</p>
									<p><strong>Nome Genérico:</strong> {{ $med->nomeGenericoMedicamento }}</p>
									<p><strong>Registro ANVISA:</strong> {{ $med->registroAnvisaMedicamento }}</p>
									<p><strong>Forma Farmacêutica:</strong> {{ $med->formaFarmaceuticaMedicamento }}</p>
									<p><strong>Concentração:</strong> {{ $med->concentracaoMedicamento }}</p>
									<p><strong>Detentor:</strong> {{ $med->detentor->nomeDetentor ?? 'N/A' }}</p>
									<p><strong>Tipo Medicamento:</strong> {{ $med->tipoMedicamento->tipoMedicamento ?? 'N/A' }}</p>
									<p><strong>Situação:</strong> {{ $med->situacaoMedicamento }}</p>
									<p><strong>Data de Cadastro:</strong> {{ \Carbon\Carbon::parse($med->dataCadastroMedicamento)->format('d/m/Y') }}</p>

									<!-- Área da foto -->
									<div id="fotoMedicamento{{ $med->idMedicamento }}">
										@if($med->fotoMedicamentoOriginal)
										<p><strong>Foto Original:</strong></p>
										<img src="{{ asset('storage/' . $med->fotoMedicamentoOriginal) }}" alt="Foto Original" style="max-width: 100%;" id="imagemExibida{{ $med->idMedicamento }}">
										@else
										<p>Sem foto original.</p>
										@endif
									</div>

									<!-- Botão para alternar fotos -->
									<button type="button" class="btn btn-info" id="alternarFoto{{ $med->idMedicamento }}"
										data-tipo="original"
										data-foto-original="{{ asset('storage/' . $med->fotoMedicamentoOriginal) }}"
										data-foto-genero="{{ asset('storage/' . $med->fotoMedicamentoGenero) }}">
										Ver Foto de Gênero
									</button>
								</div>
								<div class="modal-footer">
									<a href="{{ route('medicamento.edit', $med->idMedicamento) }}" class="btn btn-warning">Editar</a>
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
								</div>
							</div>
						</div>
					</div>

					<script>
						document.addEventListener('DOMContentLoaded', function() {
							// Inicializa o tipo de foto como original
							var tipoAtual = 'original';
							var botaoAlternar = document.getElementById('alternarFoto{{ $med->idMedicamento }}');

							// Adiciona o evento ao botão de alternar foto
							botaoAlternar.addEventListener('click', function() {
								var imagem = document.getElementById('imagemExibida{{ $med->idMedicamento }}');

								// Alterna entre as fotos
								if (tipoAtual === 'original') {
									imagem.src = botaoAlternar.getAttribute('data-foto-genero');
									botaoAlternar.textContent = 'Ver Foto Original';
									tipoAtual = 'genero';
								} else {
									imagem.src = botaoAlternar.getAttribute('data-foto-original');
									botaoAlternar.textContent = 'Ver Foto de Gênero';
									tipoAtual = 'original';
								}
							});
						});
					</script>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</main>
</section>
<!-- CONTENT -->

@include('includes.footer') <!-- include -->

<!-- Link para o Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
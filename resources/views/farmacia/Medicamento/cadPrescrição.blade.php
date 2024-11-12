<!--CSS OK (ASS:Duda)-->

@include('includes.headerFarmacia')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/Farmacia-CSS/Prescricao.css')}}">

<nav class="navbar">
    <div class="navbar-brand">
        <img src="{{ asset('Image/3a.png') }}" alt="Logo" class="logo">
    </div>
    <div class="search-container">
        <input type="text" placeholder="Buscar..." class="search-input" style="border-radius: 30px;">
        <button class="search-button"><i class="fas fa-search"></i></button>
    </div>
</nav>

<div class="container-um">
    <div class="jumbotron-um">
        <h1 style="font-weight: bold;"> Cadastro de Prescrição </h1>
    </div>
    <div class="image-container">
        <img src="{{ asset('Image/lista.png') }}" alt="Cadastro de Medicamentos" class="img-fluid" />
    </div>
</div>

<main>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="form-wrapper">
        <form id="prescricaoForm" action="/Cadprescricao" method="POST" class="styled-form">
            @csrf
            <input type="hidden" id="prescricaoId" name="prescricaoId">

            <div class="form-row">
                <div class="form-group">
                    <label for="dataPrescricao">Data da Prescrição</label>
                    <div class="input-icon">
                        <i class="fas fa-calendar-alt"></i>
                        <input type="date" class="form-control" id="dataPrescricao" name="dataPrescricao" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="quantPrescricao">Quantidade</label>
                    <div class="input-icon">
                        <i class="fas fa-sort-numeric-up"></i>
                        <input type="number" class="form-control" id="quantPrescricao" name="quantPrescricao" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="dosagemPrescricao">Dosagem</label>
                    <div class="input-icon">
                        <i class="fas fa-prescription-bottle-alt"></i>
                        <input type="text" class="form-control" id="dosagemPrescricao" name="dosagemPrescricao" required>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="duracaoRemedio">Duração (em dias)</label>
                    <div class="input-icon">
                        <i class="fas fa-clock"></i>
                        <input type="number" class="form-control" id="duracaoRemedio" name="duracaoRemedio" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="idMedicamento">Medicamento</label>
                    <div class="input-icon">
                        <select class="form-control" id="idMedicamento" name="idMedicamento" required>
                            <option value="">Selecione um medicamento</option>
                            @foreach ($medicamento as $med)
                            <option value="{{ $med->idMedicamento }}">{{ $med->nomeMedicamento }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- Botões de Ação com Ícones -->
            <button type="submit" class="submit-btn" id="submitBtn" style="margin-left: 25%;">
                <i class="fas fa-save"></i> Cadastrar Prescrição
            </button>
            <button type="button" class="submit" id="saveChangesBtn" style="display: none;">
                <i class="fas fa-edit"></i> Salvar Alterações
            </button>
        </form>
    </div>

    <div class="col-md-8">
            <div class="head-title">
                <h4>Prescrições</h4>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Medicamento</th>
                        <th>Quantidade</th>
                        <th>Dosagem</th>
                        <th>Duração</th>
                        <th>Situação</th>

                        <th>Ações</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($prescricoes as $p)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($p->dataPrescricao)->format('d/m/Y') }}</td>
                        <td>{{ $p->medicamento->nomeMedicamento }}</td>
                        <td>{{ $p->quantPrescricao }}</td>
                        <td>{{ $p->dosagemPrescricao }}</td>
                        <td>{{ $p->duracaoRemedio }} dias</td>
                        <td>{{ $p->situacaoPrescricao  == 'A' ? 'Ativo' : 'Inativo' }}</td>

                        <td>
                            <button class="btn btn-warning btn-sm edit-btn"
                                data-id="{{ $p->idPrescricao }}"
                                data-data-prescricao="{{ $p->dataPrescricao }}"
                                data-quant-prescricao="{{ $p->quantPrescricao }}"
                                data-dosagem-prescricao="{{ $p->dosagemPrescricao }}"
                                data-duracao-remedio="{{ $p->duracaoRemedio }}"
                                data-id-medicamento="{{ $p->idMedicamento }}">
                                Editar
                            </button>
                        </td>
                        <td>
                            <form action="{{ route('prescricao.desativar', $p->idPrescricao) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja desativar esta prescrição?');">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger">Desativar</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@include('includes.footer')
<script>
        $(document).ready(function() {
            // Quando o botão "Editar" é clicado
            $('.edit-btn').click(function() {
                const dataPrescricao = $(this).data('data-prescricao');
                const quantPrescricao = $(this).data('quant-prescricao');
                const dosagemPrescricao = $(this).data('dosagem-prescricao');
                const duracaoRemedio = $(this).data('duracao-remedio');
                const idMedicamento = $(this).data('id-medicamento');
                const prescricaoId = $(this).data('id');

                $('#dataPrescricao').val(dataPrescricao);
                $('#quantPrescricao').val(quantPrescricao);
                $('#dosagemPrescricao').val(dosagemPrescricao);
                $('#duracaoRemedio').val(duracaoRemedio);
                $('#idMedicamento').val(idMedicamento);
                $('#prescricaoId').val(prescricaoId);

                // Atualiza a ação e o método do formulário
                $('#prescricaoForm').attr('action', `/Cadprescricao/${prescricaoId}`);
                $('#prescricaoForm').append('<input type="hidden" name="_method" value="PUT">'); // Adiciona método PUT

                // Mostra o botão "Salvar Alterações" e esconde o botão "Cadastrar Prescrição"
                $('#saveChangesBtn').show();
                $('#submitBtn').hide();
            });

            // Ao clicar no botão "Salvar Alterações", envia o formulário
            $('#saveChangesBtn').click(function() {
                $('#prescricaoForm').submit(); // Submete o formulário
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
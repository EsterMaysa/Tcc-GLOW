@include('includes.headerFarmacia')

<div class="container" style="margin: 10px;">
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
    <div class="row">
        <div class="col-md-4">
            <div class="head-title">
                <h3>Cadastrar </h3>
            </div>

            <form id="prescricaoForm" action="/Cadprescricao" method="POST">
                @csrf
                <!-- A ação e o método do formulário serão atualizados via JavaScript -->
                <input type="hidden" id="prescricaoId" name="prescricaoId">

                <div class="form-group">
                    <label for="dataPrescricao">Data da Prescrição</label>
                    <input type="date" class="form-control" id="dataPrescricao" name="dataPrescricao" required>
                </div>

                <div class="form-group">
                    <label for="quantPrescricao">Quantidade</label>
                    <input type="number" class="form-control" id="quantPrescricao" name="quantPrescricao" required>
                </div>

                <div class="form-group">
                    <label for="dosagemPrescricao">Dosagem</label>
                    <input type="text" class="form-control" id="dosagemPrescricao" name="dosagemPrescricao" required>
                </div>

                <div class="form-group">
                    <label for="duracaoRemedio">Duração (em dias)</label>
                    <input type="number" class="form-control" id="duracaoRemedio" name="duracaoRemedio" required>
                </div>

                <div class="form-group">
                    <label for="idMedicamento">Medicamento</label>
                    <select class="form-control" id="idMedicamento" name="idMedicamento" required>
                        <option value="">Selecione um medicamento</option>
                        @foreach ($medicamento as $med)
                        <option value="{{ $med->idMedicamento }}">{{ $med->nomeMedicamento }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Botões de Ação -->
                <button type="submit" class="btn btn-primary" id="submitBtn">Cadastrar Prescrição</button>
                <button type="button" class="btn btn-success" id="saveChangesBtn" style="display: none;">Salvar Alterações</button>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

    @include('includes.footer')
</div>
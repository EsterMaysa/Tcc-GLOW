@include('includes.headerFarmacia')

<div class="container">
    <!-- Main content -->
    <div class="row">
        <div class="col-md-5 ">
            <div class="head-title">
                <h1>Cadastrar Prescrição</h1>
            </div>

            <form action="/Cadprescricao" method="POST">
                @csrf

                <!-- Data da Prescrição -->
                <div class="form-group">
                    <label for="dataPrescricao">Data da Prescrição</label>
                    <input type="date" class="form-control" id="dataPrescricao" name="dataPrescricao" required>
                </div>

                <!-- Quantidade da Prescrição -->
                <div class="form-group">
                    <label for="quantPrescricao">Quantidade</label>
                    <input type="number" class="form-control" id="quantPrescricao" name="quantPrescricao" required>
                </div>

                <!-- Dosagem da Prescrição -->
                <div class="form-group">
                    <label for="dosagemPrescricao">Dosagem</label>
                    <input type="text" class="form-control" id="dosagemPrescricao" name="dosagemPrescricao" required>
                </div>

                <!-- Duração do Remédio -->
                <div class="form-group">
                    <label for="duracaoRemedio">Duração (em dias)</label>
                    <input type="number" class="form-control" id="duracaoRemedio" name="duracaoRemedio" required>
                </div>

                <!-- Medicamento -->
                <div class="form-group">
                    <label for="idMedicamento">Medicamento</label>
                    <select class="form-control" id="idMedicamento" name="idMedicamento" required>
                        <option value="">Selecione um medicamento</option>
                        @foreach ($medicamento as $med)
                            <option value="{{ $med->idMedicamento }}">{{ $med->nomeMedicamento }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Botão de Enviar -->
                <button type="submit" class="btn btn-primary">Cadastrar Prescrição</button>
            </form>
        </div>

        <!-- Tabela de Prescrições Cadastradas -->
        <div class="col-md-7 ">
            <div class="head-title">
                <h3>Prescrições Cadastradas</h3>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Medicamento</th>
                        <th>Quantidade</th>
                        <th>Dosagem</th>
                        <th>Duração</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prescricoes as $p)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($p->dataPrescricao)->format('d/m/Y') }}</td>
                            <td></td>
                            <td>{{ $p->quantPrescricao }}</td>
                            <td>{{ $p->medicamento->nomeMedicamento }}</td> 
                            <td>{{ $p->dosagemPrescricao }}</td>
                            <td>{{ $p->duracaoRemedio }} dias</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('includes.footer')

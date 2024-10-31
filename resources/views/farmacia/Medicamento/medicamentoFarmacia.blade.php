<!-- 
AQUI VAI A PAGINA DO MEDICAMENTO - A HOME MEDICAMENTO - QUE TERÁ O BOTÃO DE CADASTRAR 
O MEDICAMENTO QUE CHEGOU, ATUALIZAR E DESATIVAR, E PODERÁ VER OS MEDICAMENTOS DESSA FARMÁCIA. 
-->
@include('includes.headerFarmacia')

<div class="col-md-9 col-lg-10 main-content">
    <div class="head-title">
        <div class="left">
            <h1>Medicamentos Disponíveis</h1>
            <!-- Botão Novo Medicamento -->
            <a href="{{ route('entradaMedInsert') }}" class="btn btn-success" style="margin-bottom: 15px;">
                Novo Medicamento
            </a>
        </div>
    </div>

    <!-- Tabela de Medicamentos -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID Entrada</th>
                    <th>Nome do Medicamento</th>
                    <th>Data de Entrada</th>
                    <th>Quantidade</th>
                    <th>Lote</th>
                    <th>Validade</th>
                    <th>Motivo da Entrada</th>
                    <th>Funcionário Responsável</th>
                </tr>
            </thead>
            <tbody>
                @foreach($medicamentos as $medicamento)
                    <tr>
                        <td>{{ $medicamento->idEntradaMedicamento }}</td>
                        <td>{{ $medicamento->nomeMedicamento }}</td>
                        <td>{{ $medicamento->dataEntrada }}</td>
                        <td>{{ $medicamento->quantidade }}</td>
                        <td>{{ $medicamento->lote }}</td>
                        <td>{{ $medicamento->validade }}</td>
                        <td>{{ $medicamento->motivoEntrada }}</td>
                        <td>{{ $medicamento->nomeFuncionario }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('includes.footer')

<style>
    .table {
        margin: 20px 0;
        width: 100%;
        background-color: #14213D;
        color: #fff;
    }

    .table thead {
        background-color: #57b8ff;
    }

    .table tbody tr:hover {
        background-color: #4b89f5;
    }
</style>

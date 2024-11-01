@include('includes.headerFarmacia')

@section('content')
<div class="container">
    <h2>Cadastrar Saída de Medicamento</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('saidaMedicamento.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="dataSaida">Data de Saída</label>
            <input type="date" id="dataSaida" name="dataSaida" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="number" id="quantidade" name="quantidade" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="idMotivoSaida">Motivo da Saída</label>
            <select id="idMotivoSaida" name="idMotivoSaida" class="form-control" required>
                <option value="">Selecione o motivo</option>
                @foreach($motivos as $motivo)
                    <option value="{{ $motivo->idMotivoSaida }}">{{ $motivo->descricao }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
@endsection
@include('includes.footer')

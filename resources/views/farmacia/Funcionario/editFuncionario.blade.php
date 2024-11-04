<!-- resources/views/farmacia/Funcionario/editFuncionario.blade.php -->

<h2>Editar Funcionário</h2>

<form action="{{ route('funcionario.update', $funcionario->idFuncionario) }}" method="POST">
    @csrf
    @method('PUT') <!-- Método PUT para atualização -->
    <div>
        <label>Nome:</label>
        <input type="text" name="nomeFuncionario" value="{{ $funcionario->nomeFuncionario }}" required>
    </div>
    <div>
        <label>CPF:</label>
        <input type="text" name="cpfFuncionario" value="{{ $funcionario->cpfFuncionario }}" required>
    </div>
    <div>
        <label>Cargo:</label>
        <input type="text" name="cargoFuncionario" value="{{ $funcionario->cargoFuncionario }}" required>
    </div>
    
    <button type="submit">Atualizar</button>
</form>

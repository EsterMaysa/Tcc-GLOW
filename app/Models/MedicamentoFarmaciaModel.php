<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicamentoFarmaciaModel extends Model
{
    use HasFactory;
    protected $connection = 'mysql2'; // Conexão com o segundo banco de dados
    
    // Define os campos que podem ser preenchidos em massa
    protected $table = 'tbmedicamentoFarmacia'; // Define o nome da tabela
    protected $fillable = [
        'nomeMedicamento',
        'nomeGenericoMedicamento',
        'codigoDeBarrasMedicamento',
        'validadeMedicamento',
        'loteMedicamento',
        'fabricacaoMedicamento',
        'dosagemMedicamento',
        'formaFarmaceuticaMedicamento',
        'quantMedicamento',
        'composicaoMedicamento',
        'idFabricante',
        'idTipoMedicamento',
        'situacaoMedicamento',
    ];
    public $timestamps = false;
    // Define os campos que são ocultados nas respostas JSON
    protected $hidden = [
        'idMedicamento', // Caso queira ocultar o id
    ];
}

<?php
//Tabela da Farmacia

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelFuncionarioFarmaciaUBS extends Model
{
    use HasFactory;

    protected $table = 'tbFuncionarioFarmaciaUBS';
    protected $primaryKey = 'idFuncionario';
    protected $connection = 'mysql2';

    protected $fillable = [
        'nomeFuncionario',
        'cpfFuncionario',
        'cargoFuncionario',
        'situacaoFuncionario',
        'dataCadastroFuncionario'
    ];

    public function entradas()
    {
        return $this->hasMany(ModelEntradaMedicamento::class, 'idFuncionario');
    }

    public function estoques()
    {
        return $this->hasMany(ModelEstoqueFarmaciaUBS::class, 'idFuncionario');
    }
}

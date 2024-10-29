<?php
//Tabela da Farmacia

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelMedicamentoFarmaciaUBS extends Model
{
    use HasFactory;

    protected $table = 'tbMedicamentoFarmaciaUBS';
    protected $primaryKey = 'idMedicamento';
    protected $connection = 'mysql2';

    protected $fillable = [
        'nomeMedicamento',
        'nomeGenericoMedicamento',
        'codigoDeBarrasMedicamento',
        'validadeMedicamento',
        'loteMedicamento',
        'dosagemMedicamento',
        'formaFarmaceuticaMedicamento',
        'composicaoMedicamento',
        'situacaoMedicamento',
        'dataCadastroMedicamento'
    ];

    public function prescricoes()
    {
        return $this->hasMany(ModelPrescricao::class, 'idMedicamento');
    }

    public function entradas()
    {
        return $this->hasMany(ModelEntradaMedicamento::class, 'idMedicamento');
    }

    public function estoques()
    {
        return $this->hasMany(ModelEstoqueFarmaciaUBS::class, 'idMedicamento');
    }
}

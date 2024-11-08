<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModelMedicamentoFarmaciaUBS;
<<<<<<< HEAD
=======
use App\Models\ModelFuncionarioFarmaciaUBS;

>>>>>>> ae34801ced9cf33c505834152432695ce508b469

class ModelSaidaMedicamento extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'tbsaidamedicamento';
    protected $primaryKey = 'idSaidaMedicamento'; // Adicione isso
    public $incrementing = true; // Se a chave primária é auto-incrementada
    public $timestamps = false;

    protected $fillable = [
        'dataSaida',
        'quantidade',
        'motivoSaida',
        'situacao',
<<<<<<< HEAD
        'idMedicamento', // Adicione aqui
=======
        'idFuncionario',
        'idMedicamento',
        'lote',        // Adicionado para registrar o lote do medicamento
        'validade',    // Adicionado para registrar a validade do medicamento
        'idMotivoSaida'  
>>>>>>> ae34801ced9cf33c505834152432695ce508b469
    ];


   // No ModelSaidaMedicamento
    public function medicamento()
    {
        return $this->belongsTo(ModelMedicamentoFarmaciaUBS::class, 'idMedicamento', 'idMedicamento');
    }

<<<<<<< HEAD
}
=======
    public function funcionario()
    {
        return $this->belongsTo(ModelFuncionarioFarmaciaUBS::class, 'idFuncionario', 'idFuncionario');
    }

}
>>>>>>> ae34801ced9cf33c505834152432695ce508b469

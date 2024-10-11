<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicamentoModel extends Model
{
    use HasFactory;

    protected $table = 'tbMedicamento';
    protected $connection = 'mysql';

    protected $fillable = [
        'nomeMedicamento',
        'nomeGenericoMedicamento',
        'codigoDeBarrasMedicamento',
        'registroAnvisaMedicamento',
        'concentracaoMedicamento',
        'formaFarmaceuticaMedicamento',
        'composicaoMedicamento',
        'fotoMedicamentoOriginal',
        'fotoMedicamentoGenero',
        'idDetentor',
        'idTipoMedicamento',
        'situacaoMedicamento',
        'dataCadastroMedicamento',
    ];

    public $timestamps = false;
}

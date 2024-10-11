<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMedicamentoModel extends Model
{
    use HasFactory;

    protected $table = 'tbTipoMedicamento';
    protected $connection = 'mysql';

    protected $fillable = [
        'tipoMedicamento',
        'situacaoTipoMedicamento',
        'formaMedicamento',
        'dataCadastroTipoMedicamento',
    ];

    public $timestamps = false;
}

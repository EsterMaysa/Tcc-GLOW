<?php
//Tabela da Farmacia

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSaidaMedicamento extends Model
{
    use HasFactory;

    protected $table = 'tbSaidaMedicamento';
    protected $primaryKey = 'idSaidaMedicamento';
    protected $connection = 'mysql2';

    protected $fillable = [
        'dataSaida',
        'quantidade',
        'idMotivoSaida'
    ];

    public function motivoSaida()
    {
        return $this->belongsTo(ModelMotivoSaida::class, 'idMotivoSaida');
    }
}

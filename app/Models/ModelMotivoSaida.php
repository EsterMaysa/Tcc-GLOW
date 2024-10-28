<?php
//Tabela da Farmacia

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelMotivoSaida extends Model
{
    use HasFactory;

    protected $table = 'tbMotivoSaida';
    protected $primaryKey = 'idMotivoSaida';
    protected $connection = 'mysql2';

    protected $fillable = [
        'motivoSaida'
    ];

    public function saidas()
    {
        return $this->hasMany(ModelSaidaMedicamento::class, 'idMotivoSaida');
    }
}

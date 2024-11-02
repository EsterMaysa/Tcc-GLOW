<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSaidaMedicamento extends Model
{
    use HasFactory;

    protected $table = 'tbsaidamedicamento';

    protected $fillable = [
        'dataSaida',
        'quantidade',
        'idMotivoSaida'
    ];

    public $timestamps = false;

    // Relacionamento com o motivo de saída
    public function motivoSaida()
    {
        return $this->belongsTo(ModelMotivoSaida::class, 'idMotivoSaida');
    }
}

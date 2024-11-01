<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaidaMedicamento extends Model
{
    use HasFactory;

    protected $table = 'tbsaidaMedicamento';
    protected $primaryKey = 'idSaidaMedicamento';
    public $timestamps = false;

    protected $fillable = [
        'dataSaida',
        'quantidade',
        'idMotivoSaida',
    ];
}

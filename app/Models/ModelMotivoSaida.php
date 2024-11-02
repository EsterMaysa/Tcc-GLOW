<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelMotivoSaida extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $primaryKey = 'idMotivoSaida';

    protected $table = 'tbmotivosaida'; // Verifique se este nome está correto

    protected $fillable = ['motivosaida'];

    public $timestamps = false; // Se a tabela não tem os campos created_at e updated_at
}

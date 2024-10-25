<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministradorModel extends Model
{
    use HasFactory;

    protected $table = 'tbAdministrador'; // Nome da tabela
    protected $primaryKey = 'idAdministrador'; // Chave primária

    protected $fillable = [
        'fotoAdministrador',
        'nomeAdministrador',
        'emailAdministrador',
        'senhaAdministrador',
        'situacaoAdministrador',
        'dataCadastroAdministrador',
    ];

    public $timestamps = false;
}

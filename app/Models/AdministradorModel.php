<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministradorModel extends Model
{
    use HasFactory;

    // Define a tabela associada ao model
    protected $table = 'tbAdministrador';

    // Define a chave primária da tabela
    protected $primaryKey = 'idAdministrador';

    // Indica que a chave primária não é incremental (se fosse `false`, teríamos que configurar)
    public $incrementing = true;

    // Define os tipos de dados dos campos
    protected $casts = [
        'dataCadastroAdministrador' => 'date',
    ];

    // Define os campos que podem ser preenchidos em massa (mass assignment)
    protected $fillable = [
        'fotoAministrador',
        'nomeAdministrador',
        'emailAdministrador',
        'senhaAdministrador',
        'situacaoAdministrador',
        'dataCadastroAdministrador'
    ];

    // Desabilita os timestamps automáticos (created_at e updated_at)
    public $timestamps = false;
}

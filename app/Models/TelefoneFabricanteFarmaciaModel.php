<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelefoneFabricanteFarmaciaModel extends Model
{
    use HasFactory;
    protected $connection = 'mysql2'; // Conexão com o segundo banco de dados
    // Defina a tabela associada ao modelo
    protected $table = 'tbTelefoneFabricante';

    // Defina a chave primária, se diferente de 'id'
    protected $primaryKey = 'idTelefoneFabricante';

    // Permita a atribuição em massa dos campos
    protected $fillable = [
        'numeroTelefoneFabricante',
        'situacaoTelefoneFabricante',
        'dataCadastroTelefoneFabricante',
    ];

    // Desabilite a atualização automática de timestamps
    public $timestamps = false;
}

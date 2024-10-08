<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelefoneClienteFarmaciaModel extends Model
{
    use HasFactory;
    protected $connection = 'mysql2'; // Conexão com o segundo banco de dados
    // Defina o nome da tabela se for diferente do plural do nome do modelo
    protected $table = 'tbTelefoneCliente';

    // Defina a chave primária se não for 'id'
    protected $primaryKey = 'idTelefoneCliente';

    // Habilitar timestamps se sua tabela tiver campos created_at e updated_at
    public $timestamps = false;
    // Defina os atributos que podem ser atribuídos em massa
    protected $fillable = [
        'numeroTelefoneCliente',
        'situacaoTelefoneCliente',
        'dataCadastroTelefoneCliente',
    ];

    // Se você não quiser que o Laravel utilize timestamps automáticos, 
    // remova a linha $timestamps ou defina como false:
    // public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TelefoneClienteAdmModel extends Model
{
    // Define a tabela associada ao model
    protected $table = 'tbTelefoneCliente';

    // Define a chave primária da tabela
    protected $primaryKey = 'idTelefoneCliente';

    // Define os campos que podem ser preenchidos em massa (mass assignment)
    protected $fillable = [
        'numeroTelefoneCliente',
        'situacaoTelefoneCliente',
        'dataCadastroTelefoneCliente'
    ];

    // Desativa as colunas de timestamps padrão (created_at, updated_at)
    public $timestamps = false;

    // Define o relacionamento com o model ClienteAdmModel (um telefone pertence a um cliente)
    public function cliente()
    {
        return $this->hasOne(ClienteAdmModel::class, 'idTelefoneCliente', 'idTelefoneCliente');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteAdmModel extends Model
{
    // Define a tabela associada ao model
    protected $table = 'tbCliente';

    // Define a chave primária da tabela
    protected $primaryKey = 'idCliente';

    // Define os campos que podem ser preenchidos em massa (mass assignment)
    protected $fillable = [
        'nomeCliente',
        'cpfCliente',
        'cnsCliente',
        'dataNascCliente',
        'userCliente',
        'cepCliente',
        'logradouroCliente',
        'bairroCliente',
        'estadoCliente',
        'cidadeCliente',
        'numeroCliente',
        'ufCliente',
        'complementoCliente',
        'idTelefoneCliente',
        'situacaoCliente',
        'dataCadastroCliente'
    ];

    // Desativa as colunas de timestamps padrão (created_at, updated_at)
    public $timestamps = false;

    // Define o relacionamento com o model TelefoneClienteAdmModel (um cliente possui um telefone)
    public function telefone()
    {
        return $this->belongsTo(TelefoneClienteAdmModel::class, 'idTelefoneCliente', 'idTelefoneCliente');
    }
}

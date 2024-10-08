<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteFarmaciaModel extends Model
{
    use HasFactory;

    protected $connection = 'mysql2'; 

    protected $table = 'tbcliente';

    public $fillable= ['idCliente ','nomeCliente','cpfCliente','dataNascCliente','userCliente','cepCliente','logradouroCliente','bairroCliente','estadoCliente','cidadeCliente','numeroCliente','ufCliente','complementoCliente','idTelefoneCliente','situacaoCliente','dataCadastroCliente' ];

    public $timestamps = false;
}

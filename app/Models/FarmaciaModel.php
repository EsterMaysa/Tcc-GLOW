<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; //IMporta em todas as tabelas que precisa de verificação

class FarmaciaModel extends Authenticatable
{
    
    use HasFactory;

    protected $table = 'tbfarmacia';
    protected $connection = 'mysql2'; // Conexão com o segundo banco de dados


    protected $fillable = [
        'nomeFarmacia',
        'fotoFarmacia',
        'cnpjFarmacia',
        'latitudeFarmacia',
        'longitudeFarmacia',
        'cepFarmacia',
        'logradouroFarmacia',
        'bairroFarmacia',
        'numeroFarmacia',
        'complementoFarmacia',
        'estadoFarmacia',
        'ufFarmacia',
        'cidadeFarmacia',
        'emailFarmacia',
        'senhaFarmacia',
        'idRegiao',
        'idTipoFarmacia',
        'situacaoFarmacia',
        'dataCadastroFarmacia'
    ];
    public $timestamps = false;
}

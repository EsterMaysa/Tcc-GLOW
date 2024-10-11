<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UBSModel extends Model
{
    use HasFactory;

    protected $table = 'tbUBS';
    protected $connection = 'mysql';

    protected $fillable = [
        'nomeUBS',
        'fotoUBS',
        'cnpjUBS',
        'latitudeUBS',
        'longitudeUBS',
        'cepUBS',
        'logradouroUBS',
        'bairroUBS',
        'estadoUBS',
        'cidadeUBS',
        'numeroUBS',
        'ufUBS',
        'complementoUBS',
        'senhaUBS',
        'situacaoUBS',
        'dataCadastroUBS',
        'idTelefoneUBS',
        'idRegiaoUBS',
    ];

    public $timestamps = false;
}

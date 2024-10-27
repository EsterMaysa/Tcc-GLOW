<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministradorModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'tbadministrador'; // Nome da tabela
    
    protected $connection = 'mysql';

    protected $fillable = [
        'fotoAministrador',
        'nomeAdministrador',
        'emailAdministrador',
        'senhaAdministrador',
        'situacaoAdministrador',
        'dataCadastroAdministrador',
    ];
    protected $hidden = [
        'senhaAdministrador'
    ];
    public $timestamps = false;
}

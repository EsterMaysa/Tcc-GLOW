<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; //IMporta em todas as tabelas que precisa de verificação

class AdministradorModel extends Authenticatable //para verificar colocado o authnticatable
{
    
    use HasFactory;

    protected $table = 'tbAdministrador';
    protected $connection = 'mysql';

    public $fillable= ['idAdministrador  ','nomeAdministrador ','emailAdministrador ','senhaAdministrador','tipoAdministrador','situaçãoAdministrador','dataCadastroAdministrador'];

    public $timestamps = false;


}

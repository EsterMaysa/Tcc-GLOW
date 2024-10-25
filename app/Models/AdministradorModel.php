<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministradorModel extends Authenticatable
{
    use HasFactory;

<<<<<<< HEAD
    protected $table = 'tbadministrador'; // Nome da tabela
    
    protected $connection = 'mysql';

    protected $fillable = [
        'fotoAministrador',
=======
    protected $table = 'tbAdministrador'; // Nome da tabela
    protected $primaryKey = 'idAdministrador'; // Chave primária

    protected $fillable = [
        'fotoAdministrador',
>>>>>>> 0349e4548ae6bd605b4a2686a1337a1d61506c8d
        'nomeAdministrador',
        'emailAdministrador',
        'senhaAdministrador',
        'situacaoAdministrador',
        'dataCadastroAdministrador',
    ];
<<<<<<< HEAD
    protected $hidden = [
        'senhaAdministrador'
    ];
=======

>>>>>>> 0349e4548ae6bd605b4a2686a1337a1d61506c8d
    public $timestamps = false;
}

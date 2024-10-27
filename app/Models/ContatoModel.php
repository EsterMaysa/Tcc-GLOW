<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContatoModel extends Model
{
    use HasFactory;

    protected $table = 'tbContato';
    protected $connection = 'mysql';

    protected $fillable = [
        'mensagemCcontato',
        'situaçãoContato',
        'dataCadastroContato',
        'idUsuario',
    ];

    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(UsuarioModel::class, 'idUsuario');
    }
}

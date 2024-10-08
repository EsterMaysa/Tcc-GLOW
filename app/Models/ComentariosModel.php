<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentariosModel extends Model
{
    use HasFactory;

    protected $table = 'tbComentarios';

    protected $fillable = [
        'comentario',
        'idUsuario',
        'situaçãoComentarios',
        'dataCadastroComentario',
    ];

    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(UsuarioModel::class, 'idUsuario');
    }
}

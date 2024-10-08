<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificacaoComentarioModel extends Model
{
    use HasFactory;

    protected $table = 'tbNotificacaoComentario';

    protected $fillable = [
        'idComentarios',
        'situaçãoNotificacaoComentario',
        'dataCadastroNotificacaoComentario',
    ];

    public $timestamps = false;

    public function comentario()
    {
        return $this->belongsTo(ComentariosModel::class, 'idComentarios');
    }
}

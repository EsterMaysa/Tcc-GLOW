<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioModel extends Model
{
    use HasFactory;

    protected $table = 'tbUsuario';
    protected $connection = 'mysql'; // Verifique se este é o nome correto da conexão

    protected $fillable = [
        'nomeUsuario',
        'fotoUsuario',
        'cnsUsuario',
        'senhaUsuario',
        'situacaoUsuario', // Corrigido para remover o acento
        'dataCadastroUsuario',
    ];

    public $timestamps = false; // Mantenha isso se não precisar de timestamps
}
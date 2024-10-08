<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class EstoqueFarmaciaModel extends Model
{
    protected $connection = 'mysql2'; // Conexão com o segundo banco de dados

    use HasFactory;

    protected $table = 'tbestoque';

    public $fillable = ['idEstoque', 'quantEstoque','dataMovimentacao', 'idFuncionario', 'idMedicamento', 'idTipoMovimentacao', 'situacaoEstoque', 'dataCadastroEstoque' ];
    
    public $timestamps = false;
}

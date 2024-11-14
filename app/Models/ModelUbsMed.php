<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelUbsMed extends Model
{
    use HasFactory;

    // Define a tabela que este model irá manipular
    protected $table = 'tbubsmed';

    // Define a chave primária, caso não seja o padrão (id)
    protected $primaryKey = ['idMedicamento', 'idUBS']; // Caso sua chave primária seja composta

    // Desabilitar a atribuição em massa para segurança
    protected $guarded = [];

    // Indica que a chave primária não é auto incremento
    public $incrementing = false;

    // Define o tipo de dados para a chave primária composta
    protected $keyType = 'string'; // Caso seus ids sejam inteiros, não é necessário definir

    public $timestamps = false; // Caso não tenha os campos created_at e updated_at

    public function medicamento()
    {
        return $this->belongsTo(MedicamentoModel::class, 'idMedicamento', 'idMedicamento');
    }
    public function ubs()
    {
        return $this->belongsTo(UBSModel::class, 'idUBS', 'idUBS');
    }


}

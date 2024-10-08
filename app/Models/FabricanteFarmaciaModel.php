<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricanteFarmaciaModel extends Model
{
    use HasFactory;
    protected $connection = 'mysql2'; // Conexão com o segundo banco de dados

    // Nome da tabela associada ao modelo
    protected $table = 'tbFabricanteFarmacia';

    // Atributos que podem ser atribuídos em massa
    protected $fillable = [
        'nomeFabricante',
        'cnpjFabricante',
        'emailFabricante',
        'logradouroFabricante',
        'bairroFabricante',
        'estadoFabricante',
        'cidadeFabricante',
        'numeroFabricante',
        'ufFabricante',
        'cepFabricante',
        'complementoFabricante',
        'idTelefoneFabricante',
        'situacaoFabricante',
        'dataCadastroFabricante',
    ];
    public $timestamps = false;

    // Caso você tenha um relacionamento com a tabela de medicamentos
    public function medicamentos()
    {
        return $this->hasMany(Medicamento::class, 'idFabricante');
    }

    // Adicione outros relacionamentos se necessário
}

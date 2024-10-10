<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmaciaUBSModel extends Model
{
    use HasFactory;

    protected $table = 'tbFamaciaUBS';
    protected $connection = 'mysql';

    protected $fillable = [
        'nomeFamaciaUBS',
        'emailFamaciaUBS',
        'senhaFamaciaUBS',
        'tipoFamaciaUBS',
        'situacaoFamaciaUBS',
        'dataCadastroFamaciaUBS',
    ];

    public $timestamps = false;
}

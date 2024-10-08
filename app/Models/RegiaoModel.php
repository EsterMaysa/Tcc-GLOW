<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegiaoModel extends Model
{
    use HasFactory;

    protected $table = 'tbRegiao';

    protected $fillable = [
        'nomeRegiao',
        'situaçãoRegiao',
        'dataCadastroRegiao',
    ];

    public $timestamps = false;
}

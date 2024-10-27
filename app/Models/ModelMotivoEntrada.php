<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelMotivoEntrada extends Model
{
    use HasFactory;

    protected $table = 'tbMotivoEntrada';

    protected $connection = 'mysql2';

    public $timestamps = false;

    protected $fillable = [
        'motivoEntrada',
    ];
}
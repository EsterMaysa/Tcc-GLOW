<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicamentoModel extends Model
{
    use HasFactory;
    protected $connection = 'mysql2'; // Conexão com o segundo banco de dados
    protected $table = 'tbmedicamentofarmacia';

    public $fillable= ['idMedicamento','nomeMedicamento', 'nomeGenericoMedicamento', 'codigoDeBarrasMedicamento', 'validadeMedicamento', 'loteMedicamento', 'fabricacaoMedicamento', 'dosagemMedicamento', 'formaFarmaceuticaMedicamento', 'fabricanteMedicamento' , 'quantMedicamento', 'composicaoMedicamento','idTipoMedicamento','idFabricante'];
    
    public $timestamps = false;
}

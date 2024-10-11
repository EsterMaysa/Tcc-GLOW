<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteFarmaciaController; // Certifique-se de importar o ClienteController
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\MedicamentoFarmaciaController;
use App\Http\Controllers\TelefoneClienteController;
use App\Http\Controllers\tipoMedicamentoController;
use App\Http\Controllers\TelefoneFabricanteFarmaciaController;
use App\Http\Controllers\FarmaciaUBSController;






//novos controllers
use App\Http\Controllers\UBSController;
use App\Http\Controllers\TelefoneUBSController;
use App\Http\Controllers\RegiaoUBSController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui é onde você pode registrar as rotas da web para o seu aplicativo.
| Essas rotas são carregadas pelo RouteServiceProvider dentro de um grupo
| que contém o grupo de middleware "web". Agora crie algo incrível!     
|
*/

//NOVAS

// Rota para exibir o formulário de cadastro da UBS
Route::get('/formUBS', function () {
    return view('adm.Ubs.formUBS');
});

// Rota para salvar os dados da UBS, que deve estar no método 'store' do UBSController
Route::post('/insertUBS', [UBSController::class, 'store'])->name('insertUBS');


<<<<<<< HEAD
//rota para o formulario de inserção da UBS
Route::get('/insertFarmaciaUbs', [FarmaciaUBSController::class, 'create'])->name('farmaciaUBS.insert');
Route::post('/insertFarmaciaUbs', [FarmaciaUBSController::class, 'store'])->name('farmaciaUBS.store');
=======


Route::get('/formTelefone', function () {
    return view('adm.Ubs.formTelefone');
});

// Rota para salvar os dados da UBS, que deve estar no método 'store' do UBSController
Route::post('/insertTelefone', [TelefoneUBSController::class, 'store'])->name('insertTelefone');

Route::get('/formRegiao', function () {
    return view('adm.Ubs.formRegiao');
});

// Rota para salvar os dados da UBS, que deve estar no método 'store' do UBSController
Route::post('/insertRegiao', [RegiaoUBSController::class, 'store'])->name('insertRegiao');



>>>>>>> f6c847e9cc8c4f793ebc6ceeb710e71d1fb97b68








































/* Páginas  farmacia*/
Route::get('/loginFarmacia', function () {
    return view('farmacia.loginFarmacia');
});

Route::get('/cadastroFarmacia', function () {
    return view('farmacia.cadastroFarmacia');
});

Route::get('/homeFarmacia', function () {
    return view('farmacia.homeFarmacia');
});
Route::get('/perfilFarmacia', function () {
    return view('farmacia.perfilFarmacia');
});

Route::get('/editarPerfilFarmacia', function () {
    return view('farmacia.editarPerfilFarmacia');
});
Route::get('/cadastros', function () {
    return view('farmacia.cadastros');
});

Route::get('/estoque', function () {
    return view('farmacia.estoque');
});

Route::get('/medicamento', function () {
    return view('farmacia.MedicamentoFarmacia');
});

Route::get('/fabricante', function () {
    return view('farmacia.fabricanteFarma');
});


/* Páginas ADM */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('adm.login');
});
Route::get('/cadastroAdm', function () {
    return view('adm.cadastroAdm');
});

Route::get('/perfil', function () {
    return view('adm.Perfil.perfil');
})->name('perfil');


Route::get('/editarPerfil', function () {
    return view('adm.Perfil.editarPerfil');
});

// Route::get('/configuracoes', function () {
//     return view('adm.configuracoes');
// });
// Route::get('/configuracoesNotificacoes', function () {
//     return view('adm.configuracoesNotificacoes');
// });
// Route::get('/notificacoes', function () {
//     return view('adm.Notificacao.notificacoes');
// });

//PAGINAS MEDICAMENTO_UBS_CLIENTE
Route::get('/medicamento', function () {
    return view('adm.Medicamento.medicamento');
});
Route::get('/ubs', function () {
    return view('adm.UBS.UBS');
});
Route::get('/cliente', function () {
    return view('adm.cliente.Cliente');
});


Route::get('/contato', function () {
    return view('adm.contato');
});




//SELECT
Route::get('/getUsuario','App\Http\Controllers\UsuarioController@index');


// Login adm
Route::post('/admLogin', 'App\Http\Controllers\AdministradorController@login');
Route::post('/logout','App\Http\Controllers\AdministradorController@logout');

Route::get('/', function () {
    return view('welcome'); // Retorna a view home do Adm
})->name('homeAdm');

// Route::get('/perfil', 'App\Http\Controllers\AdministradorController@perfil')->name('perfil');


// Login Farmacia
Route::post('/farmaciaLogin', 'App\Http\Controllers\FarmaciaController@login');
Route::post('/farmaLogout','App\Http\Controllers\FarmaciaController@logout');

//
Route::get('/', function () {
    return view('welcome'); // Retorna a view home do Adm
})->name('homeAdm');
// Route::get('/perfil', 'App\Http\Controllers\AdministradorController@perfil')->name('perfil');

// Cadastros
Route::post('/farmacia', 'App\Http\Controllers\FarmaciaController@store');
Route::post('/adm', 'App\Http\Controllers\AdministradorController@store');


//INSEERTS ESTER FUNCIONANDO

//ROTA PARA O METODO Insert ADM
// Route::post('/criarCliente', 'App\Http\Controllers\ClienteController@store');
// Route::post('/criarRegiao', 'App\Http\Controllers\regiaoControllers@store');
// Route::post('/criarComentario', 'App\Http\Controllers\comentariosController@store');
// Route::post('/criarContato', 'App\Http\Controllers\contatoController@store');
// Route::post('/criarEstoque', 'App\Http\Controllers\estoqueController@store');
// Route::post('/criarFarmacia', 'App\Http\Controllers\farmaciaController@storeInsertADM');
// Route::post('/criarNotificacaoComentario', 'App\Http\Controllers\notificacaoComentarioController@store');
// Route::post('/criarNotificacaoEstoque', 'App\Http\Controllers\notificacaoEstoqueController@store');


//ROTA PARA A PAGINA DO INSERT ADM
Route::get('/insertCliente', function () {
    return view('clienteInsert');
});
Route::get('/regiaoInsert', function () {
    return view('regiaoInsert');
});
Route::get('/comentarioInsert', function () {
    return view('comentarioInsert');
});
Route::get('/contatoInsert', function () {
    return view('contatoInsert');
});
Route::get('/estoqueInsert', function () {
    return view('estoqueInsert');
});
Route::get('/farmaciaInsert', function () {
    return view('farmaciaInsert');
});
Route::get('/notificacaoComentarioInsert', function () {
    return view('notificacaoComentarioInsert');
});
Route::get('/notificacaoEstoqueInsert', function () {
    return view('notificacaoEstoqueInsert');
});

//pagina de cadastros da farmacia


//estoqueFaarmacia
// // Rota para exibir o formulário de criar novo medicamento
 Route::get('/editarMedicamentoEstoque', [MedicamentoController::class, 'create']);


// // Rota para processar o formulário de criação de medicamento
 Route::post('/editarMedicamentoEstoque', [MedicamentoController::class, 'store'])->name('medicamento.store');




//clienteFarmacia
 Route::get('/cadastros', [ClienteFarmaciaController::class, 'create'])->name('cliente.create'); // Rota para exibir o formulário
 Route::post('/cadastros', [ClienteFarmaciaController::class, 'store'])->name('cliente.store'); // Rota para salvar os dados no banco
 

//telefone
Route::get('/telefones', [TelefoneClienteController::class, 'index'])->name('telefones.index');
Route::get('/telefones/create', [TelefoneClienteController::class, 'create'])->name('telefones.create');
Route::post('/telefones', [TelefoneClienteController::class, 'store'])->name('telefones.store');
Route::get('/telefones/{id}/edit', [TelefoneClienteController::class, 'edit'])->name('telefones.edit');
Route::put('/telefones/{id}', [TelefoneClienteController::class, 'update'])->name('telefones.update');
Route::delete('/telefones/{id}', [TelefoneClienteController::class, 'destroy'])->name('telefones.destroy');


//Medicamento farmacia
// Rotas para MedicamentoFarmacia

// 

//Rotas do Medicamento
Route::get('/medicamentos', [MedicamentoFarmaciaController::class, 'index'])->name('medicamentos.index');
Route::post('/medicamentos', [MedicamentoFarmaciaController::class, 'store']);



Route::get('/atualizarMedicamentoEstoque/{id}', [MedicamentoFarmaciaController::class, 'edit'])->name('medicamento.edit');
Route::put('/medicamentos', [MedicamentoFarmaciaController::class, 'update'])->name('medicamento.update');

// tipo med
// Route::get('/tipoMedicamento', [tipoMedicamentoController::class, 'index'])->name('tipoMedicamento.index');

Route::post('/fabricanteFarma','App\Http\Controllers\FabricanteController@store');

//rota telefone do fabricante
Route::get('/telefonesFabricante', [TelefoneFabricanteFarmaciaController::class, 'index'])->name('telefones.index');
Route::post('/telefonesFabricante', [TelefoneFabricanteFarmaciaController::class, 'store'])->name('telefones.store');
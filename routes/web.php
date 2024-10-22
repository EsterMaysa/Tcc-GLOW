<?php

use App\Http\Controllers\ClienteAdmController;
use App\Http\Controllers\TelefoneClienteAdmController;
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
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\DetentorController;
use Illuminate\Http\Request;


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



//Rotas para Rota para abir o form do telefone 
Route::get('/formTelefone', function () {
    return view('adm.Ubs.formTelefone');
});
//vini

//Rota para o form da região
Route::get('/formRegiao', function () {
    return view('adm.Ubs.formRegiao');
});

//Rota do insert do telefone
Route::post('/insertTelefone', [TelefoneUBSController::class, 'store'])->name('insertTelefone');

//Rota para o select do posto
Route::get('/selectUBS', [UBSController::class, 'index']);

//Rota do select da regiao
Route::get('/selectRegiao', [RegiaoUBSController::class, 'index']);

Route::get('/selectRegiaoForm', [UBSController::class, 'apresentarRegiao']);

Route::put('/ubs/{idUBS}', [UBSController::class, 'update'])->name('ubs.update');
Route::get('/ubs/{idUBS}/edit', [UBSController::class, 'edit'])->name('ubs.edit');

Route::post('/ubs/status/{idUBS}', [UbsController::class, 'changeStatus'])->name('changeStatus');


// Rota para salvar os dados da UBS, que deve estar no método 'store' do UBSController
Route::post('/insertUBS', [UBSController::class, 'store'])->name('insertUBS');

//Rota para o insert da região
Route::post('/insertRegiao', [RegiaoUBSController::class, 'store'])->name('insertRegiao');


//rota para o formulario de inserção da Farmacia
// Route::get('/insertFarmaciaUbs', [FarmaciaUBSController::class, 'create']);

// Route::post('/insertFarmaciaUbs', [FarmaciaUBSController::class, 'store']);
// Route::get('/Farmacia', function () {
//     return view('adm.Ubs.insertFarmaciaUbs');
// });

// //rota para mostrar select das farmacia cadastradas
// Route::get('/insertFarmaciaUbs', [FarmaciaUBSController::class, 'create']);


// Route::get('/insertFarmaciaUbs', [FarmaciaUBSController::class, 'showForm'])->name('farmacia.showForm');
//ROTAS FARMACIA
// Rota para cadastrar farmácia via POST
Route::post('/insertFarmaciaUbs', [FarmaciaUBSController::class, 'store']);

// Rota para exibir o formulário e a lista de farmácias cadastradas
Route::get('/Farmacia', [FarmaciaUBSController::class, 'showForm'])->name('farmacia.showForm');


// Rota para exibir o formulário de edição
Route::get('/farmacia/{id}/edit', [FarmaciaUBSController::class, 'edit'])->name('farmacia.edit');
Route::post('/farmacia/{id}', [FarmaciaUBSController::class, 'update'])->name('farmacia.update');

// Rota para atualizar uma farmácia
Route::post('/updateFarmaciaUbs/{id}', [FarmaciaUBSController::class, 'update'])->name('farmacia.update');

// Rota para marcar uma farmácia como excluída
Route::delete('/farmacia/{id}', [FarmaciaUBSController::class, 'changeStatus'])->name('farmacia.destroy');

//rota cliente
Route::get('/criarCliente', [ClienteAdmController::class, 'create']);
Route::post('/criarCliente', 'App\Http\Controllers\ClienteAdmController@store');
Route::post('/storeTelefone', [TelefoneClienteAdmController::class, 'store']);

Route::get('/Cliente', [ClienteAdmController::class, 'index']);

// Rota para exibir o formulário de edição
Route::get('/clientes/edit/{idCliente}', [ClienteAdmController::class, 'edit'])->name('cliente.edit');

// Rota para atualizar o cliente (PUT)
Route::put('/clientes/{idCliente}', [ClienteAdmController::class, 'update'])->name('cliente.update');


Route::delete('/deletarCliente/{id}', [ClienteAdmController::class, 'destroy'])->name('deletarCliente');

// Rota para exibir a tela de clientes com filtros aplicados
Route::get('/cliente/filtros', [ClienteAdmController::class, 'filtros'])->name('cliente.filtros');
Route::get('/cliente', [ClienteAdmController::class, 'index'])->name('cliente.index');


//ROTAS DO MEDICAMENTO
Route::get('/medicamento', [MedicamentoController::class, 'medicamentos']); //para aparecer a tabela de med
Route::get('/medicamentoForm', [MedicamentoController::class, 'index']); //para aparecer o tipo med e o detentor no cadastro
Route::post('/cadastroMed', [MedicamentoController::class, 'store']); //cadastro do med

Route::get('/medicamento/edit/{idMedicamento}', [MedicamentoController::class, 'edit'])->name('medicamento.edit');
Route::put('/medicamento/{idMedicamento}', [MedicamentoController::class, 'update'])->name('medicamento.update');
Route::put('/medicamentos/desativar/{id}', [MedicamentoController::class, 'desativar'])->name('medicamento.desativar');


//TIPO MEDICAMENTO 

Route::get('/TipoMedicamento', function (Request $request) {
    return view('adm.Medicamento.cadastroTipoMed', ['formData' => $request->input()]);
})->name('TipoMedicamento');

Route::post('/TipoMedicamento', [TipoMedicamentoController::class, 'store'])->name('TipoMedicamento');

//DETENTOR
Route::get('/detentor', [DetentorController::class, 'index']);
Route::get('/detentorCadastro', function () {
    return view('adm.Medicamento.cadastroDetentor');
});

Route::get('/newDetentor', function (Request $request) {
    return view('adm.Medicamento.newDetentor', ['formData' => $request->input()]);
})->name('NewDetentor');
Route::post('/newDetentor', [DetentorController::class, 'NewDetentor'])->name('newDetentor');

Route::post('/cadastroDetentor', [DetentorController::class, 'store']); //cadastro do med
Route::put('/detentor/{idDetentor}', [DetentorController::class, 'update'])->name('detentor.update');
Route::get('/detentor/edit/{idDetentor}', [DetentorController::class, 'edit'])->name('detentor.edit');

//Messagens
Route::get('/contato', [ContatoController::class, 'index']);






























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

// Route::get('/medicamento', function () {
//     return view('farmacia.MedicamentoFarmacia');
// });

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

 Route::get('/configuracoes', function () {
    return view('adm.configuracoes');
});
// Route::get('/configuracoesNotificacoes', function () {
//     return view('adm.configuracoesNotificacoes');
// });
// Route::get('/notificacoes', function () {
//     return view('adm.Notificacao.notificacoes');
// });

//PAGINAS MEDICAMENTO_UBS_CLIENTE

// Route::get('/ubs', function () {
//     return view('adm.UBS.UBS');
// });


// Route::get('/cliente', function () {
//     return view('adm.cliente.Cliente');
// });

// Route::get('/contato', function () {
//     return view('adm.contato');
// });

//SELECT
// Route::get('/getUsuario','App\Http\Controllers\UsuarioController@index');

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
// Route::get('/comentarioInsert', function () {
//     return view('comentarioInsert');
// });
// Route::get('/contatoInsert', function () {
//     return view('contatoInsert');
// });
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
//  Route::get('/cadastros', [ClienteFarmaciaController::class, 'create'])->name('cliente.create'); // Rota para exibir o formulário
//  Route::post('/cadastros', [ClienteFarmaciaController::class, 'store'])->name('cliente.store'); // Rota para salvar os dados no banco
 

// //telefone
// Route::get('/telefones', [TelefoneClienteController::class, 'index'])->name('telefones.index');
// Route::get('/telefones/create', [TelefoneClienteController::class, 'create'])->name('telefones.create');
// Route::post('/telefones', [TelefoneClienteController::class, 'store'])->name('telefones.store');
// Route::get('/telefones/{id}/edit', [TelefoneClienteController::class, 'edit'])->name('telefones.edit');
// Route::put('/telefones/{id}', [TelefoneClienteController::class, 'update'])->name('telefones.update');
// Route::delete('/telefones/{id}', [TelefoneClienteController::class, 'destroy'])->name('telefones.destroy');


//Medicamento farmacia
// Rotas para MedicamentoFarmacia


// Route::get('/atualizarMedicamentoEstoque/{id}', [MedicamentoFarmaciaController::class, 'edit'])->name('medicamento.edit');
// Route::put('/medicamentos', [MedicamentoFarmaciaController::class, 'update'])->name('medicamento.update');


// tipo med
// Route::get('/tipoMedicamento', [tipoMedicamentoController::class, 'index'])->name('tipoMedicamento.index');

Route::post('/fabricanteFarma','App\Http\Controllers\FabricanteController@store');

//rota telefone do fabricante
Route::get('/telefonesFabricante', [TelefoneFabricanteFarmaciaController::class, 'index'])->name('telefones.index');
Route::post('/telefonesFabricante', [TelefoneFabricanteFarmaciaController::class, 'store'])->name('telefones.store');
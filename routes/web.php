<?php

/*
|--------------------------------------------------------------------------
| Rotas Públicas
|--------------------------------------------------------------------------
| Rotas que poderão ser acessadas por qualquer usuário
|
*/

Route::get('/', 'ControladorPadrao@inicio')->name('/');


/*
|--------------------------------------------------------------------------
| Agenda Controller
|--------------------------------------------------------------------------
| Rotas que poderão ser acessadas por qualquer usuário
|
*/

Route::get('/agenda', 'AgendaController@agenda')->name('/agenda');
Route::get('/agendar/aula/dia/{id}', 'AgendaController@agendar')->name('/agendar/aula/dia');


/*
|--------------------------------------------------------------------------
| Aluno Controller
|--------------------------------------------------------------------------
| Rotas que poderão ser acessadas por qualquer usuário
|
*/

Route::get('/cadastrar/aluno', 'AlunoController@cadastrar')->name('/cadastrar/aluno');
Route::post('/salvar/aluno', 'AlunoController@salvarAluno')->name('/salvar/aluno');
Route::get('/editar/aluno/{id}', 'AlunoController@editarAluno')->name('/editar/aluno');
Route::get('/excluir/aluno/{id}', 'AlunoController@deletar')->name('/deletar/aluno');
Route::put('/atualizar/aluno/{id}', 'AlunoController@atualizar')->name('/atualizar/aluno');
Route::get('/informacoes/aluno/{id}', 'AlunoController@info')->name('/informacoes/aluno');
Route::get('/manter/cadastros/aluno', 'AlunoController@manterCadastros')->name('/manter/cadastros/aluno');

/*
|--------------------------------------------------------------------------
| Professor Controller
|--------------------------------------------------------------------------
| Rotas que poderão ser acessadas por qualquer usuário
|
*/

Route::get('/cadastrar/professor', 'ProfessorController@cadastrar')->name('/cadastrar/professor');
Route::get('/manter/cadastros/professor', 'ProfessorController@manterCadastros')->name('/manter/cadastros/professor');

/*
|--------------------------------------------------------------------------
| Curso Controller
|--------------------------------------------------------------------------
| Rotas que poderão ser acessadas por qualquer usuário
|
*/

Route::get('/cadastrar/curso', 'CursoController@cadastrar')->name('/cadastrar/curso');
Route::get('/manter/cadastros/curso', 'CursoController@manterCadastros')->name('/manter/cadastros/curso');

/*
|--------------------------------------------------------------------------
| Instrumento Controller
|--------------------------------------------------------------------------
| Rotas que poderão ser acessadas por qualquer usuário
|
*/

Route::get('/cadastrar/instrumento', 'InstrumentoController@cadastrar')->name('/cadastrar/instrumento');
Route::post('/salvar/instrumento', 'InstrumentoController@salvar')->name('/salvar/instrumento');
Route::get('/manter/cadastros/instrumento', 'InstrumentoController@manterCadastros')->name('/manter/cadastros/instrumento');

/*
|--------------------------------------------------------------------------
| Pagamento Controller
|--------------------------------------------------------------------------
| Rotas que poderão ser acessadas por qualquer usuário
|
*/

Route::get('/registrar/pagamento/aluno/{id}', 'PagamentoController@informacao')->name('/registrar/pagamento/aluno');

/*
|--------------------------------------------------------------------------
| Usuário Controller
|--------------------------------------------------------------------------
| Rotas que poderão ser acessadas por qualquer usuário
|
*/

Route::get('/cadastrar/usuario', 'UsuarioController@cadastrar')->name('/cadastrar/usuario');
Route::get('/manter/cadastros/usuario', 'UsuarioController@manterCadastros')->name('/manter/cadastros/usuario');

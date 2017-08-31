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
Route::get('/agendar/aula', 'AgendaController@agendar')->name('/agendar/aula');


/*
|--------------------------------------------------------------------------
| Aluno Controller
|--------------------------------------------------------------------------
| Rotas que poderão ser acessadas por qualquer usuário
|
*/

Route::get('/cadastrar/aluno', 'AlunoController@cadastrar')->name('/cadastrar/aluno');
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
Route::get('/manter/cadastros/instrumento', 'InstrumentoController@manterCadastros')->name('/manter/cadastros/instrumento');

/*
|--------------------------------------------------------------------------
| Pagamento Controller
|--------------------------------------------------------------------------
| Rotas que poderão ser acessadas por qualquer usuário
|
*/

Route::get('/registrar/pagamento/aluno', 'PagamentoController@informacao')->name('/registrar/pagamento/aluno');

/*
|--------------------------------------------------------------------------
| Usuário Controller
|--------------------------------------------------------------------------
| Rotas que poderão ser acessadas por qualquer usuário
|
*/

Route::get('/cadastrar/usuario', 'UsuarioController@cadastrar')->name('/cadastrar/usuario');
Route::get('/manter/cadastros/usuario', 'UsuarioController@manterCadastros')->name('/manter/cadastros/usuario');

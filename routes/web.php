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
| Incricao Controller
|--------------------------------------------------------------------------
| Rotas que poderão ser acessadas por qualquer usuário
|
*/

Route::get('/agenda', 'IncricaoController@agenda')->name('/agenda');
Route::get('/agendar/aula/dia/{id}', 'IncricaoController@agendar')->name('/agendar/aula/dia');
Route::post('/salvar/agendamento', 'IncricaoController@salvarAgendamento')->name('/salvar/agendamento');
Route::get('/editar/agendamento/{id}', 'IncricaoController@editarAgendamento')->name('/editar/agendamento');
Route::put('/atualizar/agendamento/{id}', 'IncricaoController@atualizar')->name('/atualizar/agendamento');
Route::get('/deletar/agendamento/{id}', 'IncricaoController@deletar')->name('/deletar/agendamento');


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
Route::post('/salvar/professor', 'ProfessorController@salvarProfessor')->name('/salvar/professor');
Route::get('/editar/professor/{id}', 'ProfessorController@editarProfessor')->name('/editar/professor');
Route::put('/atualizar/professor/{id}', 'ProfessorController@atualizar')->name('/atualizar/professor');

/*
|--------------------------------------------------------------------------
| Curso Controller
|--------------------------------------------------------------------------
| Rotas que poderão ser acessadas por qualquer usuário
|
*/

Route::get('/cadastrar/curso', 'CursoController@cadastrar')->name('/cadastrar/curso');
Route::get('/editar/curso/{id}', 'CursoController@editar')->name('/editar/curso');
Route::put('/atualizar/curso/{id}', 'CursoController@atualizar')->name('/atualizar/curso');
Route::get('/deletar/curso/{id}', 'CursoController@deletar')->name('/deletar/curso');
Route::get('/insformacoes/curso/{id}', 'CursoController@info')->name('/informacoes/curso');
Route::post('/salvar/curso', 'CursoController@salvar')->name('/salvar/curso');
Route::get('/manter/cadastros/curso', 'CursoController@manterCadastros')->name('/manter/cadastros/curso');
Route::get('/listar/professores/curso/{id}', 'CursoController@listarProfessores')->name('/listar/professores/curso');

/*
|--------------------------------------------------------------------------
| Instrumento Controller
|--------------------------------------------------------------------------
| Rotas que poderão ser acessadas por qualquer usuário
|
*/

Route::get('/cadastrar/instrumento', 'InstrumentoController@cadastrar')->name('/cadastrar/instrumento');
Route::post('/salvar/instrumento', 'InstrumentoController@salvar')->name('/salvar/instrumento');
Route::put('/atualizar/instrumento/{id}', 'InstrumentoController@atualizar')->name('/atualizar/instrumento');
Route::get('/editar/instrumento/{id}', 'InstrumentoController@editar')->name('/editar/instrumento');
Route::get('/deletar/instrumento/{id}', 'InstrumentoController@deletar')->name('/deletar/instrumento');
Route::get('/informacoes/instrumento/{id}', 'InstrumentoController@info')->name('/informacoes/instrumento');
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

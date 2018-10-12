<?php

$this->group(['middleware' => ['auth'], 'namespace' => 'Estoque'], function(){

    Route::resource('estoque', 'EstoqueController');
});

    

$this->group(['middleware' => ['auth'], 'namespace' => 'Treinamento'], function(){
    
    /* Rotas de: Cargo */
    Route::resource('cargos','CargoController'); 
    Route::get('cargo', 'CargoController@index')->name('cargo');
    Route::get('cargo/getdata', 'CargoController@getdata')->name('cargo.getdata');
    Route::get('cargo/destroy', 'CargoController@destroy')->name('cargo.destroy');

    /* Rotas de: Setor */
    Route::resource('cetors','CetorController'); 
    Route::get('cetor', 'CetorController@index')->name('cetor');
    Route::get('cetor/getdata', 'CetorController@getdata')->name('cetor.getdata');
    Route::get('cetor/destroy', 'CetorController@destroy')->name('cetor.destroy');
       
    /* Rotas de: Departamento */
    Route::resource('departamentos','DepartamentoController'); 
    Route::get('departamento', 'DepartmentoController@index')->name('departamento');
    Route::get('departamento/getdata', 'DepartamentoController@getdata')->name('departamento.getdata');
    Route::get('departamento/destroy', 'DepartamentoController@destroy')->name('departamento.destroy');

    /* Rotas de: Curso */
    Route::resource('cursos','CursoController'); 
    Route::get('curso', 'CursoController@index')->name('curso');
    Route::get('curso/getdata', 'CursoController@getdata')->name('curso.getdata');
    Route::get('curso/destroy', 'CursoController@destroy')->name('curso.destroy');

    /* Rotas de: TpTreinamento */
    Route::resource('tptreinamentos','TpTreinamentoController');
    Route::get('tptreinamento', 'TpTreinamentoController@index')->name('tptreinamento');
    Route::get('tptreinamento/getdata', 'TpTreinamentoController@getdata')->name('tptreinamento.getdata');
    Route::get('tptreinamento/destroy', 'TpTreinamentoController@destroy')->name('tptreinamento.destroy');

    /* Rotas de: EspecTreinamento */    
    Route::resource('espectreinamentos','EspecTreinamentoController');
    Route::get('espectreinamento', 'EspecTreinamentoController@index')->name('espectreinamento');
    Route::get('espectreinamento/getdata', 'EspecTreinamentoController@getdata')->name('espectreinamento.getdata');
    Route::get('espectreinamento/destroy', 'EspecTreinamentoController@destroy')->name('espectreinamento.destroy');

    /* Rotas de: Funcionario */
    Route::resource('funcionarios','FuncionarioController');
    Route::get('funcionario', 'FuncionarioController@index')->name('funcionario');
    Route::get('funcionario/getdata', 'FuncionarioController@getdata')->name('funcionario.getdata');
    Route::get('funcionario/destroy', 'FuncionarioController@destroy')->name('funcionario.destroy');


    /* ROTAS MENU DO MÓDULO DE TREINAMENTO*/
    Route::resource('treinamento', 'TreinamentoController');
    Route::resource('help', 'HelpController');
    Route::resource('gerenciador', 'GerenciadorController');

    /* ROTA DE CADASTRAR TURMA */


    /* ROTA DE CONSULTAR TURMAS */


    /* ROTAS DE GERENCIAMENTO DE ARQUIVOS */
    Route::resource('gerenciador','FileController');
    Route::post('upload', ['as' => 'files.upload', 'uses' => 'FileController@upload']);
    Route::get('usuario/{userId}/download/{fileId}', ['as' => 'files.download', 'uses' => 'FileController@download']);
    Route::get('usuario/{userId}/remover/{fileId}', ['as' => 'files.destroy', 'uses' => 'FileController@destroy']);

    /* ROTAS DE RELATORIOS */

 
});

$this->group(['middleware' => ['auth'], 'namespace' => 'Qualidade'], function(){

    Route::resource('qualidade', 'QualidadeController');
});

Route::resource('home', 'HomeController');
Route::get('/', function () {
    return view('welcome');
});  


  

    Auth::routes();


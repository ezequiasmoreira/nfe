<?php


Route::get('/', function () {
    return view('welcome');
});
Route::group(["prefix" => "cliente", "namespace"=>"pessoas"], function () {
    Route::get("/{id}/editar", "ClienteController@editarView");
    Route::get("/{id}/excluir", "ClienteController@excluir");
    Route::get("/", "ClienteController@index");
    Route::get("/novo", "ClienteController@novoView");
    Route::post("/salvar", "ClienteController@salvar");
    Route::post("/atualizar", "ClienteController@atualizar");
    Route::post("/retorna-cidade", "ClienteController@retornaCidade");
    Route::post("/retorna-clientes", "ClienteController@retornaCientes");
});

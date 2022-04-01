<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\CategoriaController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => '/api/user'], function() use ($router) {
    $router->post('/login', 'UserController@login');
    $router->post('/register', 'UserController@register');
});

$router->group(['prefix' => 'api/categorias'], function() use ($router) {
    $router->get('/', 'CategoriaController@getAll');
    $router->get('/{id}', 'CategoriaController@show');
    $router->post('/', 'CategoriaController@insert');
    $router->post('/{id}', 'CategoriaController@update');
    $router->delete('/{id}', 'CategoriaController@delete');
});

$router->group(['prefix' => 'api/transportes'], function() use ($router) {
    $router->get('/', 'TransporteController@getAll');
    $router->get('/{id}', 'TransporteController@show');
    $router->post('/', 'TransporteController@insert');
    $router->post('/{id}', 'TransporteController@update');
    $router->delete('/{id}', 'TransporteController@delete');
});

$router->group(['prefix' => 'api/motivacoes'], function() use ($router) {
    $router->get('/', 'MotivacaoController@getAll');
    $router->get('/{id}', 'MotivacaoController@show');
    $router->post('/', 'MotivacaoController@insert');
    $router->post('/{id}', 'MotivacaoController@update');
    $router->delete('/{id}', 'MotivacaoController@delete');
});
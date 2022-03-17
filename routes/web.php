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

$router->group(['prefix' => 'categorias'], function() use ($router) {
    $router->get('/', 'CategoriaController@getAll');
    $router->get('/{id}', 'CategoriaController@show');
    $router->post('/', 'CategoriaController@insert');
    $router->post('/{id}', 'CategoriaController@update');
    $router->delete('/{id}', 'CategoriaController@delete');
});

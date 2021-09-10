<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/userAccounts','UserAccountController@index');
$router->get('/userAccounts/{id}','UserAccountController@show');
$router->post('/userAccounts/create','UserAccountController@store');
$router->post('/userAccounts/update/{id}','UserAccountController@update');
$router->delete('/userAccounts/delete/{id}','UserAccountController@destroy');

$router->get('/', function () use ($router) {
    return $router->app->version();
});

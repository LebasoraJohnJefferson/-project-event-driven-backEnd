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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
  $router->get('userAccounts', ['uses' => 'UserAccountController@index']);
  $router->get('userAccounts/{id}', ['uses' => 'UserAccountController@show']);
  $router->post('userAccounts', ['uses' => 'UserAccountController@store']);
  $router->put('userAccounts/{id}', ['uses' => 'UserAccountController@update']);
  $router->delete('userAccounts/{id}', ['uses' => 'UserAccountController@destroy']);

  $router->get('product', ['uses' => 'ProductController@index']);
  $router->get('product/{id}', ['uses' => 'ProductController@show']);
  $router->post('product', ['uses' => 'ProductController@store']);
  $router->put('product/{id}', ['uses' => 'ProductController@update']);
  $router->delete('product/{id}', ['uses' => 'ProductController@destroy']);
});



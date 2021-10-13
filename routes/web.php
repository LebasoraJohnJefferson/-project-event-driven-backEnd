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

  $router->post('auth/register', 'AuthController@register');
  $router->post('auth/login', 'AuthController@login');
  $router->get('auth/logout','UserController@logout');

  $router->get('profile', 'UserController@profile');

  // products
  $router->get('product', 'ProductController@index');
  $router->get('product/{id}', 'ProductController@show');
  $router->post('product', 'ProductController@store');
  $router->put('product/{id}','ProductController@update');
  $router->delete('product/{id}', 'ProductController@destroy');

  //stores
  $router->get('stores',['uses'=>'StoresController@index']);
  $router->get('stores/{user_id}',['uses'=>'StoresController@findById']);
  $router->post('stores/create',['uses'=>'StoresController@addStore']);
  $router->put('stores/update/{id}',['uses'=>'StoresController@update']);
  $router->delete('stores/delete/{id}',['uses'=>'StoresController@delete']);

});


$router->group(['prefix' => 'admin'], function () use ($router) {
  $router->get('userAccounts', ['uses' => 'UserAccountController@index']);
  $router->get('userAccounts/{id}', ['uses' => 'UserAccountController@show']);
  $router->post('userAccounts', ['uses' => 'UserAccountController@store']);
  $router->put('userAccounts/{id}', ['uses' => 'UserAccountController@update']);
  $router->delete('userAccounts/{id}', ['uses' => 'UserAccountController@destroy']);
});



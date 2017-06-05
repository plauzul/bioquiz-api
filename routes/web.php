<?php

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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->group(['prefix' => 'api', 'middleware' => 'cors'], function() use ($app) {
    $app->group(['prefix' => 'auth'], function () use ($app) {
        $app->post('login', 'AuthController@login');
        $app->post('register', 'AuthController@register');
    });

    $app->group(['prefix' => 'users'/*, 'middleware' => 'auth:api'*/], function() use ($app) {
        $app->get('/', 'UsersController@index');
        $app->get('{token}', 'UsersController@show');
        $app->delete('{id}', 'UsersController@delete');
    });

    $app->group(['prefix' => 'simulations'/*, 'middleware' => 'auth:api'*/], function() use ($app) {
        $app->post('/result/{idUser}/{idProof}', 'SimulationsController@setResult');
        $app->get('/result/{idUser}', 'SimulationsController@getResult');
        $app->get('/proofs', 'SimulationsController@proofs');
        $app->get('/questions/{idProof}', 'SimulationsController@questions');
    });
});
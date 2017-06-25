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

$app->get('/', 'IndexController@index');
$app->get('/form-register-questions', 'IndexController@formRegisterQuestions');
$app->get('/form-register-proofs', 'IndexController@formRegisterProofs');
$app->post('/form-register-questions-save', 'IndexController@formRegisterQuestionsSave');
$app->post('/form-register-proofs-save', 'IndexController@formRegisterProofsSave');
$app->get('/form-edit-proofs', 'IndexController@formEditProofs');
$app->get('/form-edit-questions', 'IndexController@formEditQuestions');

$app->group(['prefix' => 'api', 'middleware' => 'cors'], function() use ($app) {
    $app->group(['prefix' => 'auth'], function () use ($app) {
        $app->post('login', 'AuthController@login');
        $app->post('register', 'AuthController@register');
        $app->get('refresh-token/{token}', 'AuthController@refreshToken');
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

    $app->group(['prefix' => 'rank'/*, 'middleware' => 'auth:api'*/], function() use ($app) {
        $app->get('positioning', 'RankController@total');
        $app->get('positioning/{idUser}', 'RankController@me');
    });
});
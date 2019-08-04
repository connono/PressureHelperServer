<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


$api = app('Dingo\Api\Routing\Router');

$api->version('v1',[
    'namespace' => 'App\Http\Controllers\Api'
], function ($api){
    $api->post('users','UsersController@store')
        ->name('api.users.store');
    $api->get('captchas','CaptchasController@store')
        ->name('api.captchas.store');
    $api->group(['middleware'=>'api.auth'],function($api){
      $api->post('pressures','PressuresController@store')
          ->name('api.pressures.store');
      $api->get('pressures','PressuresController@index')
          ->name('api.pressures.index');
    });
    $api->patch('pressures/{id}', 'PressuresController@update')
        ->name('api.pressures.update');
    $api->delete('pressures/{id}','PressuresController@destroy')
        ->name('api.pressures.destroy');
    $api->get('pressures/{id}','PressuresController@show')
        ->name('api.pressures.show');
    $api->post('authorizations','AuthorizationsController@store')
        ->name('api.authorizations.store');
    $api->put('authorizations/current','AuthorizationsController@update')
        ->name('api.authorizations.update');
    $api->delete('authorizations/current','AuthorizationsController@destroy')
        ->name('api.authorizations.destroy');
});

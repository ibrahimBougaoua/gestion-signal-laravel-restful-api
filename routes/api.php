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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    //'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::get('fetch', 'AuthController@getAllUsers');
    
    // equipe route
    Route::get('equipe', 'EquipesController@index');
    Route::get('equipe/{id}', 'EquipesController@show');
    Route::post('equipe', 'EquipesController@store');
    Route::put('equipe/{id}', 'EquipesController@update');
    Route::delete('equipe/{id}', 'EquipesController@destroy');

    // Evaluer route
    Route::get('evaluer', 'EvaluersController@index');
    Route::get('evaluer/{id}', 'EvaluersController@show');
    Route::post('evaluer', 'EvaluersController@store');
    Route::put('evaluer/{id}', 'EvaluersController@update');
    Route::delete('evaluer/{id}', 'EvaluersController@destroy');

    // Informer route
    Route::get('informer', 'InformersController@index');
    Route::get('informer/{id}', 'InformersController@show');
    Route::post('informer', 'InformersController@store');
    Route::put('informer/{id}', 'InformersController@update');
    Route::delete('informer/{id}', 'InformersController@destroy');

    // Intervention route
    Route::get('intervention', 'InterventionsController@index');
    Route::get('intervention/{id}', 'InterventionsController@show');
    Route::post('intervention', 'InterventionsController@store');
    Route::put('intervention/{id}', 'InterventionsController@update');
    Route::delete('intervention/{id}', 'InterventionsController@destroy');

    // Membre route
    Route::get('membre', 'MembresController@index');
    Route::get('membre/{id}', 'MembresController@show');
    Route::post('membre', 'MembresController@store');
    Route::put('membre/{id}', 'MembresController@update');
    Route::delete('membre/{id}', 'MembresController@destroy');

    // Signaler route
    Route::get('signaler', 'SignalersController@index');
    Route::get('signaler/{id}', 'SignalersController@show');
    Route::post('signaler', 'SignalersController@store');
    Route::put('signaler/{id}', 'SignalersController@update');
    Route::delete('signaler/{id}', 'SignalersController@destroy');

    // Signalisation route
    Route::get('signalisation', 'SignalisationsController@index');
    Route::get('signalisation/{id}', 'SignalisationsController@show');
    Route::post('signalisation', 'SignalisationsController@store');
    Route::put('signalisation/{id}', 'SignalisationsController@update');
    Route::delete('signalisation/{id}', 'SignalisationsController@destroy');

    // Images route
    Route::get('image', 'ImagesController@index');
    Route::get('image/{id}', 'ImagesController@show');
    Route::post('image', 'ImagesController@store');
    Route::put('image/{id}', 'ImagesController@update');
    Route::delete('image/{id}', 'ImagesController@destroy');

    // Users route
    Route::get('user', 'UsersController@index');
    Route::get('user/{id}', 'UsersController@show');
    Route::get('showlistchef', 'UsersController@showListChef');
    Route::post('user', 'UsersController@store');
    Route::put('user/{id}', 'UsersController@update');
    Route::delete('user/{id}', 'UsersController@destroy');

    // Messages route
    Route::get('message', 'MessagesController@index');
    Route::get('message/{id}', 'MessagesController@show');
    Route::get('messages/{id}', 'MessagesController@showMessage');
    Route::post('message', 'MessagesController@store');
    Route::put('message/{id}', 'MessagesController@update');
    Route::delete('message/{id}', 'MessagesController@destroy');

});
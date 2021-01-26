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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
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

    // Equipe route
    Route::group(['prefix' => 'equipe'],function() {
        Route::get('/', 'EquipesController@index');
        Route::get('show/{id}', 'EquipesController@show');
        Route::get('count', 'EquipesController@count');
        Route::post('store', 'EquipesController@store');
        Route::post('update/{id}', 'EquipesController@update');
        Route::post('delete/{id}', 'EquipesController@destroy');
    });

    // Evaluer route
    Route::group(['prefix' => 'evaluer'],function() {
        Route::get('/', 'EvaluersController@index');
        Route::get('show/{id}', 'EvaluersController@show');
        Route::post('store', 'EvaluersController@store');
        Route::post('update/{id}', 'EvaluersController@update');
        Route::post('delete/{id}', 'EvaluersController@destroy');
    });

    // Informer route
    Route::group(['prefix' => 'informer'],function() {
        Route::get('/', 'InformersController@index');
        Route::get('show/{chef_id}/{signalisation_id}', 'InformersController@show');
        Route::post('store', 'InformersController@store');
        Route::post('update/{chef_id}/{signalisation_id}', 'InformersController@update');
        Route::post('delete/{chef_id}/{signalisation_id}', 'InformersController@destroy');
    });

    // Intervention route
    Route::group(['prefix' => 'intervention'],function() {
        Route::get('', 'InterventionsController@index');
        Route::get('show/{id}', 'InterventionsController@show');
        Route::post('store', 'InterventionsController@store');
        Route::post('update/{id}', 'InterventionsController@update');
        Route::post('delete/{id}', 'InterventionsController@destroy');
    });

    // Membre route
    Route::group(['prefix' => 'membre'],function() {
        Route::get('', 'MembresController@index');
        Route::get('show/{id}', 'MembresController@show');
        Route::post('store', 'MembresController@store');
        Route::post('update/{id}', 'MembresController@update');
        Route::post('delete/{id}', 'MembresController@destroy');
    });

    // Signaler route
    Route::group(['prefix' => 'signaler'],function() {
        Route::get('', 'SignalersController@index');
        Route::get('show/{id}', 'SignalersController@show');
        Route::post('store', 'SignalersController@store');
        Route::post('update/{id}', 'SignalersController@update');
        Route::post('delete/{id}', 'SignalersController@destroy');
    });

    // Signalisation route
    Route::group(['prefix' => 'signalisation'],function() {
        Route::get('', 'SignalisationsController@index');
        Route::get('show/{id}', 'SignalisationsController@show');
        Route::post('store', 'SignalisationsController@store');
        Route::post('update/{id}', 'SignalisationsController@update');
        Route::post('delete/{id}', 'SignalisationsController@destroy');
    });

    // Image route
    Route::get('index', 'ImagesController@index');
    Route::get('show/{id}', 'ImagesController@show');
    Route::post('store', 'ImagesController@store');
    Route::post('update/{id}', 'ImagesController@update');
    Route::post('destroy/{id}', 'ImagesController@destroy');

    // User route
    Route::group(['prefix' => 'user'],function() {
        Route::get('/', 'UsersController@index');
        Route::get('show/{id}', 'UsersController@show');
        Route::get('count', 'UsersController@count');
        Route::post('store', 'UsersController@store');
        Route::post('update/{id}', 'UsersController@update');
        Route::post('delete/{id}', 'UsersController@destroy');
    });

    // Messages route
    Route::group(['prefix' => 'message'],function() {
        Route::get('/', 'MessagesController@index');
        Route::get('show/{id}', 'MessagesController@show');
        Route::post('store', 'MessagesController@store');
        Route::post('delete/{id}', 'MessagesController@destroy');
    });

    // Comment route
    Route::group(['prefix' => 'comment'],function() {
        Route::get('/', 'CommentsController@index');
        Route::get('show/{id}', 'CommentsController@show');
        Route::post('store', 'CommentsController@store');
        Route::post('update/{id}', 'CommentsController@update');
        Route::post('delete/{id}', 'CommentsController@destroy');
    });

});

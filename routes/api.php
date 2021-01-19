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
    Route::get('index', 'EquipesController@index');
    Route::get('show/{id}', 'EquipesController@show');
    Route::get('count', 'EquipesController@count');
    Route::post('store', 'EquipesController@store');
    Route::post('update/{id}', 'EquipesController@update');
    Route::post('delete/{id}', 'EquipesController@destroy');

    // Evaluer route
    Route::get('index', 'EvaluersController@index');
    Route::get('show/{id}', 'EvaluersController@show');
    Route::post('store', 'EvaluersController@store');
    Route::post('update/{id}', 'EvaluersController@update');
    Route::post('destroy/{id}', 'EvaluersController@destroy');

    // Informer route
    Route::get('index', 'InformersController@index');
    Route::get('show/{id}', 'InformersController@show');
    Route::post('store', 'InformersController@store');
    Route::post('update/{id}', 'InformersController@update');
    Route::post('destroy/{id}', 'InformersController@destroy');

    // Intervention route
    Route::get('index', 'InterventionsController@index');
    Route::get('show/{id}', 'InterventionsController@show');
    Route::post('store', 'InterventionsController@store');
    Route::post('update/{id}', 'InterventionsController@update');
    Route::post('destroy/{id}', 'InterventionsController@destroy');

    // Membre route
    Route::get('membre', 'MembresController@index');
    Route::get('membre/{id}', 'MembresController@show');
    Route::get('membrecountdashboard/{id}', 'MembresController@membreCountDashboard');
    Route::post('membre', 'MembresController@store');
    Route::put('membre/{id}', 'MembresController@update');
    Route::delete('membre/{id}', 'MembresController@destroy');
    Route::delete('deleteAllMembre/{id}', 'MembresController@deleteAllMembre');

    // Signaler route
    Route::get('signaler', 'SignalersController@index');
    Route::get('signaler/{id}', 'SignalersController@show');
    Route::get('signalercount/{id}', 'SignalersController@signalerCount');
    Route::get('signalisationdashboard', 'SignalersController@SignalisationDashboard');
    Route::get('usersignalisationdashboard/{id}', 'SignalersController@userSignalisationDashboard');
    Route::post('signaler', 'SignalersController@store');
    Route::put('signaler/{id}', 'SignalersController@update');
    Route::delete('signaler/{id}', 'SignalersController@destroy');
    Route::delete('deleteAllSignales/{id}', 'SignalersController@deleteAllSignales');

    // Signalisation route
    Route::get('signalisation', 'SignalisationsController@index');
    Route::get('signalisationHasEnding', 'SignalisationsController@signalisationHasEnding');
    Route::get('signalisationTrash', 'SignalisationsController@trash');
    Route::get('allSignalisation', 'SignalisationsController@all');
    Route::get('signalisation/{id}', 'SignalisationsController@show');
    Route::get('signalisationsByAuthor/{id}', 'SignalisationsController@signalisationsByAuthor');
    Route::get('search', 'SignalisationsController@searchByValue');
    Route::get('signalisationcount', 'SignalisationsController@signalisationCount');
    Route::get('signalisationcommentsdashboard', 'SignalisationsController@SignalisationCommentsDashboard');
    Route::get('allSignalisationByUserIdCountDashboard/{id}', 'SignalisationsController@allSignalisationByUserIdCountDashboard');
    Route::get('trashSignalisationByUserIdCountDashboard/{id}', 'SignalisationsController@trashSignalisationByUserIdCountDashboard');
    Route::get('SignalisationCompleteByUserIdCountDashboard/{id}', 'SignalisationsController@SignalisationCompleteByUserIdCountDashboard');
    Route::get('SignalisationCompleteByLeaderCountDashboard/{id}', 'SignalisationsController@SignalisationCompleteByLeaderCountDashboard');
    Route::get('signalisationetatavancementdashboard', 'SignalisationsController@SignalisationEtatAvancementDashboard');
    Route::get('allsignalercount', 'SignalisationsController@allSignalerCount');
    Route::get('allsignalisationbyuserid/{id}', 'SignalisationsController@allSignalisationByUserId');
    Route::post('signalisation', 'SignalisationsController@store');
    Route::put('signalisation/{id}', 'SignalisationsController@update');
    Route::delete('signalisation/{id}', 'SignalisationsController@destroy');

    // Image route
    Route::get('index', 'ImagesController@index');
    Route::get('show/{id}', 'ImagesController@show');
    Route::post('store', 'ImagesController@store');
    Route::post('update/{id}', 'ImagesController@update');
    Route::post('destroy/{id}', 'ImagesController@destroy');

    // User route
    Route::get('/', 'UsersController@index');
    Route::get('show/{id}', 'UsersController@show');
    Route::get('count', 'UsersController@count');
    Route::post('store', 'UsersController@store');
    Route::post('update/{id}', 'UsersController@update');
    Route::post('delete/{id}', 'UsersController@destroy');

    // Messages route
    Route::get('message', 'MessagesController@index');
    Route::get('message/{id}', 'MessagesController@show');
    Route::get('messages/{id}', 'MessagesController@showMessage');
    Route::post('message', 'MessagesController@store');
    Route::put('message/{id}', 'MessagesController@update');
    Route::delete('message/{id}', 'MessagesController@destroy');

    // Comment route
    Route::get('index', 'CommentsController@index');
    Route::get('show/{id}', 'CommentsController@show');
    Route::post('store', 'CommentsController@store');
    Route::post('update/{id}', 'CommentsController@update');
    Route::post('delete/{id}', 'CommentsController@destroy');

});

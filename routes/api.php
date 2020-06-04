<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => 'v1', 'namespace' => 'v1'], function (){
    Route::group(['prefix' => 'authors'], function () {
        Route::post('/create', 'AuthorController@create');
    });

    Route::group(['prefix' => 'articles'], function (){
        Route::get('/', 'ArticleController@index');
        Route::get('/{article}', 'ArticleController@show');
        Route::post('/create', 'ArticleController@create');
        Route::put('/update', 'ArticleController@update');
        Route::delete('/{article}', 'ArticleController@delete');
    });
});

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'InferenceController@index');
Route::post('/upload', 'InferenceController@inference');
Route::get('/test', 'InferenceController@pythontest');

Route::group(['prefix' => 'console', 'middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@index');
    Route::resource('species', 'SpeciesController');
    Route::resource('dataset', 'DatasetController');
});

Route::auth();

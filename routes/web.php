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

Route::get('/', function () {
    return view('welcome');
});


/*
*
*	Routes to auth user
*
*/
Route::get('/login', ['uses' => 'Controller@fazerLogin']);
Route::post('/login', ['as' => 'user.login', 'uses' => 'DashboardController@auth']);
Route::get('/dashboard', ['as' => 'user.dashboard', 'uses' => 'DashboardController@index']);

//Route::get('user', ['as' => 'user.index', 'uses' => 'UserController@index']);

Route::get('user/moviment', ['as' => 'moviment.index', 'uses' => 'MovimentController@index']);

Route::get('getback', ['as' => 'moviment.getback', 'uses' => 'MovimentController@getback']);
Route::post('getback', ['as' => 'moviment.getback.store', 'uses' => 'MovimentController@storeGetback']);

Route::get('moviment', ['as' => 'moviment.application', 'uses' => 'MovimentController@application']);
Route::post('moviment', ['as' => 'moviment.application.store', 'uses' => 'MovimentController@storeApplication']);

Route::get('moviment/all', ['as' => 'moviment.all', 'uses' => 'MovimentController@all']);

Route::resource('user', 'UserController');
Route::resource('instituition', 'InstituitionController');
Route::resource('group', 'GroupController');
Route::resource('instituition.product', 'ProductController');
Route::resource('movimento', 'MovimentController');

Route::post('group/{group_id}/user', ['as' => 'group.user.store', 'uses' => 'GroupController@userStore']);



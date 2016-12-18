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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();


Route::get('/add_user', function () {
    return view('users/add');
});

//Route::post('/add_user', function () {
//    return view('admin/test');
//});

Route::get('/users/show/{id?}', [ 'as' => 'user', 'uses' => 'UserController@show' ]);
Route::post('/users/show', 'UserController@search');
Route::get('/users/add', 'UserController@showUserForm');
Route::post('/users/add', 'UserController@addUser');

Route::get('/patrols/show/{id?}', [ 'as' => 'patrol', 'uses' => 'PatrolController@show' ]);

Route::get('/patrols/add', 'PatrolController@showPatrolForm');
Route::post('/patrols/add', 'PatrolController@addPatrol');

Route::get('/protocols/show/{id?}', [ 'as' => 'protocol', 'uses' => 'ProtocolController@show' ]);

Route::get('/protocols/add/{patrolId}', 'ProtocolController@showProtocolForm');
Route::post('/protocols/add', 'ProtocolController@addProtocol');

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');


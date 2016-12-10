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
    return view('admin/add_user');
});

//Route::post('/add_user', function () {
//    return view('admin/test');
//});

Route::get('/users', 'AdminController@users');
Route::post('/add_user', 'AdminController@addUser');
Route::get('/add_patrol', 'AdminController@showPatrolForm');
Route::post('/add_patrol', 'AdminController@addPatrol');
Route::get('/patrols', 'AdminController@showPatrols');

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');


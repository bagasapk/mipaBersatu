<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Authentication
Route::get('/user', 'UserController@index');
Route::get('/admin', 'AdminController@index');

//Create Read Task
Route::get('/task', 'TaskController@index');
Route::get('/task/add', 'TaskController@add');
Route::post('/task/save', 'TaskController@save');
Route::get('/task/{task}', 'TaskController@show');


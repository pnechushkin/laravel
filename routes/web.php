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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tasks', 'TasksController@index')->name('tasks');;
Route::post('/tasks', 'TasksController@save');
Route::delete('task/{id}', 'TasksController@delete');
Route::get('edit_task/{id}', 'TasksController@edit')->name('edit');
//Route::get('edit_task/{id}', 'TasksController@edit');
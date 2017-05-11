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

Route::get('/tasks', 'TasksController@index')->middleware('auth')->name('tasks');;
Route::post('/tasks', 'TasksController@save')->middleware('auth');
Route::delete('tasks/{id}', 'TasksController@delete')->middleware('auth');
Route::get('edit_task/{id}', 'TasksController@edit')->name('edit')->middleware('auth');

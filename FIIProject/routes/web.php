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

Route::get('/', 'TodolistController@index');
Route::get('/todolists', 'TodolistController@index');
Route::get('/todolists/add', 'TodolistController@add');
Route::post('/todolists/create', 'TodolistController@create');
Route::post('/todolists/delete/{id}', 'TodolistController@delete');
Route::get('/todolists/{id}/task/add', 'TaskController@add');
Route::post('/todolists/{id}/task/create', 'TaskController@create');
Route::post('/todolists/{list_id}/task/done/{task_id}','TaskController@done');
Route::get('/todolists/{id}', 'TodolistController@showTodolist');


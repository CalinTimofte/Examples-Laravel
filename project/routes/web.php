<?php

use App\Services\Twitter;

use App\Repositories\UserRepository;

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

// app()->singleton('example',function (){
//     return new \App\Example;
// });

// app()->singleton('App\Services\Twitter',function(){
//     return new \App\Services\Twitter('abcd');
// });

Route::get('/', function (Twitter $twitter) {

    // dd($twitter);
    return view('welcome');
});


// Route::get('/', function (UserRepository $users){
//     dd($users);

//     return view('welcome');
// });

// GET /projects (index)
// GET /projects/create (create)
// GET /projects/1 (show)
// POST /projects (store)
// GET projects/1/edit (edit)
// (PUT is simillar to patch)
// PATCH /projects/1 (update)
// DELETE /projects/1 (destroy)


Route::resource('projects', 'ProjectsController')->middleware('can:update,project');

// Route::get('/projects', 'ProjectsController@index');

// Route::get('/projects/create', 'ProjectsController@create');

// Route::get('/projects/{project}', 'ProjectsController@show');

// Route::post('/projects', 'ProjectsController@store');

// Route::get('/projects/{project}/edit', 'ProjectsController@edit');

// Route::patch('/projects/{project}', 'ProjectsController@update');

// Route::delete('/projects/{project}', 'ProjectsController@destroy');




Route::post('projects/{project}/tasks', 'ProjectTasksController@store');
// Route::patch('/tasks/{task}', 'ProjectTasksController@update');

Route::post('/completed-tasks/{task}', 'CompletedTasksController@store');
Route::delete('/completed-tasks/{task}', 'CompletedTasksController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

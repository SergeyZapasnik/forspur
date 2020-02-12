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
Route::resource('api/tasks', 'TaskController');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function() {
    Route::resource('tasks', 'Admin\TaskController');
    Route::get('/comments/{task_id}', 'Admin\CommentController@create');
    Route::get('comments/create/{id}', ['uses' =>'Admin\CommentController@create'])->name('createcomment');
    Route::post('comments/store', ['uses' =>'Admin\CommentController@store'])->name('commentstore');
});


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

Route::get('/{post}', 'HomeController@show')->name('post.view');

//Administrator
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'can:admin, auth'], function () {
    Route::get('/post/create', [
        'uses' => 'PostController@create'
    ])->name('post.create');

    Route::post('/post', [
       'uses' => 'PostController@store'
    ])->name('post.store');

    Route::get('/post/{post}/edit', [
        'uses' => 'PostController@edit'
    ])->name('post.edit');

    Route::put('/post/{post}', [
        'uses' => 'PostController@update'
    ])->name('post.update');

    Route::delete('/post/{post}', [
        'uses' => 'PostController@destroy'
    ])->name('post.destroy');

    Route::get('/reports/users', [
		'uses' => 'ReportController@showUsers'
	])->name('report.users');

	Route::get('/reports/mascots', [
		'uses' => 'ReportController@showMascots'
	])->name('report.mascots');

	Route::get('/reports/services', [
		'uses' => 'ReportController@showServices'
	])->name('report.services');

	Route::resource('records', 'RecordController');

    //Users
    Route::resource('users', 'UserController');
});

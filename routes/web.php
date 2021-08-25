<?php

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

//web
Route::get('/', function () {
    return view('index');
});


//admin

Route::get('admin/login', 'App\Http\Controllers\AdminController@login')->name('adminLogin');
Route::post('admin/login', 'App\Http\Controllers\AdminController@doLogin');

Route::group(['prefix' => 'admin/filemanager', 'middleware' => ['auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

//login
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('filemanager-page', function () {
        return view('admin.filemanager-page');
    });

    Route::get('/', 'App\Http\Controllers\AdminController@index');
    Route::get('logout', 'App\Http\Controllers\AdminController@logout');
    Route::get('user/edit', 'App\Http\Controllers\AdminController@adminUserEdit')->name('adminUserEdit');
    Route::get('user/create', 'App\Http\Controllers\AdminController@adminUserEdit')->name('adminUserCreate');
    Route::post('user/doEdit', 'App\Http\Controllers\AdminController@adminUserDoEdit');
    Route::delete('user/delete', 'App\Http\Controllers\AdminController@adminUserDoDelete');

    Route::get('types/list', 'App\Http\Controllers\TypesController@list');
    Route::get('types/edit', 'App\Http\Controllers\TypesController@edit')->name('typesEdit');
    Route::get('types/create', 'App\Http\Controllers\TypesController@edit')->name('typesCreate');
});


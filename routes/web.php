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

    Route::get('index/banner/list', 'App\Http\Controllers\IndexBannerController@list');
    Route::get('index/banner/edit', 'App\Http\Controllers\IndexBannerController@edit')->name('indexBannerEdit');
    Route::get('index/banner/create', 'App\Http\Controllers\IndexBannerController@edit')->name('indexBannerCreate');
    Route::post('index/banner/doEdit', 'App\Http\Controllers\IndexBannerController@doEdit');
    Route::delete('index/banner/delete', 'App\Http\Controllers\IndexBannerController@doDelete');

    Route::get('types/list', 'App\Http\Controllers\TypesController@list');
    Route::get('types/list/data', 'App\Http\Controllers\TypesController@listData');
    Route::get('types/edit', 'App\Http\Controllers\TypesController@edit')->name('typesEdit');
    Route::get('types/create', 'App\Http\Controllers\TypesController@edit')->name('typesCreate');
    Route::post('types/doEdit', 'App\Http\Controllers\TypesController@doEdit');
    Route::put('types/disabled', 'App\Http\Controllers\TypesController@doDisabled');

    
    Route::get('products/list', 'App\Http\Controllers\ProductsController@list');
    Route::get('products/edit', 'App\Http\Controllers\ProductsController@edit')->name('productsEdit');
    Route::get('products/create', 'App\Http\Controllers\ProductsController@edit')->name('productsCreate');
    Route::post('products/doEdit', 'App\Http\Controllers\ProductsController@doEdit');
    Route::put('products/disabled', 'App\Http\Controllers\ProductsController@doDisabled');
});


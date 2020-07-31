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

Route::get('/', 'frontController@index');
Route::get('category', 'frontController@category');
Route::get('post', 'frontController@post');

route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'adminController@index')->name('admin.index');
    // Route::get('/category', 'adminController@category')->name('admin.category');

    route::group(['prefix' => 'categories'], function () {

        Route::get('/create', 'CategoriesController@create')->name('admin.categories');
        Route::post('/store', 'CategoriesController@store')->name('admin.category.store');
        Route::get('/edit/{id}', 'CategoriesController@edit')->name('admin.category.edit');

        Route::post('/category/update/{id}', 'CategoriesController@update')->name('admin.category.update');
        Route::post('/delete', 'CategoriesController@delete')->name('admin.category.delete');

    });
    route::group(['prefix' => 'settings'], function () {

        Route::get('/', 'adminController@settings')->name('admin.settings');
        Route::post('/store', 'adminController@settingsStore')->name('admin.settings.store');
        Route::post('/update/{id}', 'adminController@settingsUpdate')->name('admin.settings.update');
    });
});

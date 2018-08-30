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

Route::group( ['middleware' => 'guest', 'namespace'=>'Auth'], function ()
{
    Route::get('/lomantine', 'LoginController@index');
    Route::post('/lomantine', 'LoginController@auth');
});

Route::group(['middleware' => 'admin'], function ()
{
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::resource('/dashboard/pages', 'Admin\PagesController', ['names' => [
        'index' => 'pages'
    ]]);
    Route::resource('/dashboard/options', 'Admin\OptionsController');
    Route::resource('/dashboard/images', 'Admin\ImagesController');
    Route::resource('/dashboard/categoriesImages', 'Admin\CategoriesImagesController');
});
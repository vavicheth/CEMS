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

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
// Example Routes
    Route::view('/', 'landing');
    Route::match(['get', 'post'], '/dashboard', function () {
        return view('dashboard');
    });
    Route::view('/pages/slick', 'pages.slick');
    Route::view('/pages/datatables', 'pages.datatables');
    Route::view('/pages/blank', 'pages.blank');

    Route::get('/home', 'HomeController@index')->name('home');

    //Setting
    Route::get('setting/ui','Admin\Setting\UiController@index')->name('setting.ui');
    Route::post('setting/ui','Admin\Setting\UiController@update')->name('setting.ui')->middleware(['permission:ui_update']);

    //User Managements
    Route::resource('user_managements/users','Admin\UserManagements\UserController', ['as' => 'user_managements']);
    Route::resource('user_managements/permissions','Admin\UserManagements\PermissionController', ['as' => 'user_managements']);
    Route::resource('user_managements/roles','Admin\UserManagements\RoleController', ['as' => 'user_managements']);
});


Auth::routes();



// Locked User
//Route::get('login/locked', 'Auth\LoginController@locked')->middleware('auth')->name('login.locked');
//Route::post('login/locked', 'Auth\LoginController@unlock')->name('login.unlock');

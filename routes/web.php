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

Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('auth.login');
Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

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

    /**
     * Patient Management
     */
    //Patients
    Route::resource('patient_managements/patients','Admin\PatientManagements\PatientController', ['as' => 'patient_managements']);
    Route::delete('patient_managements/patients/per_del/{id}', 'Admin\PatientManagements\PatientController@per_del')->name('patient_managements.patients.per_del');
    Route::post('patient_managements/patients/restore/{id}', 'Admin\PatientManagements\PatientController@restore')->name('patient_managements.patients.restore');

    //Patients
    Route::resource('patient_managements/patient_accompanies','Admin\PatientManagements\PatientAccompanyController', ['as' => 'patient_managements']);
    Route::delete('patient_managements/patient_accompanies/per_del/{id}', 'Admin\PatientManagements\PatientAccompanyController@per_del')->name('patient_managements.patient_accompanies.per_del');
    Route::post('patient_managements/patient_accompanies/restore/{id}', 'Admin\PatientManagements\PatientAccompanyController@restore')->name('patient_managements.patient_accompanies.restore');

    /**
     * Setting
     */
    //Departments
    Route::resource('setting/departments','Admin\Setting\DepartmentController', ['as' => 'setting']);
    Route::delete('setting/departments/per_del/{id}', 'Admin\Setting\DepartmentController@per_del')->name('setting.departments.per_del');
    Route::post('setting/departments/restore/{id}', 'Admin\Setting\DepartmentController@restore')->name('setting.departments.restore');
//    //Documents
//    Route::resource('setting/documents','Admin\Setting\DocumentController', ['as' => 'setting']);
//    Route::delete('setting/documents/per_del/{id}', 'Admin\Setting\DocumentController@per_del')->name('setting.documents.per_del');
//    Route::post('setting/documents/restore/{id}', 'Admin\Setting\DocumentController@restore')->name('setting.documents.restore');
    //UI
    Route::get('setting/ui','Admin\Setting\UiController@index')->name('setting.ui');
    Route::post('setting/ui','Admin\Setting\UiController@update')->name('setting.ui')->middleware(['permission:ui_update']);


    /**
     * User Managements
     */
    //User Managements
    Route::resource('user_managements/users','Admin\UserManagements\UserController', ['as' => 'user_managements']);
    Route::delete('user_managements/users/per_del/{id}', 'Admin\UserManagements\UserController@per_del')->name('user_managements.users.per_del');
    Route::post('user_managements/users/restore/{id}', 'Admin\UserManagements\UserController@restore')->name('user_managements.users.restore');

    // Permissions
    Route::resource('user_managements/permissions','Admin\UserManagements\PermissionController', ['as' => 'user_managements']);
    Route::delete('user_managements/permissions/per_del/{id}', 'Admin\UserManagements\PermissionController@per_del')->name('user_managements.permissions.per_del');
    Route::post('user_managements/permissions/restore/{id}', 'Admin\UserManagements\PermissionController@restore')->name('user_managements.permissions.restore');

    // Roles
    Route::resource('user_managements/roles','Admin\UserManagements\RoleController', ['as' => 'user_managements']);
    Route::delete('user_managements/roles/per_del/{id}', 'Admin\UserManagements\RoleController@per_del')->name('user_managements.roles.per_del');
    Route::post('user_managements/roles/restore/{id}', 'Admin\UserManagements\RoleController@restore')->name('user_managements.roles.restore');
//    Route::resource('roles', 'RolesController');





});



//Auth::routes();



// Locked User
//Route::get('login/locked', 'Auth\LoginController@locked')->middleware('auth')->name('login.locked');
//Route::post('login/locked', 'Auth\LoginController@unlock')->name('login.unlock');

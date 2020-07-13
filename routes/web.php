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


// Locked User
Route::get('lockscreen', 'Auth\LockAccountController@lockscreen')->name('login.locked');
Route::post('lockscreen', 'Auth\LockAccountController@unlock')->name('login.unlock');



Route::group(['middleware' => ['auth','lock']], function () {

    // Change Password Routes...
    Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
    Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

    Route::view('/', 'admin.patient_managements.patient_accompanies.pre_scan')->name('/');

});


Route::group(['middleware' => ['auth','lock'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
// Example Routes

//    Route::match(['get', 'post'], '/dashboard', function () {
//        return view('dashboard');
//    });
//    Route::view('/pages/slick', 'pages.slick');
//    Route::view('/pages/datatables', 'pages.datatables');
//    Route::view('/pages/blank', 'pages.blank');
//
//    Route::get('/home', 'HomeController@index')->name('home');


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

    /**
     * Patient Management
     */
    //Patients
    Route::resource('patient_managements/patients','Admin\PatientManagements\PatientController', ['as' => 'patient_managements']);
    Route::delete('patient_managements/patients/per_del/{id}', 'Admin\PatientManagements\PatientController@per_del')->name('patient_managements.patients.per_del');
    Route::post('patient_managements/patients/restore/{id}', 'Admin\PatientManagements\PatientController@restore')->name('patient_managements.patients.restore');
    Route::get('patient_managements/patients/print_qr/{id}', 'Admin\PatientManagements\PatientController@print_qr')->name('patient_managements.patients.print_qr');

    //Patient Accompany
    Route::resource('patient_managements/patient_accompanies','Admin\PatientManagements\PatientAccompanyController', ['as' => 'patient_managements']);
    Route::delete('patient_managements/patient_accompanies/per_del/{id}', 'Admin\PatientManagements\PatientAccompanyController@per_del')->name('patient_managements.patient_accompanies.per_del');
    Route::post('patient_managements/patient_accompanies/restore/{id}', 'Admin\PatientManagements\PatientAccompanyController@restore')->name('patient_managements.patient_accompanies.restore');
    Route::post('patient_managements/patient_accompanies/get_record/{id}', 'Admin\PatientManagements\PatientAccompanyController@get_record')->name('patient_managements.patient_accompanies.get_record');
    Route::get('patient_managements/patient_accompanies/print_qr/{id}', 'Admin\PatientManagements\PatientAccompanyController@print_qr')->name('patient_managements.patient_accompanies.print_qr');
    Route::post('patient_managements/patient_accompanies/change_status/{id}', 'Admin\PatientManagements\PatientAccompanyController@change_status')->name('patient_managements.patient_accompanies.change_status');

    Route::get('patient_managements/pre_scan', 'Admin\PatientManagements\PatientAccompanyController@pre_scan')->name('patient_managements.patient_accompanies.pre_scan');
    Route::get('patient_managements/scan_qr', 'Admin\PatientManagements\PatientAccompanyController@scan_qr')->name('patient_managements.patient_accompanies.scan_qr');
    Route::get('patient_managements/show_data/{id}', 'Admin\PatientManagements\PatientAccompanyController@show_data')->name('patient_managements.patient_accompanies.show_data');


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
     * Address
     */
    Route::get('/move_address','Admin\AddressController@move_address')->name('move_address');
    Route::get('/address/villages','Admin\AddressController@villages')->name('address.villages');
    Route::get('/address/districts','Admin\AddressController@districts')->name('address.districts');
    Route::post('/address/fetch','Admin\AddressController@fetch')->name('address.fetch');
    Route::post('/address/get_data','Admin\AddressController@get_data')->name('address.get_data');


    /**
     * Pharmacy
     */
    //Donors
    Route::resource('pharmacy/donors','Admin\Pharmacy\PhDonorController', ['as' => 'pharmacy']);
    Route::delete('pharmacy/donors/per_del/{id}', 'Admin\Pharmacy\PhDonorController@per_del')->name('pharmacy.donors.per_del');
    Route::post('pharmacy/donors/restore/{id}', 'Admin\Pharmacy\PhDonorController@restore')->name('pharmacy.donors.restore');

    //Suppliers
    Route::resource('pharmacy/suppliers','Admin\Pharmacy\PhSupplierController', ['as' => 'pharmacy']);
    Route::delete('pharmacy/suppliers/per_del/{id}', 'Admin\Pharmacy\PhSupplierController@per_del')->name('pharmacy.suppliers.per_del');
    Route::post('pharmacy/suppliers/restore/{id}', 'Admin\Pharmacy\PhSupplierController@restore')->name('pharmacy.suppliers.restore');

    //Categories
    Route::resource('pharmacy/categories','Admin\Pharmacy\PhCategoryController', ['as' => 'pharmacy']);
    Route::delete('pharmacy/categories/per_del/{id}', 'Admin\Pharmacy\PhCategoryController@per_del')->name('pharmacy.categories.per_del');
    Route::post('pharmacy/categories/restore/{id}', 'Admin\Pharmacy\PhCategoryController@restore')->name('pharmacy.categories.restore');

    //Products
    Route::resource('pharmacy/products','Admin\Pharmacy\PhProductController', ['as' => 'pharmacy']);
    Route::delete('pharmacy/products/per_del/{id}', 'Admin\Pharmacy\PhProductController@per_del')->name('pharmacy.products.per_del');
    Route::post('pharmacy/products/restore/{id}', 'Admin\Pharmacy\PhProductController@restore')->name('pharmacy.products.restore');









});



//Auth::routes();



// Locked User
//Route::get('login/locked', 'Auth\LoginController@locked')->middleware('auth')->name('login.locked');
//Route::post('login/locked', 'Auth\LoginController@unlock')->name('login.unlock');

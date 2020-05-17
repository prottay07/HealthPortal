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

// Route::get('/hnbl', function(){
//     return view('hnbl');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'HomeController@logout')->name('logout');

// Admin Routes
Route::get('admin/home', 'AdminController@index')->name('admin.home');


Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

Route::get('admin/all-employee', 'AdminController@AllEmployee')->name('all.employee.admin');
 Route::get('admin/view-form', 'AdminController@AllForm')->name('all.form.admin');

        // $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
        // $this->post('admin', 'Admin\LoginController@login');
        // $this->post('logout', 'Auth\LoginController@logout')->name('logout');

        // $this->get('admin-password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        // $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        // $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        // $this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

//EMPLOYEE ROUTES ARE HERE--------------------

Route::get('/add-employee', 'EmployeeController@index')->name('add.employee');
Route::post('/insert-employee','EmployeeController@store');
Route::get('/all-employee', 'EmployeeController@AllEmployee')->name('all.employee');

// Import & Export in Excel
Route::get('/import-employee', 'EmployeeController@ImportEmployee')->name('import.employee');
Route::post('/import', 'EmployeeController@import')->name('import');
Route::get('employees/export/', 'EmployeeController@export')->name('export');

Route::get('forms/export/', 'FormController@export')->name('form.export');

// Route::get('/view-employee/{id}', 'EmployeeController@ViewEmployee');
// Route::get('/delete-employee/{id}', 'EmployeeController@DeleteEmployee');
// Route::get('/edit-employee/{id}', 'EmployeeController@EditEmployee');
// Route::post('/update-employee/{id}','EmployeeController@UpdateEmployee');

// //Form routes are here-------------------
// Route::get('/add-form', 'FormController@index')->name('add.form');
// Route::post('/insert-form','FormController@Store');
// Route::get('/all-form', 'FormController@AllForm')->name('all.customer');
// Route::get('/view-form/{id}', 'FormController@ViewForm');
// Route::get('/delete-form/{id}', 'FormController@DeleteForm');
// Route::get('/edit-form/{id}', 'FormController@EditForm');
// Route::post('/update-form/{id}','FormController@UpdateForm');

//Attendance ROUTES ARE HERE--------------------

Route::get('/add-attendance', 'AttendanceController@index')->name('add.attendance');
Route::post('/insert-attendance','AttendanceController@store');
Route::get('/all-attendance', 'AttendanceController@AllAttendance')->name('all.attendance');


//Form ROUTES ARE HERE--------------------

Route::get('/add-form', 'FormController@index')->name('add.form');
Route::post('/insert-form','FormController@store');
Route::get('/all-form', 'FormController@AllForm')->name('all.form');


//Partner's ROUTES ARE HERE--------------------

Route::get('/add-partner', 'PartnerController@index')->name('add.partner.form');
Route::post('/insert-partner-form','PartnerController@store');
Route::get('/all-partner', 'PartnerController@AllPartner')->name('all.partner.form');
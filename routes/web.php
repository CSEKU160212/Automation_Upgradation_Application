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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

Route::get('/profile', 'HomeController@index')->name('home');
Route::get('/employee', 'EmployeeController@index')->name('employee');
Route::POST('/employee', 'EmployeeController@create')->name('employeeSubmit');
Route::get('/', 'EmployeeController@showWelcome')->name('welcome');
Route::get('/roles', 'RoleController@index')->name('roles');
Route::POST('/roles', 'RoleController@create')->name('roleAdd');
Route::POST('/roles/delete','RoleController@delete');

Route::get('/disciplines', 'DisciplineController@index')->name('disciplines');
Route::POST('/discipline/delete','DisciplineController@delete');
Route::POST('/disciplines','DisciplineController@create');

Route::get('/sections', 'SectionController@index')->name('sections');
Route::POST('/section/delete','SectionController@delete');
Route::POST('/sections','SectionController@create');

Route::get('/schools', 'SchoolController@index')->name('schools');
Route::POST('/school/delete','SchoolController@delete');
Route::POST('/schools','SchoolController@create');


Route::get('/manageuser', 'ManageuserController@index')->name('manageuser');
Route::POST('/manageuser/delete','ManageuserController@delete');

Route::get('/admin', 'AdminController@index')->name('admin');
Route::POST('/admin/delete','AdminController@delete');
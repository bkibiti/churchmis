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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

//localizaiton
Route::get('localization/{locale}/', 'LocalizationController@index')->name('localization.index');


//Person controller
Route::resource('people', 'PersonController');
Route::resource('family', 'FamilyController');

Route::resource('services', 'ServiceController');
// Route::resource('service-types', 'GroupTypeController');


//envets
Route::resource('event-types', 'EventTypeController');
Route::resource('events', 'EventController');
Route::resource('events-attendance', 'EventAttendanceController');

Route::get('events-calender', 'EventController@calender')->name('calender');

//pledges
Route::resource('pledges', 'PledgeController');

Route::resource('fund-activities', 'FundActivityController')->only([
    'index', 'store','update','destroy'
]);

//payments
Route::resource('payments', 'PaymentController');
Route::post('payments/pledges', 'PaymentController@getPledges')->name('payments.pledges');

 //user roles
 Route::get('user-roles', 'RoleController@index')->name('roles.index');
 Route::get('user-roles/create', 'RoleController@create')->name('roles.create');
 Route::post('user-roles', 'RoleController@store')->name('roles.store');
 Route::get('user-roles/{id}/edit', 'RoleController@edit')->name('roles.edit');
 Route::post('user-roles/update', 'RoleController@update')->name('roles.update');
 Route::delete('user-roles/delete', 'RoleController@destroy')->name("roles.destroy");
 
//users routes
Route::get('users', 'UserController@index')->name('users.index');
Route::post('users/register', 'UserController@store')->name("users.store");
Route::post('users/update', 'UserController@update')->name("users.update");
Route::put('users/delete', 'UserController@delete')->name("users.delete");
Route::post('users/de-actiavate', 'UserController@deActivate')->name("users.deactivate");
Route::post('users/change-password', 'UserController@changePassword')->name('change-password');
Route::get('users/change-password', 'UserController@changePasswordForm')->name('change-pass-form');
Route::post('user-profile/update', 'UserController@updateProfile')->name("update-profile");
Route::get('users/search', 'UserController@search')->name("users.search");
Route::post('users/user-role-id', 'UserController@getRoleID')->name('getRoleID');
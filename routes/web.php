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

// Route::get('/', 'PublicController@index')->name('public-home');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    //localizaiton
    Route::get('localization/{locale}/', 'LocalizationController@index')->name('localization.index');


    Route::middleware(['is_member'])->group(function () {

        Route::get('/member/pending', 'MemberController@pending')->name('pending-approval');

        Route::get('/member/home', 'MemberController@index')->name('member-home');
        Route::get('/member/pledges', 'MemberController@pledges')->name('member.pledges');
        Route::get('/member/pledges/create', 'MemberController@create')->name('member.pledges.create');
        Route::post('/member/pledges', 'MemberController@pledgeStore')->name('member.pledges.store');
        Route::get('/member/payments', 'MemberController@payments')->name('member.payments');

    });


    Route::middleware(['is_admin'])->group(function () {

        Route::get('admin/dashboard', 'HomeController@index')->name('home');

        //Person controller
        Route::get('admin/people/pending', 'PersonController@pending')->name('people.pending');
        Route::post('admin/people/approve', 'PersonController@approve')->name('people.approve');
        Route::post('admin/people/search', 'PersonController@search')->name('people.search');
        Route::resource('admin/people', 'PersonController');

        //dependats
        Route::get('admin/dependants', 'DependantsController@index')->name('dependants.index');
        Route::get('admin/dependants/{id}', 'DependantsController@create')->name('dependants.create');
        Route::post('admin/dependants', 'DependantsController@store')->name('dependants.store');
        Route::post('admin/dependant', 'DependantsController@store2')->name('dependants.store2');
        Route::post('admin/dependant/delete', 'DependantsController@delete')->name('dependants.delete');




        // Route::resource('admin/family', 'FamilyController');

        Route::resource('admin/services', 'ServiceController');
        // Route::resource('service-types', 'GroupTypeController');


        //envets
        Route::resource('admin/event-types', 'EventTypeController');
        Route::resource('admin/events', 'EventController');
        Route::resource('admin/events-attendance', 'EventAttendanceController');

        Route::get('admin/events-calender', 'EventController@calender')->name('calender');

        //pledges
        Route::resource('admin/admin/pledges', 'PledgeController');

        Route::resource('admin/fund-activities', 'FundActivityController')->only([
            'index', 'store','update','destroy'
        ]);

        //payments
        Route::resource('admin/payments', 'PaymentController');
        Route::post('admin/payments/pledges', 'PaymentController@getPledges')->name('payments.pledges');

        //user roles
        Route::get('admin/user-roles', 'RoleController@index')->name('roles.index');
        Route::get('admin/user-roles/create', 'RoleController@create')->name('roles.create');
        Route::post('admin/user-roles', 'RoleController@store')->name('roles.store');
        Route::get('admin/user-roles/{id}/edit', 'RoleController@edit')->name('roles.edit');
        Route::post('admin/user-roles/update', 'RoleController@update')->name('roles.update');
        Route::delete('admin/user-roles/delete', 'RoleController@destroy')->name("roles.destroy");

        //users routes
        Route::get('admin/users', 'UserController@index')->name('users.index');
        Route::post('admin/users/register', 'UserController@store')->name("users.store");
        Route::post('admin/users/update', 'UserController@update')->name("users.update");
        Route::put('admin/users/delete', 'UserController@delete')->name("users.delete");
        Route::post('admin/users/de-actiavate', 'UserController@deActivate')->name("users.deactivate");
        Route::post('admin/users/change-password', 'UserController@changePassword')->name('change-password');
        Route::get('admin/users/change-password', 'UserController@changePasswordForm')->name('change-pass-form');
        Route::post('admin/user-profile/update', 'UserController@updateProfile')->name("update-profile");
        Route::get('admin/users/search', 'UserController@search')->name("users.search");
        Route::post('admin/users/user-role-id', 'UserController@getRoleID')->name('getRoleID');
     });



});

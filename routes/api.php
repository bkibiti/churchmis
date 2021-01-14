<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', 'Api\AuthController@login');
    Route::post('/register', 'Api\AuthController@register');
    Route::post('/logout', 'Api\AuthController@logout');
    Route::post('/refresh', 'Api\AuthController@refresh');
    Route::get('/user-profile', 'Api\AuthController@userProfile');    
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('pledges/{member_id}', 'Api\PledgesController@show');
Route::post('pledges', 'Api\PledgesController@store');
Route::get('pledge-types', 'Api\PledgesController@pledgeTypes');

Route::get('payments/{member_id}', 'Api\PaymentsController@show');

Route::get('member/{member_id}', 'Api\MemberController@show');

Route::get('dioceses', 'Api\ChurchController@getDioceses');
Route::get('dioceses/{id}', 'Api\ChurchController@getDiocese');

Route::get('districts', 'Api\ChurchController@getDistricts');
Route::get('districts/{id}', 'Api\ChurchController@getDistrict');
Route::get('churches', 'Api\ChurchController@getchurches');
Route::get('churches/{id}', 'Api\ChurchController@getchurche');
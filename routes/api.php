<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('pledges/{member_id}', 'Api\PledgesController@show');
Route::post('pledges', 'Api\PledgesController@store');
Route::get('pledge-types', 'Api\PledgesController@pledgeTypes');

Route::get('payments/{member_id}', 'Api\PaymentsController@show');

Route::get('member/{member_id}', 'Api\MemberController@show');

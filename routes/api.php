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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::apiResource('phones','App\Http\Controllers\API\PhoneContactController')->middleware('auth:sanctum');
 Route::post('login',['App\Http\Controllers\API\Auth\LoginController','login']);
  Route::get('phones',function(){
      return[
        'name'=>'asmaa fadel'
     ];
  });
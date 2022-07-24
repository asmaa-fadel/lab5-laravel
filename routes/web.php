<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactcontroller;
use App\Http\Controllers\phonecontactController;
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
    return view ('welcome');
   });

 Route::get('/list',[contactcontroller::class,'list']
 )->name(name:"listcontact");
 Route::get('/create',[contactcontroller::class,'create']);
 Route::get('/delete/{id}',[contactcontroller::class,'delete'])->whereNumber('id');
 Route::get('/edit/{id}',[contactcontroller::class,'edit'])->whereNumber('id');
 Route::put('/update/{id}',[contactcontroller::class,'update'])->whereNumber('id');
 Route::get('/show/{id}',[contactController::class,'show'])->whereNumber('id');

 Route::resource('phones',phonecontactController::class)->middleware('auth');

Auth::routes();

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::resource('users',['App\Http\Controllers\phonecontactcontroller'])-> middleware ('auth');


<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//routes related to Admin namespace
// ROUTES /admin/users/*
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage.users')->group(function (){
    Route::resource('/users','UsersController',['except'=>['create','store','show']]);
});

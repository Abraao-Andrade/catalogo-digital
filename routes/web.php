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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('homeadmin');
Route::post('/admin', 'App\Http\Controllers\AdminController@store')->name('novoproduto');
Route::get('/admin/login', 'App\Http\Controllers\Auth\AdminLoginController@index')->name('admin.login');
Route::post('/admin/login', 'App\Http\Controllers\Auth\AdminLoginController@login')->name('admin.login.submit');

Route::get('/categorias/novo','App\Http\Controllers\CategoriaControlador@create');


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
    return view('landing');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/customers', App\Http\Controllers\CustomerController::class);
Route::get('/load-customers', [App\Http\Controllers\CustomerController::class, 'load'])->name('load-customers');
Route::get('/filter-customer', [App\Http\Controllers\CustomerController::class, 'load'])->name('filter-customer');

Route::resource('/plans', App\Http\Controllers\PlanController::class);
Route::get('/load-plans', [App\Http\Controllers\PlanController::class, 'load'])->name('load-plans');
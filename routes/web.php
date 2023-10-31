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
Route::resource('/users', App\Http\Controllers\UserController::class);
Route::get('/load-users', [App\Http\Controllers\UserController::class, 'load'])->name('load-users');
Route::resource('/lenders', App\Http\Controllers\LenderController::class);
Route::get('/load-lenders', [App\Http\Controllers\LenderController::class, 'load'])->name('load-lenders');
Route::get('/edit-profile', [App\Http\Controllers\HomeController::class, 'edit_profile'])->name('edit-profile');
Route::post('/update-profile', [App\Http\Controllers\HomeController::class, 'update_profile'])->name('update-profile');
Route::post('/submit-change-password', [App\Http\Controllers\HomeController::class, 'submit_change_password'])->name('submit-change-password');
Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'change_password'])->name('change-password');

Route::get('/edit-settings', [App\Http\Controllers\HomeController::class, 'edit_settings'])->name('edit-settings');
Route::post('/update-settings', [App\Http\Controllers\HomeController::class, 'update_settings'])->name('update-settings');
Route::resource('/pipeline_types', App\Http\Controllers\PipelineTypeController::class);
Route::get('/load-pipeline-types', [App\Http\Controllers\PipelineTypeController::class, 'load'])->name('load-pipeline-types');
Route::resource('/pipelines', App\Http\Controllers\PipelineController::class);
Route::get('/load-pipelines', [App\Http\Controllers\PipelineController::class, 'load'])->name('load-pipelines');
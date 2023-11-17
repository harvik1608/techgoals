<?php

use Illuminate\Support\Facades\Route;

use App\Models\Otp;
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
Route::get('/send-otp', function (Request $request) {
    $otp = new Otp;
    $otp->phone = $request->phone;
    $otp->otp = 1234;
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/users', App\Http\Controllers\UserController::class);
Route::get('/load-users', [App\Http\Controllers\UserController::class, 'load'])->name('load-users');
Route::resource('/lenders', App\Http\Controllers\LenderController::class);
Route::get('/load-lenders', [App\Http\Controllers\LenderController::class, 'load'])->name('load-lenders');
Route::get('/change-lender-status', [App\Http\Controllers\LenderController::class, 'change_lender_status'])->name('change-lender-status');
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
Route::get('/organization', [App\Http\Controllers\HomeController::class, 'organization'])->name('organization');
Route::post('/submit-form1', [App\Http\Controllers\HomeController::class, 'submit_form1'])->name('submit-form1');
Route::post('/submit-form2', [App\Http\Controllers\HomeController::class, 'submit_form2'])->name('submit-form2');
Route::post('/submit-form3', [App\Http\Controllers\HomeController::class, 'submit_form3'])->name('submit-form3');
Route::post('/submit-form4', [App\Http\Controllers\HomeController::class, 'submit_form4'])->name('submit-form4');
Route::post('/submit-form5', [App\Http\Controllers\HomeController::class, 'submit_form5'])->name('submit-form5');
Route::post('/submit-locale', [App\Http\Controllers\HomeController::class, 'submit_locale'])->name('submit-locale');
Route::get('/remove-membership-certificate/{id}', [App\Http\Controllers\HomeController::class, 'remove_membership_certificate'])->name('remove-membership-certificate');
Route::resource('/roles', App\Http\Controllers\RoleController::class);
Route::get('/load-roles', [App\Http\Controllers\RoleController::class, 'load'])->name('load-roles');
Route::get('/stages', [App\Http\Controllers\StageController::class, 'index'])->name('stages');
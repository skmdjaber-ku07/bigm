<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\AdminApplicantController;

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

// Middleware: Only accessible following routes only for authenticated admin users.
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => [
        'auth',
        'auth.type:admin',
    ]
], function () {
    // Applicant
    Route::resource('applicants', AdminApplicantController::class)->only([
        'index', 'edit', 'update'
    ]);

    Route::post('applicants-data', [AdminApplicantController::class, 'data'])->name('applicants.data');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

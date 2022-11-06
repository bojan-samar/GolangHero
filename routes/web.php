<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/', [\App\Http\Controllers\MiscController::class,'welcome'])->name('welcome');
Route::resource('company', App\Http\Controllers\CompanyController::class);
Route::resource('job', App\Http\Controllers\JobController::class);
Route::post('apply', [\App\Http\Controllers\ApplyController::class,'store'])->name('apply.store');

//Forum
Route::resource('forum', \App\Http\Controllers\ForumController::class);
Route::post('store-reply', [\App\Http\Controllers\ForumController::class,'storeReply']);
Route::post('save-forum', [\App\Http\Controllers\ForumController::class,'saveForum']);



//Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:sanctum', 'admin']], function () {
    Route::resource('blog', App\Http\Controllers\Admin\BlogController::class);
    Route::delete('blog-photo/{slug}', [\App\Http\Controllers\Admin\BlogController::class,'destroyPhoto'])->name('blog-photo.destroy');
    Route::resource('vehicle', App\Http\Controllers\Admin\VehicleController::class);
    Route::resource('application', App\Http\Controllers\Admin\ApplicationController::class);
    Route::resource('blog', App\Http\Controllers\Admin\BlogController::class);
    Route::resource('job-import', App\Http\Controllers\Admin\JobImportController::class);
    Route::delete('blog-photo/{slug}', [\App\Http\Controllers\Admin\BlogController::class,'destroyPhoto'])->name('blog-photo.destroy');
    Route::resource('company', App\Http\Controllers\Admin\CompanyController::class);
    Route::post('company-download-logo', [App\Http\Controllers\Admin\CompanyController::class, 'downloadLogo'])->name('company.download-logo');
});

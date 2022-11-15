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

Route::get('checkout/{slug}', [App\Http\Controllers\CheckoutController::class, 'checkout'])->name('checkout');
Route::get('thank-you/{slug}', [App\Http\Controllers\CheckoutController::class, 'thankYou'])->name('thank-you');


Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('welcome');

//Auth
Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

//Create New Job
    Route::get('job-create', [App\Http\Controllers\JobCreateController::class, 'index'])->name('job-create');
    Route::post('job-create', [App\Http\Controllers\JobCreateController::class, 'store'])->name('job-create.store');
    Route::view('company-create', 'job.create.company-create')->name('company-create');
    Route::get('job-create/{slug}/details', [App\Http\Controllers\JobCreateController::class, 'details'])->name('job-create.details');
    Route::get('job-create/{uuid}/review', [App\Http\Controllers\JobCreateController::class, 'review'])->name('job-create.review');
    Route::get('job-create/{uuid}/design', [App\Http\Controllers\JobCreateController::class, 'design'])->name('job-create.design');
    Route::get('job-create/{uuid}/pay', [App\Http\Controllers\JobCreateController::class, 'pay'])->name('job-create.pay');
    Route::post('job-create-submit', [App\Http\Controllers\JobCreateController::class, 'submit'])->name('job-create.submit');
});

Route::get('/', [\App\Http\Controllers\MiscController::class,'welcome'])->name('welcome');
Route::resource('company', App\Http\Controllers\CompanyController::class);
Route::resource('job', App\Http\Controllers\JobController::class);
Route::get('apply/{slug}', [\App\Http\Controllers\ApplyController::class,'show'])->name('apply.show');
Route::post('apply', [\App\Http\Controllers\ApplyController::class,'store'])->name('apply.store');

//Forum
Route::resource('forum', \App\Http\Controllers\ForumController::class);
Route::post('store-reply', [\App\Http\Controllers\ForumController::class,'storeReply']);
Route::post('save-forum', [\App\Http\Controllers\ForumController::class,'saveForum']);



//Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:sanctum', 'admin']], function () {
    Route::resource('application', App\Http\Controllers\Admin\ApplicationController::class);
    Route::resource('blog', App\Http\Controllers\Admin\BlogController::class);
    Route::delete('blog-photo/{slug}', [\App\Http\Controllers\Admin\BlogController::class,'destroyPhoto'])->name('blog-photo.destroy');
    Route::resource('job', App\Http\Controllers\Admin\JobController::class);
    Route::get('job-tweet/{slug}', [\App\Http\Controllers\Admin\JobController::class,'tweet'])->name('job.tweet');
    Route::resource('job-import', App\Http\Controllers\Admin\JobImportController::class);
    Route::resource('company', App\Http\Controllers\Admin\CompanyController::class);
    Route::post('company-download-logo', [App\Http\Controllers\Admin\CompanyController::class, 'downloadLogo'])->name('company.download-logo');
});




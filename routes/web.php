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

Route::get('alert', [App\Http\Controllers\JobAlertController::class, 'index'])->name('alert.index');
Route::post('alert', [App\Http\Controllers\JobAlertController::class, 'store'])->name('alert.store');


Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('welcome');

//Account
Route::group(['prefix' => 'account', 'as' => 'account.', 'middleware' => ['auth:sanctum']], function () {
    Route::get('worker-employment/create', [App\Http\Controllers\Account\WorkerEmploymentController::class, 'create'])->name('worker-employment.create');
    Route::post('worker-employment', [App\Http\Controllers\Account\WorkerEmploymentController::class, 'store'])->name('worker-employment.store');
    Route::resource('worker', App\Http\Controllers\Account\WorkerController::class);
    Route::post('worker-skill', [App\Http\Controllers\Account\WorkerSkillController::class, 'store'])->name('worker-skill.store');
    Route::put('worker-social', [App\Http\Controllers\Account\WorkerSkillController::class, 'updateSocials'])->name('worker-social.update');
    Route::delete('worker-skill/{uuid}', [App\Http\Controllers\Account\WorkerSkillController::class, 'destroy'])->name('worker-skill.destroy');
    Route::put('username', [App\Http\Controllers\Account\UserController::class, 'updateUsername'])->name('username.update');

});

//Auth
Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    //Create New Job
    Route::get('job-create', [App\Http\Controllers\JobCreateController::class, 'index'])->name('job-create');
    Route::post('job-create', [App\Http\Controllers\JobCreateController::class, 'store'])->name('job-create.store');
    Route::get('/job-create-company-create', function () {
        return Inertia::render('JobCreate/CompanyCreate');
    })->name('job-create.company.create');
    Route::post('job-create.company.store', [App\Http\Controllers\JobCreateController::class, 'companyStore'])->name('job-create.company.store');

    Route::get('job-create/{slug}/details', [App\Http\Controllers\JobCreateController::class, 'details'])->name('job-create.details');
    Route::get('job-create/{uuid}/review', [App\Http\Controllers\JobCreateController::class, 'review'])->name('job-create.review');


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
    Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('blog', App\Http\Controllers\Admin\BlogController::class);
    Route::delete('blog-photo/{slug}', [\App\Http\Controllers\Admin\BlogController::class,'destroyPhoto'])->name('blog-photo.destroy');
    Route::resource('job', App\Http\Controllers\Admin\JobController::class);
    Route::get('job-tweet/{slug}', [\App\Http\Controllers\Admin\JobController::class,'tweet'])->name('job.tweet');
    Route::resource('job-import', App\Http\Controllers\Admin\JobImportController::class);
    Route::resource('company', App\Http\Controllers\Admin\CompanyController::class);
    Route::post('company-download-logo', [App\Http\Controllers\Admin\CompanyController::class, 'downloadLogo'])->name('company.download-logo');
});




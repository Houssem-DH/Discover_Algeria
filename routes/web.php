<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware('adminAuth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/members', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('members');
    Route::get('dashboard/members/edit-member/{id}', [App\Http\Controllers\Admin\UsersController::class, 'edit']);
    Route::put('dashboard/members/update-member/{id}', [App\Http\Controllers\Admin\UsersController::class, 'update']);
    Route::get('dashboard/members/delete-member/{id}', [App\Http\Controllers\Admin\UsersController::class, 'destroy']);
    Route::get('/dashboard/site-management', [App\Http\Controllers\Admin\SiteManagementController::class, 'index'])->name('site-management');

    Route::post('/logo', [App\Http\Controllers\Admin\SiteManagementController::class, 'update_logo'])->name('update_logo');
    Route::post('/hero-banner', [App\Http\Controllers\Admin\SiteManagementController::class, 'update_hero_banner'])->name('update_hero_banner');
    Route::post('/hero-video', [App\Http\Controllers\Admin\SiteManagementController::class, 'update_hero_video'])->name('update_hero_video');

    Route::get('/dashboard/wilayas', [App\Http\Controllers\Admin\WilayaController::class, 'index'])->name('wilayas');
    Route::post('/dashboard/wilayas/create-wilaya', [App\Http\Controllers\Admin\WilayaController::class, 'insert'])->name('create-wilayas');
    Route::put('/dashboard/wilayas/update-wilaya/{id}', [App\Http\Controllers\Admin\WilayaController::class, 'update'])->name('update-wilayas');
    Route::get('/dashboard/wilayas/delete-wilaya/{id}', [App\Http\Controllers\Admin\WilayaController::class, 'destroy'])->name('delete-wilayas');
   
   
    Route::get('/dashboard/categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('categories');
    Route::post('/dashboard/categories/create-category', [App\Http\Controllers\Admin\CategoryController::class, 'insert'])->name('create-categories');
    Route::put('/dashboard/categories/update-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('update-categories');
    Route::get('/dashboard/categories/delete-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('delete-categories');
   

});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
   
});

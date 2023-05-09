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

Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');

Route::get('/places/{slug}', [App\Http\Controllers\Frontend\PlaceController::class, 'view'])->name('view-place');
Route::get('/destination', [App\Http\Controllers\Frontend\CategoryController::class, 'index'])->name('destination');
Route::get('/destination/{id}', [App\Http\Controllers\Frontend\CategoryController::class, 'view'])->name('destination-view');
Route::post('/review-insert/{user_id}/{place_id}', [App\Http\Controllers\Frontend\ReviewController::class, 'insert'])->name('review-insert');

Route::get('/tours', [App\Http\Controllers\Frontend\TourController::class, 'index'])->name('tour');

Route::get('/tours/{id}', [App\Http\Controllers\Frontend\TourController::class, 'view'])->name('view-tour');


Route::middleware('auth')->group(function () {

    Route::get('/requests/{id}', [App\Http\Controllers\Frontend\RequestController::class, 'index'])->name('requests');

});

Route::middleware('adminAuth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/members', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('members');
    Route::get('dashboard/members/edit-member/{id}', [App\Http\Controllers\Admin\UsersController::class, 'edit']);
    Route::put('dashboard/members/update-member/{id}', [App\Http\Controllers\Admin\UsersController::class, 'update']);
    Route::get('dashboard/members/delete-member/{id}', [App\Http\Controllers\Admin\UsersController::class, 'destroy']);
    Route::get('/dashboard/site-management', [App\Http\Controllers\Admin\SiteManagementController::class, 'index'])->name('site-management');

    Route::post('/logo-upd', [App\Http\Controllers\Admin\SiteManagementController::class, 'update_logo'])->name('update_logo');
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
   
    Route::get('/dashboard/places', [App\Http\Controllers\Admin\PlaceController::class, 'index'])->name('places');
    Route::post('/dashboard/places/create-place', [App\Http\Controllers\Admin\PlaceController::class, 'insert'])->name('create-places');
    Route::put('/dashboard/places/update-place/{id}', [App\Http\Controllers\Admin\PlaceController::class, 'update'])->name('update-places');
    Route::get('/dashboard/places/delete-place/{id}', [App\Http\Controllers\Admin\PlaceController::class, 'destroy'])->name('delete-places');

    Route::get('/dashboard/tours', [App\Http\Controllers\Admin\TourController::class, 'index'])->name('tours');
    Route::post('/dashboard/tours/create-tour', [App\Http\Controllers\Admin\TourController::class, 'insert'])->name('create-tours');
    Route::put('/dashboard/tours/update-tour/{id}', [App\Http\Controllers\Admin\TourController::class, 'update'])->name('update-tours');
    Route::get('/dashboard/tours/delete-tour/{id}', [App\Http\Controllers\Admin\TourController::class, 'destroy'])->name('delete-tours');

});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
   
});

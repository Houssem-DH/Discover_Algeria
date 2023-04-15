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

});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
   
});

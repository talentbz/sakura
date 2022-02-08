<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();
//frontend
Route::get('/', [App\Http\Controllers\Frontend\FrontController::class, 'index'])->name('front.home');
Route::get('/clear', [App\Http\Controllers\Frontend\FrontController::class, 'clear'])->name('front.clear');
// admin dashboard
Route::prefix('/admin')->middleware(['Admin'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');
    Route::group(['prefix' => 'user'], function(){
        Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user');
        Route::get('/{id}/change_passowrd', [App\Http\Controllers\Admin\UserController::class, 'change_password'])->name('admin.user.change_password');
        Route::post('/updatePassword', [App\Http\Controllers\Admin\UserController::class, 'updatePassword'])->name('admin.user.updatePassword');
        Route::post('/delete', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('admin.user.delete');
    });
    Route::group(['prefix' => 'vehicle'], function(){
        Route::get('/', [App\Http\Controllers\Admin\VehicleController::class, 'index'])->name('admin.vehicle.index');
        Route::get('/create', [App\Http\Controllers\Admin\VehicleController::class, 'create'])->name('admin.vehicle.create');
        Route::post('/create_post', [App\Http\Controllers\Admin\VehicleController::class, 'create_post'])->name('admin.vehicle.create_post');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\VehicleController::class, 'edit'])->name('admin.vehicle.edit');
        Route::get('/delete', [App\Http\Controllers\Admin\VehicleController::class, 'delete'])->name('admin.vehicle.delete');
    });
    Route::get('/edit_profile', [App\Http\Controllers\Admin\AdminController::class, 'edit_profile'])->name('admin.edit_profile');
    Route::post('/update_profile', [App\Http\Controllers\Admin\AdminController::class, 'update_profile'])->name('admin.update_profile');
});


//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

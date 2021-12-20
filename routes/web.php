<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;

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



Route::get('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('auth/check', [AuthController::class, 'check'])->name('auth.check');

Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('auth/login', [AuthController::class, 'login'])->name('auth.login');
    Route::resource('users', UserController::class);
    Route::get('/',  [AuthController::class, 'dashboard'])->name('dashboard');
    
});

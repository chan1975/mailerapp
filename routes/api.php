<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('catalog/country', [CatalogController::class, 'getCountries'])->name('catalog.country');
Route::get('catalog/state', [CatalogController::class, 'getStates'])->name('catalog.state');
Route::get('catalog/city', [CatalogController::class, 'getCities'])->name('catalog.city');